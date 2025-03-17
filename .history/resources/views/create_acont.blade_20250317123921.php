<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Create Account</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* @keyframes floatingEffect {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        } */

        .floating {
            animation: floatingEffect 3s ease-in-out infinite;
        }

        .time-portal {
            background: conic-gradient(from 0deg, #4a2208, #854d0e, #713f12, #4a2208);
            /* animation: spin 20s linear infinite; */
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .form-field:focus-within label {
            color: #92400e;
            font-weight: 600;
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    @include('navbare_visitoure.nav')


    <!-- Registration Section -->
    <div class="min-h-screen pt-16 pb-12 flex flex-col justify-center">
        <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <div class="absolute inset-0 time-portal opacity-5"></div>
            </div>

            <!-- Registration Form -->
            <div class="relative bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-8 border border-amber-200 mt-[2rem]">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-amber-900 mb-2">Begin Your Time-Traveling Journey</h2>
                    <p class="text-amber-700">Create your account to explore history's greatest moments</p>
                </div>

                <!-- Social Registration Buttons -->
                <div class="space-y-4 mb-6">
                    <button class="w-full flex items-center justify-center gap-3 bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                        Sign up with Facebook
                    </button>
                    <button class="w-full flex items-center justify-center gap-3 bg-white text-gray-700 py-3 px-4 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <img src="https://yt3.googleusercontent.com/FJI5Lzbf2dMd32xOqhoKpJArJooZhoX6v2qOcFO-wjSZUvs3H9xqq2gK4DQ47X0KnYgf7X2rpdU=s900-c-k-c0x00ffffff-no-rj" alt="Google" class="h-5 w-5" />
                        Sign up with Google
                    </button>
                </div>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-amber-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white/80 text-amber-700">Or register with email</span>
                    </div>
                </div>

                <!-- Registration Form -->
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-field">
                            <label for="first-name" class="block text-sm font-medium text-amber-900">First name</label>
                            <input type="text" id="first-name" name="first-name" required
                                   class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                        </div>

                        <div class="form-field">
                            <label for="last-name" class="block text-sm font-medium text-amber-900">Last name</label>
                            <input type="text" id="last-name" name="last-name" required
                                   class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="email" class="block text-sm font-medium text-amber-900">Email address</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <div class="form-field">
                        <label for="password" class="block text-sm font-medium text-amber-900">Create password</label>
                        <input type="password" id="password" name="password" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                        <p class="mt-1 text-sm text-amber-600">Must be at least 8 characters with 1 number and 1 special character</p>
                    </div>

                    <div class="form-field">
                        <label for="confirm-password" class="block text-sm font-medium text-amber-900">Confirm password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required
                               class="mt-1 block w-full px-3 py-2 bg-white border border-amber-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" id="terms" name="terms" required
                                   class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-amber-900">
                                I agree to the
                                <a href="#" class="text-amber-600 hover:text-amber-500">Terms of Service</a>
                                and
                                <a href="#" class="text-amber-600 hover:text-amber-500">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-amber-700 to-amber-600 hover:from-amber-600 hover:to-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300">
                            Create Account
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-amber-700">
                    Already have an account?
                    <a href="login.html" class="font-medium text-amber-600 hover:text-amber-500">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
