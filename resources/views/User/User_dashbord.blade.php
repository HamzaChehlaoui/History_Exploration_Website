<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Your Dashboard</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes floatingEffect {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: floatingEffect 3s ease-in-out infinite;
        }

        .time-portal {
            background: conic-gradient(from 0deg, #4a2208, #854d0e, #713f12, #4a2208);
            animation: spin 20s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-between items-center">
                    <div class="flex-shrink-0 floating">
                        <h1 class="text-2xl font-bold text-amber-100 font-serif">
                            <span class="text-amber-400">⌛</span> TimeTrekker
                        </h1>
                    </div>
                    <div class="hidden sm:flex sm:space-x-8">
                        <a href="index.html" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">Home</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">Explore</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">About</a>
                        <div class="relative">
                            <button class="flex items-center text-amber-100 hover:text-amber-200">
                                <img src="https://media.licdn.com/dms/image/v2/D4E03AQFWCBmuwtAlgg/profile-displayphoto-shrink_400_400/B4EZSXbCmpGwAg-/0/1737707237271?e=1743638400&v=beta&t=x9JJjjcO7Ce3Sy1Ek5m4blpq7ZsLZ9dmdia-rPOWrps" alt="Profile" class="h-8 w-8 rounded-full border-2 border-amber-400"/>
                                <span class="ml-2">Hamza cheh</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-amber-900">Welcome Back, Time Traveler</h2>
                <p class="text-amber-700">Continue your journey through history</p>
            </div>

            <!-- Main Dashboard Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Notifications & Updates -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Notifications -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Latest Updates</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-amber-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-amber-200 flex items-center justify-center">
                                        <span class="text-amber-700">📚</span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-amber-900 font-semibold">New Article Published</h4>
                                    <p class="text-amber-700">"The Hidden Treasures of Ancient Egypt" has been added to your interests.</p>
                                    <p class="text-sm text-amber-600 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4 p-4 bg-amber-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-amber-200 flex items-center justify-center">
                                        <span class="text-amber-700">🎯</span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-amber-900 font-semibold">Achievement Unlocked</h4>
                                    <p class="text-amber-700">You've completed the "Renaissance Explorer" collection!</p>
                                    <p class="text-sm text-amber-600 mt-1">1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Upcoming Historical Events</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-amber-50 rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-semibold text-amber-900">Anniversary: Moon Landing</h4>
                                        <p class="text-amber-700">July 20</p>
                                    </div>
                                    <button class="text-amber-600 hover:text-amber-500">
                                        Add to calendar
                                    </button>
                                </div>
                            </div>
                            <div class="p-4 bg-amber-50 rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-semibold text-amber-900">Virtual Tour: Ancient Rome</h4>
                                        <p class="text-amber-700">August 15</p>
                                    </div>
                                    <button class="text-amber-600 hover:text-amber-500">
                                        Add to calendar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Saved Content & Recommendations -->
                <div class="space-y-8">
                    <!-- Saved Content -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Your Watchlist</h3>
                        <div class="space-y-4">
                            <div class="group hover:bg-amber-50 p-3 rounded-lg transition-colors">
                                <h4 class="font-semibold text-amber-900">The Great Wall's Secrets</h4>
                                <p class="text-sm text-amber-700">Ancient Chinese Architecture</p>
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-xs text-amber-600">Added 2 days ago</span>
                                    <button class="text-amber-600 hover:text-amber-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="group hover:bg-amber-50 p-3 rounded-lg transition-colors">
                                <h4 class="font-semibold text-amber-900">Viking Navigation Techniques</h4>
                                <p class="text-sm text-amber-700">Maritime History</p>
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-xs text-amber-600">Added 5 days ago</span>
                                    <button class="text-amber-600 hover:text-amber-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Recommendations -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Recommended for You</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-3 hover:bg-amber-50 rounded-lg transition-colors">
                                <img src="https://imgcdn.stablediffusionweb.com/2024/12/8/d03e331b-dfd5-488a-b118-f2dc49095305.jpg" alt="Medieval Castle" class="h-16 w-16 object-cover rounded-lg"/>
                                <div>
                                    <h4 class="font-semibold text-amber-900">Medieval Castle Architecture</h4>
                                    <p class="text-sm text-amber-700">Based on your interest in medieval history</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 p-3 hover:bg-amber-50 rounded-lg transition-colors">
                                <img src="https://c4.wallpaperflare.com/wallpaper/759/478/411/video-games-video-game-art-assassin-s-creed-odyssey-greece-wallpaper-preview.jpg" alt="Ancient Greece" class="h-16 w-16 object-cover rounded-lg"/>
                                <div>
                                    <h4 class="font-semibold text-amber-900">Greek Philosophy</h4>
                                    <p class="text-sm text-amber-700">Popular in Ancient Civilizations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
