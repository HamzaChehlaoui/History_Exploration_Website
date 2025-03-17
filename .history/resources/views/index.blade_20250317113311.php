<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Voyage Through the Ages</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>


        .time-portal {
            background: conic-gradient(from 0deg, #4a2208, #854d0e, #713f12, #4a2208);
            animation: spin 20s linear infinite;
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

        .timeline-track {
            background: repeating-linear-gradient(
                45deg,
                #92400e,
                #92400e 10px,
                #78350f 10px,
                #78350f 20px
            );
        }
        .wave-container {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      overflow: hidden;
    }

    .wave {
      position: relative;
      width: 100%;
      height: auto;
    }

    .historical-texture {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 320px;
      background-image: url('/api/placeholder/800/320');
      background-size: cover;
      opacity: 0.1;
      mix-blend-mode: multiply;
    }

    .timeline-markers {
      position: absolute;
      bottom: 40px;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-around;
      padding: 0 5%;
    }

    .marker {
      height: 30px;
      width: 2px;
      background-color: rgba(120, 60, 10, 0.7);
      position: relative;
    }

    .marker::after {
      content: attr(data-year);
      position: absolute;
      bottom: -25px;
      left: 50%;
      transform: translateX(-50%);
      font-family: 'Georgia', serif;
      font-size: 12px;
      color: #5c4023;
    }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
@include('/resources/views/navbare_visitoure/nav.blade.php')

      <!-- Hero Section -->
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://img.le-dictionnaire.com/histoire-temps.jpg');">
            <span class="w-full h-full absolute opacity-50 bg-amber-900"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="floating">
                        <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold text-amber-100 mb-6 font-serif">
                            Where Time Becomes
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-200 to-amber-400">Adventure</span>
                        </h1>
                        <p class="text-xl text-amber-200 mb-8 max-w-2xl mx-auto">
                            Step through the portals of time and witness history unfold before your eyes
                        </p>
                        <div class="space-x-4">
                            <a href="#" class="inline-block bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100 px-8 py-3 rounded-lg font-semibold hover:from-amber-600 hover:to-amber-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Begin Your Journey
                            </a>
                            <a href="#" class="inline-block bg-gradient-to-r from-amber-100 to-amber-200 text-amber-900 px-8 py-3 rounded-lg font-semibold hover:from-amber-200 hover:to-amber-300 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Join Our Community
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Historical Events Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-amber-900 mb-8 text-center font-serif">Pivotal Moments in History</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event Cards with vintage styling -->
                <div class="bg-amber-100 rounded-lg shadow-md overflow-hidden border border-amber-200 hover:shadow-xl transition-shadow">
                    <img src="https://t3.ftcdn.net/jpg/09/13/76/72/360_F_913767210_YnpVVDo3KlinDAcV8gMu9aOs1PmXo4qV.jpg" alt="Historical Event 1" class="w-full h-48 object-cover"/>
                    <div class="p-6">
                        <h4 class="text-xl font-semibold mb-2 text-amber-900">The Industrial Revolution</h4>
                        <p class="text-amber-800">Discover how the Industrial Revolution transformed society and shaped our modern world.</p>
                    </div>
                </div>
                <div class="bg-amber-100 rounded-lg shadow-md overflow-hidden border border-amber-200 hover:shadow-xl transition-shadow">
                    <img src="https://wallpapercave.com/wp/wp3018465.jpg" alt="Historical Event 2" class="w-full h-48 object-cover"/>
                    <div class="p-6">
                        <h4 class="text-xl font-semibold mb-2 text-amber-900">The Renaissance</h4>
                        <p class="text-amber-800">Explore the cultural rebirth that revolutionized art, science, and philosophy.</p>
                    </div>
                </div>
                <div class="bg-amber-100 rounded-lg shadow-md overflow-hidden border border-amber-200 hover:shadow-xl transition-shadow">
                    <img src="https://w0.peakpx.com/wallpaper/122/656/HD-wallpaper-space-race-ultra-space-planet-race.jpg" alt="Historical Event 3" class="w-full h-48 object-cover"/>
                    <div class="p-6">
                        <h4 class="text-xl font-semibold mb-2 text-amber-900">The Space Race</h4>
                        <p class="text-amber-800">Journey through humanity's greatest adventure into the final frontier.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Content Section -->
    <section class="py-16 bg-amber-800 text-amber-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-3xl font-bold font-serif">Featured Discoveries</h3>
                <div class="space-x-4">
                    <select class="rounded-lg bg-amber-700 text-amber-100 py-2 px-4 border-amber-600">
                        <option>All Regions</option>
                        <option>Europe</option>
                        <option>Asia</option>
                        <option>Americas</option>
                    </select>
                    <select class="rounded-lg bg-amber-700 text-amber-100 py-2 px-4 border-amber-600">
                        <option>All Time Periods</option>
                        <option>Ancient</option>
                        <option>Medieval</option>
                        <option>Modern</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex space-x-4 bg-amber-900/50 p-4 rounded-lg">
                    <img src="https://c4.wallpaperflare.com/wallpaper/1022/195/618/landscape-pyramid-egypt-architecture-wallpaper-preview.jpg" alt="Featured 1" class="w-32 h-32 object-cover rounded-lg"/>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Ancient Egyptian Architecture</h4>
                        <p class="text-amber-200">Uncover the mysteries behind the construction of the pyramids.</p>
                    </div>
                </div>
                <div class="flex space-x-4 bg-amber-900/50 p-4 rounded-lg">
                    <img src="https://static.wixstatic.com/media/c90d45_579e8fb78f23465f918e86976c74144b~mv2.webp/v1/fill/w_568,h_324,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c90d45_579e8fb78f23465f918e86976c74144b~mv2.webp" alt="Featured 2" class="w-32 h-32 object-cover rounded-lg"/>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">The Age of Discovery</h4>
                        <p class="text-amber-200">Follow the journeys of history's greatest explorers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-amber-900 mb-8 text-center font-serif">Voices from Our Community</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"TimeTrekker has transformed how I understand history. The interactive timeline feature is brilliant!"</p>
                    <p class="font-semibold text-amber-900">- Sarah Johnson</p>
                </div>
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"As a history teacher, this platform has become an invaluable resource for my classroom."</p>
                    <p class="font-semibold text-amber-900">- Michael Chen</p>
                </div>
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"The detailed articles and visual aids make learning history engaging and fun."</p>
                    <p class="font-semibold text-amber-900">- Emma Thompson</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-amber-900 text-amber-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4 font-serif">TimeTrekker</h4>
                    <p class="text-amber-200">Exploring history, one moment at a time.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">About Us</a></li>
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">Contact</a></li>
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">Terms of Service</a></li>
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">Privacy Policy</a></li>
                        <li><a href="#" class="text-amber-200 hover:text-amber-100">Cookie Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-amber-200 hover:text-amber-100">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-amber-200 hover:text-amber-100">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-amber-200 hover:text-amber-100">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <!-- Twitter and Instagram -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
