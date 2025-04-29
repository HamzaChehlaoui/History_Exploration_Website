document.addEventListener('DOMContentLoaded', function() {
    let dateInput = document.querySelector('input[name="date_commande"]');
    if (dateInput) {
        let today = new Date();
        let yyyy = today.getFullYear();
        let mm = String(today.getMonth() + 1).padStart(2, '0');
        let dd = String(today.getDate()).padStart(2, '0');
        let formattedToday = `${yyyy}-${mm}-${dd}`;

        dateInput.setAttribute('min', formattedToday);

        dateInput.addEventListener('change', function() {
            let selectedDate = new Date(this.value);
            let currentDate = new Date(formattedToday);

            selectedDate.setHours(0, 0, 0, 0);
            currentDate.setHours(0, 0, 0, 0);

            if (selectedDate < currentDate) {
                this.value = formattedToday;
                console.log("Please select today or a future date for your order.");
            }
        });
    }

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let savedTotal = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
    let shipping = 5.99;

    function renderCartItems() {
        let cartContainer = document.getElementById('cart-items-container');
        if (!cartContainer) return;

        cartContainer.innerHTML = '';

        if (cartItems.length === 0) {
            cartContainer.innerHTML = `
                <div class="store-card rounded-lg shadow-lg p-6 text-center">
                    <p class="text-amber-900 text-lg">Your cart is empty</p>
                    <button onclick="window.location.href='/Stor'" class="mt-4 bg-amber-800 text-amber-100 px-6 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                        Continue Shopping
                    </button>
                </div>
            `;
            return;
        }

        // Add items to cart
        cartItems.forEach((item, index) => {
            let itemElement = document.createElement('div');
            itemElement.className = 'store-card rounded-lg shadow-lg p-4';
            itemElement.innerHTML = `
                <div class="flex gap-4">
                    <img src="${item.img}" alt="${item.name}" class="w-24 h-24 object-cover rounded-lg"/>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold text-amber-900">${item.name}</h3>
                            <button class="text-amber-700 hover:text-amber-900 remove-item" data-index="${index}" data-product-id="${item.id}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <p class="text-amber-700 text-sm">Historical item</p>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-lg font-bold text-amber-900 item-price" data-unit-price="${item.price}">$${(item.price * item.quantity).toFixed(2)}</span>
                        </div>
                    </div>
                </div>
            `;
            cartContainer.appendChild(itemElement);
        });

        addCartEventListeners();
    }

    function updateSummary() {
        let subtotal = 0;
        cartItems.forEach(item => {
            subtotal += item.price * item.quantity;
        });

        let tax = subtotal * 0.1; // 10% tax
        let total = subtotal + shipping + tax;

        const summarySubtotal = document.getElementById('summary-subtotal');
        const summaryShipping = document.getElementById('summary-shipping');
        const summaryTax = document.getElementById('summary-tax');
        const summaryTotal = document.getElementById('summary-total');

        if (summarySubtotal) summarySubtotal.textContent = `$${subtotal.toFixed(2)}`;
        if (summaryShipping) summaryShipping.textContent = `$${shipping.toFixed(2)}`;
        if (summaryTax) summaryTax.textContent = `$${tax.toFixed(2)}`;
        if (summaryTotal) summaryTotal.textContent = `$${total.toFixed(2)}`;

        const paymentItemsCount = document.getElementById('payment-items-count');
        const paymentSubtotal = document.getElementById('payment-subtotal');
        const paymentShipping = document.getElementById('payment-shipping');
        const paymentTax = document.getElementById('payment-tax');
        const paymentTotal = document.getElementById('payment-total');

        if (paymentItemsCount) paymentItemsCount.textContent = `${cartItems.length} Item${cartItems.length !== 1 ? 's' : ''}`;
        if (paymentSubtotal) paymentSubtotal.textContent = `$${subtotal.toFixed(2)}`;
        if (paymentShipping) paymentShipping.value = shipping.toFixed(2);
        if (paymentTax) paymentTax.value = tax.toFixed(2);
        if (paymentTotal) paymentTotal.value = total.toFixed(2);

        localStorage.setItem('cartTotalPrice', subtotal);
    }

    function addCartEventListeners() {
        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function() {
                let index = parseInt(this.getAttribute('data-index'));
                if (cartItems[index].quantity > 1) {
                    cartItems[index].quantity -= 1;

                    let quantityElement = this.nextElementSibling;
                    quantityElement.textContent = cartItems[index].quantity;

                    let priceElement = this.closest('.flex').querySelector('.item-price');
                    let unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                    priceElement.textContent = `$${(unitPrice * cartItems[index].quantity).toFixed(2)}`;

                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    updateSummary();
                }
            });
        });

        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function() {
                let index = parseInt(this.getAttribute('data-index'));
                cartItems[index].quantity += 1;

                let quantityElement = this.previousElementSibling;
                quantityElement.textContent = cartItems[index].quantity;

                let priceElement = this.closest('.flex').querySelector('.item-price');
                let unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                priceElement.textContent = `$${(unitPrice * cartItems[index].quantity).toFixed(2)}`;

                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                updateSummary();
            });
        });

        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                let index = parseInt(this.getAttribute('data-index'));
                let productId = this.getAttribute('data-product-id');
                const originalButtonText = this.innerHTML; // Store original button content
                this.disabled = true; // Disable the button
                this.innerHTML = '<span class="loading"></span> Removing...'; // Optionally show a loading indicator

                fetch('/restore-stock', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ product_id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    this.disabled = false; // Re-enable the button
                    this.innerHTML = originalButtonText; // Restore original button content
                    if (data.success) {
                        let removedItem = cartItems[index];
                        cartItems.splice(index, 1);
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        renderCartItems();
                        updateSummary();
                        console.log('Stock restored successfully for product ID:', productId);
                    } else if (data.error) {
                        console.error('Error restoring stock for product ID:', productId, data.error);
                        // Optionally, display an error message to the user
                    }
                })
                .catch(error => {
                    this.disabled = false;
                    this.innerHTML = originalButtonText;
                    console.error('Error communicating with the server to restore stock:', error);
                });
            });
        });
    }

    renderCartItems();
    updateSummary();

    const orderForm = document.getElementById('order-form');
    if (orderForm) {
        orderForm.addEventListener('submit', function(e) {
            const cartItemsInput = document.createElement('input');
            cartItemsInput.type = 'hidden';
            cartItemsInput.name = 'cart_items';
            cartItemsInput.value = JSON.stringify(cartItems);
            orderForm.appendChild(cartItemsInput);


        });
    }

    let checkoutButton = document.getElementById('checkout-button');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            document.getElementById('cart-page').classList.add('hidden');
            document.getElementById('payment-page').classList.remove('hidden');
        });
    }

    // Add success message handler to clear cart after successful purchase
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.querySelector('.bg-green-100');
        if (successMessage && successMessage.textContent.includes('succès')) {
            localStorage.removeItem('cartItems');
            localStorage.removeItem('cartTotalPrice');
        }
    });
});

