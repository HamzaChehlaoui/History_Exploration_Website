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

            <form class="space-y-6" id="order-form">
                <!-- CSRF token if using Laravel -->
                @csrf

                <!-- Order Date -->
                <div>
                    <label class="block text-amber-900 mb-2">Order Date</label>
                    <input type="date" name="date_commande" required
                        class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <!-- Shipping Address -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-amber-900">Shipping Address</h3>
    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-amber-900 mb-2">First Name</label>
                            <input type="text" name="first_name" required
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                        </div>
                        <div>
                            <label class="block text-amber-900 mb-2">Last Name</label>
                            <input type="text" name="last_name" required
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-amber-900 mb-2">Street Address</label>
                        <input type="text" name="shipping_address" required
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-amber-900 mb-2">City</label>
                            <input type="text" name="shipping_city" required
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                        </div>
                        <div>
                            <label class="block text-amber-900 mb-2">State</label>
                            <input type="text" name="shipping_state" required
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                        </div>
                        <div>
                            <label class="block text-amber-900 mb-2">ZIP Code</label>
                            <input type="text" name="shipping_zip_code" required
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-amber-900 mb-2">Country</label>
                        <input type="text" name="shipping_country" required
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                    </div>

                    <div>
                        <label class="block text-amber-900 mb-2">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                    </div>

                    <div>
                        <label class="block text-amber-900 mb-2">Phone Number</label>
                        <input type="tel" name="phone"
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-amber-900">Shipping Information</h3>

                    <div>
                        <label class="block text-amber-900 mb-2">Shipping Method</label>
                        <select name="shipping_method" required
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                            <option value="standard">Standard Shipping (3-5 business days)</option>
                            <option value="express">Express Shipping (1-2 business days)</option>
                            <option value="overnight">Overnight Shipping (Next business day)</option>
                        </select>
                    </div>

                    <div class="hidden">
                        <label class="block text-amber-900 mb-2">Tracking Number</label>
                        <input type="text" name="tracking_number"
                            class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300">
                    </div>
                </div>

                <!-- Payment Method (PayPal Only) -->
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-amber-900">Payment Method</h3>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 124 33" class="h-8">
                                <path fill="#253B80" d="M46.211 6.749h-6.839a.95.95 0 0 0-.939.802l-2.766 17.537a.57.57 0 0 0 .564.658h3.265a.95.95 0 0 0 .939-.803l.746-4.73a.95.95 0 0 1 .938-.803h2.165c4.505 0 7.105-2.18 7.784-6.5.306-1.89.013-3.375-.872-4.415-.97-1.142-2.694-1.746-4.985-1.746zM47 13.154c-.374 2.454-2.249 2.454-4.062 2.454h-1.032l.724-4.583a.57.57 0 0 1 .563-.481h.473c1.235 0 2.4 0 3.002.704.359.42.469 1.044.332 1.906zM66.654 13.075h-3.275a.57.57 0 0 0-.563.481l-.145.916-.229-.332c-.709-1.029-2.29-1.373-3.868-1.373-3.619 0-6.71 2.741-7.312 6.586-.313 1.918.132 3.752 1.22 5.031.998 1.176 2.426 1.666 4.125 1.666 2.916 0 4.533-1.875 4.533-1.875l-.146.91a.57.57 0 0 0 .562.66h2.95a.95.95 0 0 0 .939-.803l1.77-11.209a.568.568 0 0 0-.561-.658zm-4.565 6.374c-.316 1.871-1.801 3.127-3.695 3.127-.951 0-1.711-.305-2.199-.883-.484-.574-.668-1.391-.514-2.301.295-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.499.589.697 1.411.554 2.317zM84.096 13.075h-3.291a.954.954 0 0 0-.787.417l-4.539 6.686-1.924-6.425a.953.953 0 0 0-.912-.678h-3.234a.57.57 0 0 0-.541.754l3.625 10.638-3.408 4.811a.57.57 0 0 0 .465.9h3.287a.949.949 0 0 0 .781-.408l10.946-15.8a.57.57 0 0 0-.468-.895z"></path>
                                <path fill="#179BD7" d="M94.992 6.749h-6.84a.95.95 0 0 0-.938.802l-2.766 17.537a.569.569 0 0 0 .562.658h3.51a.665.665 0 0 0 .656-.562l.785-4.971a.95.95 0 0 1 .938-.803h2.164c4.506 0 7.105-2.18 7.785-6.5.307-1.89.012-3.375-.873-4.415-.971-1.142-2.694-1.746-4.983-1.746zm.789 6.405c-.373 2.454-2.248 2.454-4.062 2.454h-1.031l.725-4.583a.568.568 0 0 1 .562-.481h.473c1.234 0 2.4 0 3.002.704.359.42.468 1.044.331 1.906zM115.434 13.075h-3.273a.567.567 0 0 0-.562.481l-.145.916-.23-.332c-.709-1.029-2.289-1.373-3.867-1.373-3.619 0-6.709 2.741-7.311 6.586-.312 1.918.131 3.752 1.219 5.031 1 1.176 2.426 1.666 4.125 1.666 2.916 0 4.533-1.875 4.533-1.875l-.146.91a.57.57 0 0 0 .564.66h2.949a.95.95 0 0 0 .938-.803l1.771-11.209a.571.571 0 0 0-.565-.658zm-4.565 6.374c-.314 1.871-1.801 3.127-3.695 3.127-.949 0-1.711-.305-2.199-.883-.484-.574-.666-1.391-.514-2.301.297-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.501.589.699 1.411.554 2.317zM119.295 7.23l-2.807 17.858a.569.569 0 0 0 .562.658h2.822c.469 0 .867-.34.939-.803l2.768-17.536a.57.57 0 0 0-.562-.659h-3.16a.571.571 0 0 0-.562.482z"></path>
                                <path fill="#253B80" d="M7.266 29.154l.523-3.322-1.165-.027H1.061L4.927 1.292a.316.316 0 0 1 .314-.268h9.38c3.114 0 5.263.648 6.385 1.927.526.6.861 1.227 1.023 1.917.17.724.173 1.589.007 2.644l-.012.077v.676l.526.298a3.69 3.69 0 0 1 1.065.812c.45.513.741 1.165.864 1.938.127.795.085 1.741-.123 2.812-.24 1.232-.628 2.305-1.152 3.183a6.547 6.547 0 0 1-1.825 2c-.696.494-1.523.869-2.458 1.109-.906.236-1.939.355-3.072.355h-.73c-.522 0-1.029.188-1.427.525a2.21 2.21 0 0 0-.744 1.328l-.055.299-.924 5.855-.042.215c-.011.068-.03.102-.058.125a.155.155 0 0 1-.096.035H7.266z"></path>
                                <path fill="#179BD7" d="M23.048 7.667c-.028.179-.06.362-.096.55-1.237 6.351-5.469 8.545-10.874 8.545H9.326c-.661 0-1.218.48-1.321 1.132L6.596 26.83l-.399 2.533a.704.704 0 0 0 .695.814h4.881c.578 0 1.069-.42 1.16-.99l.048-.248.919-5.832.059-.32c.09-.572.582-.992 1.16-.992h.73c4.729 0 8.431-1.92 9.513-7.476.452-2.321.218-4.259-.978-5.622a4.667 4.667 0 0 0-1.336-1.03z"></path>
                                <path fill="#222D65" d="M21.754 7.151a9.757 9.757 0 0 0-1.203-.267 15.284 15.284 0 0 0-2.426-.177h-7.352a1.172 1.172 0 0 0-1.159.992L8.05 17.605l-.045.289a1.336 1.336 0 0 1 1.321-1.132h2.752c5.405 0 9.637-2.195 10.874-8.545.037-.188.068-.371.096-.55a6.594 6.594 0 0 0-1.017-.429 9.045 9.045 0 0 0-.277-.087z"></path>
                                <path fill="#253B80" d="M9.614 7.699a1.169 1.169 0 0 1 1.159-.991h7.352c.871 0 1.684.057 2.426.177a9.757 9.757 0 0 1 1.481.353c.365.121.704.264 1.017.429.368-2.347-.003-3.945-1.272-5.392C20.378.682 17.853 0 14.622 0h-9.38c-.66 0-1.223.48-1.325 1.133L.01 25.898a.806.806 0 0 0 .795.932h5.791l1.454-9.225 1.564-9.906z"></path>
                            </svg>
                            <span class="ml-2 text-lg font-medium text-gray-700">PayPal</span>
                        </div>

                        <p class="text-gray-700 mb-6">Pay securely with your PayPal account or credit card through PayPal's secure payment gateway.</p>

                        <!-- PayPal Button Container -->
                        <div id="paypal-button-container" class="w-full"></div>

                        <div class="flex items-center mt-6 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>Your financial information is processed securely by PayPal</span>
                        </div>
                    </div>

                    <!-- Hidden fields for PayPal data -->
                    <input type="hidden" name="payment_method" value="PayPal">
                    <input type="hidden" name="payment_reference" id="paypal-transaction-id">
                    <input type="hidden" name="payment_status" value="en_attente">
                </div>

                <!-- Order Summary -->
                <div class="bg-amber-50 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-amber-900 mb-2">Order Summary</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-amber-700">
                            <span id="payment-items-count">3 Items</span>
                            <span id="payment-subtotal">$75.00</span>
                        </div>
                        <div class="flex justify-between text-amber-700">
                            <span>Shipping</span>
                            <input type="number" step="0.01" name="shipping_cost" id="payment-shipping"
                                class="bg-transparent text-right" value="5.99" readonly />
                        </div>
                        <div class="flex justify-between text-amber-700">
                            <span>Tax</span>
                            <input type="number" step="0.01" name="tax" id="payment-tax"
                                class="bg-transparent text-right" value="6.08" readonly />
                        </div>
                        <div class="border-t border-amber-300 pt-2 flex justify-between font-bold text-amber-900">
                            <span>Total</span>
                            <input type="number" step="0.01" name="total_price" id="payment-total"
                                class="bg-transparent text-right font-bold" value="87.07" readonly />
                        </div>
                    </div>
                </div>

                <!-- Hidden user id -->
                <input type="hidden" name="utilisateur_id" value="{{ auth()->user()->id }}">

                <!-- Back to Cart Button -->
                <div class="flex justify-start">
                    <button type="button"
                        onclick="document.getElementById('cart-page').classList.remove('hidden'); document.getElementById('payment-page').classList.add('hidden')"
                        class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                        Back to Cart
                    </button>
                    <div id="paypal-button-container"></div>
                        <button type="submit">Pay with PayPal (Test Mode)</button>

                </div>
            </form>
        </div>
    </div>
</main>
<script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency=USD"></script>
    <script src="/js/shopping_cart.js"></script>

</body>
</html>
