<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Shopping Cart</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .store-card {
            background: linear-gradient(to bottom right, rgba(251, 243, 219, 0.9), rgba(251, 243, 219, 0.7));
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-center sm:justify-between items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-amber-100 cursor-pointer" onclick="window.location.href='/stor'">
                            <span class="text-amber-400">⌛</span> TimeTrekker Store
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Cart Page -->
    <main class="pt-24 pb-12 px-4" id="cart-page">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-amber-900 mb-6">Shopping Cart</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4" id="cart-items-container">
                    <!-- Cart items will be dynamically generated here -->
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="store-card rounded-lg shadow-lg p-6 space-y-4">
                        <h3 class="text-xl font-bold text-amber-900">Order Summary</h3>

                        <div class="space-y-2">
                            <div class="flex justify-between text-amber-700">
                                <span>Subtotal</span>
                                <span id="summary-subtotal">$0.00</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Shipping</span>
                                <span id="summary-shipping">$5.99</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Tax</span>
                                <span id="summary-tax">$0.00</span>
                            </div>
                            <div class="border-t border-amber-300 pt-2 flex justify-between font-bold text-amber-900">
                                <span>Total</span>
                                <span id="summary-total">$0.00</span>
                            </div>
                        </div>

                        <button onclick="document.getElementById('payment-page').classList.remove('hidden'); document.getElementById('cart-page').classList.add('hidden')"
                                class="w-full bg-amber-800 text-amber-100 px-6 py-3 rounded-lg font-semibold hover:bg-amber-700 transition-colors">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Payment Page -->
    <main class="pt-24 pb-12 px-4 hidden" id="payment-page">
        <div class="max-w-3xl mx-auto">
            <div class="store-card rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Secure Payment</h2>

                <form class="space-y-6">
                    <!-- Shipping Address -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Shipping Address</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2">First Name</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div>
                                <label class="block text-amber-900 mb-2">Last Name</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-amber-900 mb-2">Street Address</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2">City</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div>
                                <label class="block text-amber-900 mb-2">State</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div>
                                <label class="block text-amber-900 mb-2">ZIP Code</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Payment Details</h3>

                        <div>
                            <label class="block text-amber-900 mb-2">Card Number</label>
                            <input type="text" placeholder="**** **** **** ****" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <label class="block text-amber-900 mb-2">Expiration Date</label>
                                <input type="text" placeholder="MM/YY" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div>
                                <label class="block text-amber-900 mb-2">CVV</label>
                                <input type="text" placeholder="***" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-amber-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-amber-900 mb-2">Order Summary</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between text-amber-700">
                                <span id="payment-items-count">0 Items</span>
                                <span id="payment-subtotal">$0.00</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Shipping</span>
                                <span id="payment-shipping">$5.99</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Tax</span>
                                <span id="payment-tax">$0.00</span>
                            </div>
                            <div class="border-t border-amber-300 pt-2 flex justify-between font-bold text-amber-900">
                                <span>Total</span>
                                <span id="payment-total">$0.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="document.getElementById('cart-page').classList.remove('hidden'); document.getElementById('payment-page').classList.add('hidden')"
                                class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                            Back to Cart
                        </button>
                        <button type="submit" class="px-6 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            const savedTotal = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
            const shipping = 5.99;


            function renderCartItems() {
                const cartContainer = document.getElementById('cart-items-container');

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
                document.getElementById('payment-shipping').textContent = `$${shipping.toFixed(2)}`;
                document.getElementById('payment-tax').textContent = `$${tax.toFixed(2)}`;
                document.getElementById('payment-total').textContent = `$${total.toFixed(2)}`;

                localStorage.setItem('cartTotalPrice', subtotal);
            }


            function addCartEventListeners() {

                document.querySelectorAll('.decrease-quantity').forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        if (cartItems[index].quantity > 1) {
                            cartItems[index].quantity -= 1;

                            const quantityElement = this.nextElementSibling;
                            quantityElement.textContent = cartItems[index].quantity;

                            const priceElement = this.closest('.flex').querySelector('.item-price');
                            const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                            priceElement.textContent = `$${(unitPrice * cartItems[index].quantity).toFixed(2)}`;

                            localStorage.setItem('cartItems', JSON.stringify(cartItems));
                            updateSummary();
                        }
                    });
                });

                document.querySelectorAll('.increase-quantity').forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        cartItems[index].quantity += 1;

                        const quantityElement = this.previousElementSibling;
                        quantityElement.textContent = cartItems[index].quantity;

                        const priceElement = this.closest('.flex').querySelector('.item-price');
                        const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                        priceElement.textContent = `$${(unitPrice * cartItems[index].quantity).toFixed(2)}`;

                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        updateSummary();
                    });
                });

                document.querySelectorAll('.remove-item').forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));

                        cartItems.splice(index, 1);

                        localStorage.setItem('cartItems', JSON.stringify(cartItems));

                        renderCartItems();
                        updateSummary();
                    });
                });
            }

            // Initialize page
            renderCartItems();
            updateSummary();

            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();

                localStorage.removeItem('cartItems');
                localStorage.setItem('cartTotalPrice', '0');
                window.location.href = '/';
            });
        });
    </script>
</body>
</html>
