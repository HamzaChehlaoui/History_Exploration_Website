<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Delivery</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .timeline-track {
            background: repeating-linear-gradient(
                45deg,
                #92400e,
                #92400e 10px,
                #78350f 10px,
                #78350f 20px
            );
        }

        .parchment {
            background-color: #fffbeb;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23b45309' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .scroll-trigger {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }

        .scroll-trigger.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .time-badge {
            background: conic-gradient(from 0deg, #78350f, #b45309, #92400e, #78350f);
        }

        .delivery-step {
            position: relative;
        }

        .delivery-step:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 32px;
            left: 16px;
            width: 2px;
            height: calc(100% - 16px);
            background: #92400e;
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation Bar -->
    <header class="bg-amber-900 text-amber-100 px-4 py-3 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Logo" class="h-10 w-10">
                <span class="text-2xl font-bold">TimeTrekker</span>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Explore</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Timeline</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Community</a></li>
                    <li><a href="#" class="font-bold text-amber-300 border-b-2 border-amber-300">Delivery</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Header Section -->
    <section class="relative h-48 bg-cover bg-center" style="background-image: url('https://img.freepik.com/premium-photo/ancient-delivery-service-concept-vintage-chariot-delivering-artifacts_364064-187.jpg?w=1380');">
        <div class="absolute inset-0 bg-amber-900 opacity-70"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-amber-100">Time-Traveled Artifact Delivery</h1>
                <p class="text-xl text-amber-200 mt-2">Safe passage through the temporal stream</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Tracking Information -->
        <div class="mb-12 parchment p-6 rounded-lg shadow-md border border-amber-300">
            <h2 class="text-2xl font-bold text-amber-900 mb-4">Delivery Tracking</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-amber-800 mb-2">Tracking Number</h3>
                    <div class="bg-amber-50 p-3 rounded border border-amber-200 flex items-center justify-between">
                        <span class="font-medium text-amber-900">TT-1242-BYZ-8764</span>
                        <button class="text-amber-700 hover:text-amber-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-amber-800 mb-2">Origin Time</h3>
                    <div class="bg-amber-50 p-3 rounded border border-amber-200">
                        <p class="font-medium text-amber-900">Byzantine Empire, 532 AD</p>
                        <p class="text-sm text-amber-700">Constantinople Market District</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-amber-800 mb-2">Arrival Time</h3>
                    <div class="bg-amber-50 p-3 rounded border border-amber-200">
                        <p class="font-medium text-amber-900">March 19, 2025</p>
                        <p class="text-sm text-amber-700">Estimated Arrival: 2:30 PM</p>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold text-amber-800 mb-2">Artifact Details</h3>
                <div class="bg-amber-50 p-3 rounded border border-amber-200">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/4 mb-4 md:mb-0">
                            <img src="https://www.okmdetectors.com/cdn/shop/files/gold-coin-byzantine-empire-turkiye-preview.png?v=1695303400&width=420" alt="Byzantine Coin" class="rounded-md h-36 w-full object-contain">
                        </div>
                        <div class="md:w-3/4 md:pl-4">
                            <h4 class="font-semibold text-amber-900">Byzantine Gold Solidus</h4>
                            <p class="text-amber-800 mb-2">A remarkably well-preserved gold coin from the reign of Emperor Justinian I, discovered in a marketplace in Constantinople.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-amber-700">Weight: <span class="font-medium text-amber-900">4.5 grams</span></p>
                                    <p class="text-sm text-amber-700">Dimensions: <span class="font-medium text-amber-900">2.2 cm diameter</span></p>
                                </div>
                                <div>
                                    <p class="text-sm text-amber-700">Temporal Fragility: <span class="font-medium text-amber-900">Low</span></p>
                                    <p class="text-sm text-amber-700">Preservation Level: <span class="font-medium text-amber-900">Grade A</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivery Progress -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Delivery Progress</h2>
            <div class="relative">
                <div class="space-y-6">
                    <!-- Step 1 -->
                    <div class="delivery-step pl-10 scroll-trigger visible">
                        <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="parchment p-4 rounded-lg shadow-md border border-amber-300">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-amber-900">Artifact Acquired</h3>
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-amber-800">March 12, 2025</span>
                                    <span class="ml-2 px-2 py-1 bg-amber-200 text-amber-800 rounded-full text-xs">Completed</span>
                                </div>
                            </div>
                            <p class="text-amber-800 mt-2">
                                Artifact purchased from Byzantine merchant at the Grand Bazaar of Constantinople. Authenticity verified and temporal coordinates logged.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="delivery-step pl-10 scroll-trigger visible">
                        <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="parchment p-4 rounded-lg shadow-md border border-amber-300">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-amber-900">Temporal Preservation</h3>
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-amber-800">March 14, 2025</span>
                                    <span class="ml-2 px-2 py-1 bg-amber-200 text-amber-800 rounded-full text-xs">Completed</span>
                                </div>
                            </div>
                            <p class="text-amber-800 mt-2">
                                Artifact stabilized in quantum-locked preservation chamber. Temporal decay halted and artifact prepared for safe passage through the timestream.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="delivery-step pl-10 scroll-trigger visible">
                        <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="parchment p-4 rounded-lg shadow-md border border-amber-300">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-amber-900">Temporal Transit Initiated</h3>
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-amber-800">March 15, 2025</span>
                                    <span class="ml-2 px-2 py-1 bg-amber-200 text-amber-800 rounded-full text-xs">Completed</span>
                                </div>
                            </div>
                            <p class="text-amber-800 mt-2">
                                Artifact entered the chronoportation chamber and timeline trajectory calculated. Quantum signatures mapped for safe temporal navigation.
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="delivery-step pl-10 scroll-trigger visible">
                        <div class="absolute left-0 w-8 h-8 bg-amber-700 rounded-full flex items-center justify-center z-10">
                            <div class="h-3 w-3 bg-amber-300 rounded-full animate-pulse"></div>
                        </div>
                        <div class="parchment p-4 rounded-lg shadow-md border border-amber-300">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-amber-900">Time Stream Transit</h3>
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-amber-800">Current</span>
                                    <span class="ml-2 px-2 py-1 bg-amber-100 text-amber-800 rounded-full text-xs">In Progress</span>
                                </div>
                            </div>
                            <p class="text-amber-800 mt-2">
                                Artifact currently navigating the temporal stream. Chronometric stabilizers functioning at optimal levels. Progress: 76% complete.
                            </p>
                            <div class="mt-3 bg-amber-100 rounded-full h-4 overflow-hidden">
                                <div class="h-full w-3/4 timeline-track"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
