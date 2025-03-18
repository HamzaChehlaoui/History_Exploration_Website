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
                        <h1 class="text-2xl font-bold text-amber-100">
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
                <div class="lg:col-span-2 space-y-4">
                    <!-- Cart Item 1 -->
                    <div class="store-card rounded-lg shadow-lg p-4">
                        <div class="flex gap-4">
                            <img src="https://th.bing.com/th/id/OIP.x2ECQILsY0coJ2IjDmllJwHaJu?rs=1&pid=ImgDetMain" alt="Ancient Civilizations Book" class="w-24 h-24 object-cover rounded-lg"/>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-lg font-semibold text-amber-900">Ancient Civilizations: A Complete Guide</h3>
                                    <button class="text-amber-700 hover:text-amber-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-amber-700 text-sm">Comprehensive guide to ancient civilizations</p>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="flex items-center space-x-2">
                                        <button class="w-8 h-8 rounded-full bg-amber-200 text-amber-900">-</button>
                                        <span class="w-8 text-center">1</span>
                                        <button class="w-8 h-8 rounded-full bg-amber-200 text-amber-900">+</button>
                                    </div>
                                    <span class="text-lg font-bold text-amber-900">$29.99</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="store-card rounded-lg shadow-lg p-4">
                        <div class="flex gap-4">
                            <img src="https://th.bing.com/th/id/R.980228e453700a479d1e30b4cc51fc2b?rik=9O6%2bhWTbwQE4lA&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2ff%2fd%2fd%2f327266.jpg&ehk=Wqx0bJSWeQrEHBfr75MYvRoZAaX2zJ06wVngblP%2bF0c%3d&risl=&pid=ImgRaw&r=0" alt="Vintage World Map" class="w-24 h-24 object-cover rounded-lg"/>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="text-lg font-semibold text-amber-900">Vintage World Map (1800s)</h3>
                                    <button class="text-amber-700 hover:text-amber-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-amber-700 text-sm">High-quality reproduction map</p>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="flex items-center space-x-2">
                                        <button class="w-8 h-8 rounded-full bg-amber-200 text-amber-900">-</button>
                                        <span class="w-8 text-center">1</span>
                                        <button class="w-8 h-8 rounded-full bg-amber-200 text-amber-900">+</button>
                                    </div>
                                    <span class="text-lg font-bold text-amber-900">$49.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="store-card rounded-lg shadow-lg p-6 space-y-4">
                        <h3 class="text-xl font-bold text-amber-900">Order Summary</h3>

                        <div class="space-y-2">
                            <div class="flex justify-between text-amber-700">
                                <span>Subtotal</span>
                                <span>$79.98</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Shipping</span>
                                <span>$5.99</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Tax</span>
                                <span>$8.00</span>
                            </div>
                            <div class="border-t border-amber-300 pt-2 flex justify-between font-bold text-amber-900">
                                <span>Total</span>
                                <span>$93.97</span>
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
                                <span>2 Items</span>
                                <span>$79.98</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Shipping</span>
                                <span>$5.99</span>
                            </div>
                            <div class="flex justify-between text-amber-700">
                                <span>Tax</span>
                                <span>$8.00</span>
                            </div>
                            <div class="border-t border-amber-300 pt-2 flex justify-between font-bold text-amber-900">
                                <span>Total</span>
                                <span>$93.97</span>
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
</body>
</html>
