<nav class="fixed w-full bg-gradient-to-r from-amber-950 to-amber-800 backdrop-blur-md shadow-xl z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20 items-center">
            <!-- Logo and Brand -->
            <div class="flex items-center space-x-2">
                <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Logo" class="h-8 w-8 md:h-10 md:w-10">
                <span class="text-xl md:text-2xl font-bold text-amber-100">TimeTrekker</span>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <!-- Search button for mobile -->
                <button id="mobile-search-button" class="p-2 rounded-md text-amber-200 hover:text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white mr-1">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Hamburger menu button -->
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-amber-200 hover:text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg id="menu-icon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex md:items-center md:space-x-1 lg:space-x-4">
                <a href="/" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
                <a href="/Explorer" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Explore
                </a>
                <a href="/Stor" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2a2 2 0 100-4zm10 0a2 2 0 100 4 2 2 0 000-4zM7.334 14l.94-2H17a1 1 0 00.96-.74l1.6-6A1 1 0 0018.6 4H6.21l-.28-1.39A1 1 0 005 2H2v2h2l3.6 7.59-1.35 2.44A1 1 0 007 16h12v-2H7.334z"/>
                    </svg>
                    Store
                </a>
                <a href="/about" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    About
                </a>

                <!-- Auth section (placeholder) -->
                @auth
                <div class="relative ml-3">
                    <button type="button" id="user-menu-button" aria-expanded="false" aria-haspopup="true" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Account
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="user-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-amber-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-10" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="/profile" class="text-amber-200 hover:bg-amber-700 hover:text-white block px-4 py-2 text-sm flex items-center gap-2" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </a>
                            <a href="/favorites" class="text-amber-200 hover:bg-amber-700 hover:text-white block px-4 py-2 text-sm flex items-center gap-2" role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Favorites
                            </a>
                            <button type="button" class="text-amber-200 px-3 py-2 rounded-md text-sm font-medium transition-all hover:bg-amber-700 hover:text-white duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1" aria-label="Notifications">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.07-1.64-5.64-4.5-6.32V4a1.5 1.5 0 00-3 0v.68C7.64 5.36 6 7.929 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                Notifications
                            </button>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="text-amber-200 hover:text-white hover:bg-amber-700 hover:text-white block w-full text-left px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-amber-200 px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-amber-700/80 hover:text-white flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Login
                </a>
            @endauth
            </div>

            <!-- Search (desktop only) -->
            <div class="hidden md:block relative">
                <input type="search" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg bg-amber-800/50 text-amber-100 placeholder-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Mobile search bar (initially hidden) -->
    <div id="mobile-search-container" class="hidden px-4 py-2 bg-amber-900/90 backdrop-blur-md">
        <div class="relative">
            <input type="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-amber-800/50 text-amber-100 placeholder-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
    </div>

    <!-- Mobile menu (initially hidden) -->
    <div id="mobile-menu" class="hidden md:hidden bg-amber-900/90 backdrop-blur-md">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="/Explorer" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Explore
            </a>
            <a href="/Stor" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2a2 2 0 100-4zm10 0a2 2 0 100 4 2 2 0 000-4zM7.334 14l.94-2H17a1 1 0 00.96-.74l1.6-6A1 1 0 0018.6 4H6.21l-.28-1.39A1 1 0 005 2H2v2h2l3.6 7.59-1.35 2.44A1 1 0 007 16h12v-2H7.334z"/>
                </svg>
                Store
            </a>
            <a href="/about" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About
            </a>

            <!-- Auth links for mobile -->
            <a href="/login" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Login
            </a>

            <!-- Placeholder for authenticated users (can be expanded) -->

            <a href="/profile" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Profile
            </a>
            <a href="/favorites" class="text-amber-200 hover:text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Favorites
            </a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="text-amber-200 hover:text-white block w-full text-left px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<!-- JavaScript for improved responsive functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // User dropdown functionality
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function(event) {
                event.stopPropagation();
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                userDropdown.classList.toggle('hidden');
            });
        }

        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');

                // Close search if menu is opened
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileSearchContainer.classList.add('hidden');
                }
            });
        }

        // Mobile search functionality
        const mobileSearchButton = document.getElementById('mobile-search-button');
        const mobileSearchContainer = document.getElementById('mobile-search-container');

        if (mobileSearchButton && mobileSearchContainer) {
            mobileSearchButton.addEventListener('click', function() {
                mobileSearchContainer.classList.toggle('hidden');

                // Close menu if search is opened
                if (!mobileSearchContainer.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        }

        // Close the dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (userDropdown && !userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                userMenuButton.setAttribute('aria-expanded', 'false');
                userDropdown.classList.add('hidden');
            }
        });

        // Responsive adjustment for scroll
        const nav = document.querySelector('nav');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                nav.classList.add('shadow-2xl');
                nav.classList.add('bg-opacity-95');
            } else {
                nav.classList.remove('shadow-2xl');
                nav.classList.remove('bg-opacity-95');
            }
        });
    });
</script>
