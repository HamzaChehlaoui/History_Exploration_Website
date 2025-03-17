<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Login Portal</title>

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

        /* @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        } */
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    @include('navbare_visitoure.nav')


    <!-- Login/Register Section -->
    <div class="min-h-screen pt-16 pb-12 flex flex-col justify-center ">
        <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <div class="absolute inset-0 time-portal opacity-5"></div>
            </div>

            <!-- Login Form -->
            <div class="relative bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-8 border border-amber-200 mt-[3rem]">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-amber-900 mb-2">Welcome Back, Time Traveler</h2>
                    <p class="text-amber-700">Your journey through history awaits</p>
                </div>

                <!-- Social Login Buttons -->
                <div class="space-y-4 mb-6">
                    <button class="w-full flex items-center justify-center gap-3 bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                        Continue with Facebook
                    </button>
                    <button class="w-full flex items-center justify-center gap-3 bg-white text-gray-700 py-3 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <img src="https://yt3.googleusercontent.com/FJI5Lzbf2dMd32xOqhoKpJArJooZhoX6v2qOcFO-wjSZUvs3H9xqq2gK4DQ47X0KnYgf7X2rpdU=s900-c-k-c0x00ffffff-no-rj" alt="Google" class="h-5 w-5" />
                        Continue with Google
                    </button>
                </div>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-amber-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white/80 text-amber-700">Or continue with</span>
                    </div>
                </div>

                <!-- Email/Password Form -->
                <form class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-amber-900">Email address</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-amber-900">Password</label>
                        <input type="password" id="password" name="password" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me" name="remember-me"
                                   class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-amber-900">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-amber-600 hover:text-amber-500">Forgot your password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-amber-700 to-amber-600 hover:from-amber-600 hover:to-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                            Sign in
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-amber-700">
                    Not registered yet?
                    <a href="create_acont.html" class="font-medium text-amber-600 hover:text-amber-500">Create an account</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
