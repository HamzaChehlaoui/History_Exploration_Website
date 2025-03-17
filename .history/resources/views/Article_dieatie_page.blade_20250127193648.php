<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Renaissance: A Cultural Rebirth - TimeTrekker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <style>
        .timeline-dot {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .article-content {
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-amber-100">
                        <span class="text-amber-400">⌛</span> TimeTrekker
                    </h1>
                    <div class="hidden sm:flex sm:space-x-8">
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Home</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Explore</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Login</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">About</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Article Header -->
    <div class="pt-24 pb-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="relative rounded-xl overflow-hidden mb-8 h-96">
            <img src="https://static1.pocketlintimages.com/wordpress/wp-content/uploads/149332-apps-feature-amusing-images-of-cartoon-characters-in-photoshopped-into-renaissance-paintings-image13-tk2yrxwozc.jpg" alt="Renaissance Art" class="w-full h-full object-cover"/>
            <div class="absolute inset-0 bg-gradient-to-t from-amber-900/80 to-transparent"></div>
            <div class="absolute bottom-0 p-8">
                <h1 class="text-4xl font-bold text-amber-100 mb-4">The Renaissance: A Cultural Rebirth</h1>
                <div class="flex items-center text-amber-200 space-x-4">
                    <span>By Maria Hernandez</span>
                    <span>•</span>
                    <span>Published: January 15, 2025</span>
                    <span>•</span>
                    <span>15 min read</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Article Content -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-xl shadow-md p-8 article-content">
                    <p class="text-lg text-amber-900">
                        The Renaissance marked a pivotal moment in human history, spanning roughly from the 14th to the 17th century. This extraordinary period of cultural rebirth began in Florence, Italy, before spreading throughout Europe, revolutionizing art, science, politics, and human thought.
                    </p>

                    <!-- Interactive Timeline -->
                    <div class="my-8 bg-amber-50 p-6 rounded-lg">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Key Renaissance Timeline</h3>
                        <div class="relative">
                            <div class="absolute left-8 top-0 bottom-0 w-1 bg-amber-300"></div>
                            <div class="space-y-8">
                                <div class="relative pl-12">
                                    <div class="absolute left-6 w-4 h-4 bg-amber-500 rounded-full timeline-dot"></div>
                                    <h4 class="font-bold text-amber-900">1401</h4>
                                    <p class="text-amber-800">Competition for Florence Baptistery doors marks the beginning</p>
                                </div>
                                <div class="relative pl-12">
                                    <div class="absolute left-6 w-4 h-4 bg-amber-500 rounded-full timeline-dot"></div>
                                    <h4 class="font-bold text-amber-900">1447</h4>
                                    <p class="text-amber-800">Vatican Library founded by Pope Nicholas V</p>
                                </div>
                                <div class="relative pl-12">
                                    <div class="absolute left-6 w-4 h-4 bg-amber-500 rounded-full timeline-dot"></div>
                                    <h4 class="font-bold text-amber-900">1492</h4>
                                    <p class="text-amber-800">Columbus reaches the Americas</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-lg text-amber-900">
                        The Renaissance revolutionized artistic techniques, introducing linear perspective, sfumato, and chiaroscuro. These innovations allowed artists to create more realistic and emotionally powerful works than ever before.
                    </p>

                    <!-- Interactive Map Placeholder -->
                    <div class="my-8 bg-amber-50 p-6 rounded-lg">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Spread of Renaissance Culture</h3>
                        <img src="https://c4.wallpaperflare.com/wallpaper/614/255/808/map-iceland-cartography-renaissance-wallpaper-preview.jpg" alt="" class="w-full rounded-lg"/>
                    </div>
                </article>

                <!-- Comments Section -->
                <div class="mt-8 bg-white rounded-xl shadow-md p-8">
                    <h3 class="text-xl font-bold text-amber-900 mb-6">Discussion</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <img src="https://c4.wallpaperflare.com/wallpaper/512/726/574/tv-show-game-of-thrones-jon-snow-kit-harington-hd-wallpaper-preview.jpg" alt="User Avatar" class="w-10 h-10 rounded-full"/>
                            <div class="flex-1">
                                <textarea class="w-full p-4 border border-amber-200 rounded-lg" placeholder="Share your thoughts..."></textarea>
                                <button class="mt-2 px-6 py-2 bg-amber-700 text-amber-100 rounded-lg hover:bg-amber-600">Comment</button>
                            </div>
                        </div>
                        
                        <!-- Example Comment -->
                        <div class="flex gap-4 pt-4 border-t border-amber-100">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK-TkSxp2XY7RrdTzs8sL7CdLaVH5VUjfhLQ&s" alt="User Avatar" class="w-10 h-10 rounded-full"/>
                            <div>
                                <h4 class="font-bold text-amber-900">John Smith</h4>
                                <p class="text-amber-800">Fascinating article! The timeline really helps visualize how these events connected.</p>
                                <div class="mt-2 text-amber-600 text-sm">
                                    <button class="hover:text-amber-700">Reply</button>
                                    <span class="mx-2">•</span>
                                    <span>2 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Share Widget -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Share This Article</h3>
                    <div class="flex space-x-4">
                        <button class="flex-1 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Facebook</button>
                        <button class="flex-1 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">Twitter</button>
                    </div>
                </div>

                <!-- References -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">References</h3>
                    <ul class="space-y-3 text-amber-800">
                        <li>
                            <a href="#" class="hover:text-amber-600">
                                "The Story of Art" by E.H. Gombrich
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-amber-600">
                                "The Civilization of the Renaissance in Italy" by Jacob Burckhardt
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-amber-600">
                                Florence Museum Archives
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Related Articles -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Related Articles</h3>
                    <div class="space-y-4">
                        <a href="#" class="block hover:bg-amber-50 p-2 rounded-lg">
                            <h4 class="font-bold text-amber-900">The Medici Family's Influence</h4>
                            <p class="text-amber-700 text-sm">How one family shaped the Renaissance</p>
                        </a>
                        <a href="#" class="block hover:bg-amber-50 p-2 rounded-lg">
                            <h4 class="font-bold text-amber-900">Leonardo da Vinci's Legacy</h4>
                            <p class="text-amber-700 text-sm">The ultimate Renaissance man</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-16 bg-amber-900 text-amber-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>© 2025 TimeTrekker. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>