document.addEventListener('DOMContentLoaded', function() {

    let dateInput = document.querySelector('input[name="date_commande"]');
    if (dateInput) {

        let today = new Date();
        let yyyy = today.getFullYear();
        let mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
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
                alert("Please select today or a future date for your order.");
            }
        });
    }

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let savedTotal = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
    let shipping = 5.99;


    function renderCartItems() {
        let cartContainer = document.getElementById('cart-items-container');

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
                            <button class="text-amber-700 hover:text-amber-900 remove-item" data-index="${index}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <p class="text-amber-700 text-sm">Historical item</p>
                        <div class="flex justify-between items-center mt-2">
                            <div class="flex items-center space-x-2">
                                <span class="w-8 text-center item-quantity">${item.quantity}</span>
                            </div>
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

        document.getElementById('summary-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('summary-shipping').textContent = `$${shipping.toFixed(2)}`;
        document.getElementById('summary-tax').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('summary-total').textContent = `$${total.toFixed(2)}`;

        document.getElementById('payment-items-count').textContent = `${cartItems.length} Item${cartItems.length !== 1 ? 's' : ''}`;
        document.getElementById('payment-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('payment-shipping').value = shipping.toFixed(2);
        document.getElementById('payment-tax').value = tax.toFixed(2);
        document.getElementById('payment-total').value = total.toFixed(2);

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

                cartItems.splice(index, 1);

                localStorage.setItem('cartItems', JSON.stringify(cartItems));

                renderCartItems();
                updateSummary();
            });
        });
    }

    renderCartItems();
    updateSummary();

    let checkoutButton = document.getElementById('checkout-button');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            document.getElementById('cart-page').classList.add('hidden');
            document.getElementById('payment-page').classList.remove('hidden');
        });
    }

    // Form submission
    let orderForm = document.querySelector('form');
    if (orderForm) {
        orderForm.addEventListener('submit', function(e) {
            e.preventDefault();



            localStorage.removeItem('cartItems');
            localStorage.setItem('cartTotalPrice', '0');

            alert('Your order has been placed successfully!');
            window.location.href = '/stor';
        });
    }
});
