<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Shopping Cart</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="/js/shopping_cart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <h1 class="text-2xl font-bold text-amber-100 cursor-pointer" onclick="window.location.href='/store'">
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
                @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

                <form class="space-y-6" method="POST" id="order-form" action="{{ route('stripe.checkout') }}">
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

                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2">City</label>
                                <input type="text" name="shipping_city" required
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




                    <!-- Order Notes -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Additional Notes</h3>
                        <div>
                            <label class="block text-amber-900 mb-2">Order Notes (optional)</label>
                            <textarea name="notes" rows="3"
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300"
                                placeholder="Special instructions for delivery, etc."></textarea>
                        </div>
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

                    <!-- Back to Cart Button and Submit -->
                    <div class="flex justify-between items-center">
                        <button type="button"
                            onclick="document.getElementById('cart-page').classList.remove('hidden'); document.getElementById('payment-page').classList.add('hidden')"
                            class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                            Back to Cart
                        </button>

                        <button type="submit">Pay with Stripe</button>
                    </div>
                </form>


            </div>
        </div>
    </main>

    <script src="/js/shopping_cart.js"></script>
</body>
</html>
