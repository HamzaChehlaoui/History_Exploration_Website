<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - User Management</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .scroll-trigger {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        .scroll-trigger.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-between items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-amber-100">
                            <span class="text-amber-400">⌛</span> TimeTrekker
                        </h1>
                    </div>
                    <div class="hidden sm:flex sm:space-x-8">
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">Dashboard</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">Users</a>
                        <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md transition-all duration-300 hover:bg-amber-800/50">Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-amber-900">User Management</h2>
                <button class="bg-amber-700 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-600 transition-colors">
                    + New User
                </button>
            </div>

            <!-- Search and Filters -->
            <div class="bg-amber-100 p-6 rounded-lg shadow-md mb-8 border border-amber-200">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" placeholder="Search for users..."
                                   class="w-full px-4 py-2 rounded-lg border border-amber-300 focus:ring-2 focus:ring-amber-500 focus:border-transparent"/>
                            <span class="absolute right-3 top-2.5 text-amber-600">
                                🔍
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <select class="px-4 py-2 rounded-lg border border-amber-300 bg-white text-amber-900">
                            <option>All Roles</option>
                            <option>Administrator</option>
                            <option>Moderator</option>
                            <option>User</option>
                        </select>
                        <select class="px-4 py-2 rounded-lg border border-amber-300 bg-white text-amber-900">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Suspended</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-amber-200">
                <table class="min-w-full divide-y divide-amber-200">
                    <thead class="bg-amber-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-100 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-100 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-100 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-100 uppercase tracking-wider">Last Login</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-amber-100 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-amber-200">
                        <tr class="hover:bg-amber-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full" src="https://realmessiah.com/wp-content/uploads/2021/10/DB-Biography-Pic-1.png" alt="" />
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-amber-900">John Smith</div>
                                        <div class="text-sm text-amber-600">john.s@email.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                    User
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-amber-600">
                                2 hours ago
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-amber-700 hover:text-amber-900 mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900">Suspend</button>
                            </td>
                        </tr>
                        <!-- Repeat for other users -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6 bg-amber-100 p-4 rounded-lg border border-amber-200">
                <div class="text-amber-700">
                    Showing 1-10 of 100 users
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-amber-700 text-amber-100 rounded-lg hover:bg-amber-600">Previous</button>
                    <button class="px-4 py-2 bg-amber-700 text-amber-100 rounded-lg hover:bg-amber-600">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-amber-900 text-amber-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-amber-200">© 2024 TimeTrekker. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
