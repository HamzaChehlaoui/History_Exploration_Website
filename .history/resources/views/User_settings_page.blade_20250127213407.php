<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - User Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-center sm:justify-between items-center">
                    <div class="flex-shrink-0 floating">
                        <h1 class="text-2xl font-bold text-amber-100">
                            <span class="text-amber-400">⌛</span> TimeTrekker
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-12 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-amber-900 mb-8 text-center">Account Settings</h1>
            
            <!-- Settings Container -->
            <div class="settings-card rounded-lg shadow-xl p-6 mb-8">
                <!-- Profile Section -->
                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-amber-900 mb-6 flex items-center">
                        <span class="bg-amber-800 text-amber-100 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        Profile
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <div class="aspect-square w-full bg-amber-200 rounded-lg flex items-center justify-center relative overflow-hidden">
                                <img src="https://media.licdn.com/dms/image/v2/D4E03AQFWCBmuwtAlgg/profile-displayphoto-shrink_400_400/B4EZSXbCmpGwAg-/0/1737707237271?e=1743638400&v=beta&t=x9JJjjcO7Ce3Sy1Ek5m4blpq7ZsLZ9dmdia-rPOWrps" alt="Profile" class="w-full h-full object-cover"/>
                                <button class="absolute bottom-2 right-2 bg-amber-800 text-amber-100 p-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="block text-amber-900 font-semibold mb-2">Full Name</label>
                                <input type="text" class="w-full px-4 py-2 rounded-lg border border-amber-300 bg-amber-50 focus:outline-none focus:ring-2 focus:ring-amber-500" value="hamza chehlaoui"/>
                            </div>
                            <div>
                                <label class="block text-amber-900 font-semibold mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-2 rounded-lg border border-amber-300 bg-amber-50 focus:outline-none focus:ring-2 focus:ring-amber-500" value="hamza@example.com"/>
                            </div>
                            <div>
                                <label class="block text-amber-900 font-semibold mb-2">Bio</label>
                                <textarea class="w-full px-4 py-2 rounded-lg border border-amber-300 bg-amber-50 focus:outline-none focus:ring-2 focus:ring-amber-500 h-24">History enthusiast passionate about ancient civilizations</textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Notification Settings -->
                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-amber-900 mb-6 flex items-center">
                        <span class="bg-amber-800 text-amber-100 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </span>
                        Notification Settings
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-amber-900">Email Notifications</h3>
                                <p class="text-amber-700 text-sm">Receive updates about your activity via email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-amber-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-800"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg">
                            <div>
                                <h3 class="font-semibold text-amber-900">Browser Notifications</h3>
                                <p class="text-amber-700 text-sm">Receive real-time notifications in your browser</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-amber-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-800"></div>
                            </label>
                        </div>
                    </div>
                </section>

                <!-- Privacy Settings -->
                <section>
                    <h2 class="text-2xl font-bold text-amber-900 mb-6 flex items-center">
                        <span class="bg-amber-800 text-amber-100 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        Privacy Settings
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="p-4 bg-amber-50 rounded-lg">
                            <h3 class="font-semibold text-amber-900 mb-3">Who can see your comments</h3>
                            <select class="w-full px-4 py-2 rounded-lg border border-amber-300 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500">
                                <option>Everyone</option>
                                <option>Only followers</option>
                                <option>Only me</option>
                            </select>
                        </div>
                        
                        <div class="p-4 bg-amber-50 rounded-lg">
                            <h3 class="font-semibold text-amber-900 mb-3">Who can see your articles</h3>
                            <select class="w-full px-4 py-2 rounded-lg border border-amber-300 bg-white focus:outline-none focus:ring-2 focus:ring-amber-500">
                                <option>Everyone</option>
                                <option>Only followers</option>
                                <option>Only me</option>
                            </select>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Save Button -->
            <div class="text-center">
                <button class="bg-amber-800 text-amber-100 px-8 py-3 rounded-lg font-semibold hover:bg-amber-700 transition-colors transform hover:scale-105 duration-200">
                    Save Changes
                </button>
            </div>
        </div>
    </main>
</body>
</html>