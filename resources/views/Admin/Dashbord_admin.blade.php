<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Admin Dashboard</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .data-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table th {
            background-color: rgba(146, 64, 14, 0.1);
        }

        .data-table th:first-child {
            border-top-left-radius: 0.5rem;
        }

        .data-table th:last-child {
            border-top-right-radius: 0.5rem;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-amber-100 font-serif">
                        <span class="text-amber-400">⌛</span> TimeTrekker Admin
                    </h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-amber-100">Admin: hamza chehlaoui</span>
                    <div class="relative">
                        <img src="https://media.licdn.com/dms/image/v2/D4E03AQFWCBmuwtAlgg/profile-displayphoto-shrink_400_400/B4EZSXbCmpGwAg-/0/1737707237271?e=1743638400&v=beta&t=x9JJjjcO7Ce3Sy1Ek5m4blpq7ZsLZ9dmdia-rPOWrps" alt="Admin Profile" class="h-8 w-8 rounded-full border-2 border-amber-400 cursor-pointer"/>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="profileDropdown">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-amber-900 hover:bg-amber-100">My Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-amber-900 hover:bg-amber-100">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-amber-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Layout -->
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar -->
        <div class="w-64 bg-amber-900/95 text-amber-100 p-4 space-y-4">
            <div class="space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg bg-amber-800/50 hover:bg-amber-800 transition-colors nav-link" data-target="dashboard">
                    Dashboard Overview
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="users">
                    User Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="content">
                    Content Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="reports">
                    Product Management
                </a>

            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Dashboard Overview Tab -->
            <div id="dashboard" class="tab-content active">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">Dashboard Overview</h2>

                <!-- Statistics Overview -->
                <div class="stats-grid mb-8">
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-lg font-semibold text-amber-900 mb-2">Total Users</h3>
                        <p class="text-3xl font-bold text-amber-700">15,847</p>
                        <p class="text-sm text-amber-600">+124 this week</p>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-lg font-semibold text-amber-900 mb-2">Active Articles</h3>
                        <p class="text-3xl font-bold text-amber-700">2,453</p>
                        <p class="text-sm text-amber-600">+38 this week</p>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-lg font-semibold text-amber-900 mb-2">Pending Reviews</h3>
                        <p class="text-3xl font-bold text-amber-700">47</p>
                        <p class="text-sm text-amber-600">12 high priority</p>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                        <h3 class="text-lg font-semibold text-amber-900 mb-2">User Reports</h3>
                        <p class="text-3xl font-bold text-amber-700">18</p>
                        <p class="text-sm text-amber-600">5 requiring attention</p>
                    </div>
                </div>

                <!-- Activity Graph -->
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Activity Overview</h3>
                        <select class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 3 Months</option>
                        </select>
                    </div>
                    <canvas id="activityChart" height="100"></canvas>
                </div>
            </div>

            <!-- User Management Tab -->
            <div id="users" class="tab-content">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">User Management</h2>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Users</h3>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Search users..." class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                            <select class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                                <option>All Users</option>
                                <option>Active</option>
                                <option>Suspended</option>
                                <option>Pending</option>
                            </select>
                            <button class="bg-amber-700 text-white py-1 px-4 rounded-lg hover:bg-amber-800 transition-colors">
                                Add User
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">User</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Role</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Articles</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Last Login</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY48mP_RrEOMRCUTUws1Ltv2oNf7OiwnFh4w&s" alt="User" class="h-8 w-8 rounded-full mr-2"/>
                                            <div>
                                                <div class="text-amber-900">Michael Brown</div>
                                                <div class="text-sm text-amber-600">michael@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">Contributor</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">15</td>
                                    <td class="px-4 py-3 text-amber-700">2025-04-25</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-red-600 hover:text-red-500">Suspend</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlVparuZ4feRMJDAKgjimGIgPRBCI5jgvPrQ&s" alt="User" class="h-8 w-8 rounded-full mr-2"/>
                                            <div>
                                                <div class="text-amber-900">Sarah Johnson</div>
                                                <div class="text-sm text-amber-600">sarah@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">Editor</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-sm">Suspended</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">8</td>
                                    <td class="px-4 py-3 text-amber-700">2025-04-20</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-green-600 hover:text-green-500">Activate</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu1SGBWRJOmgeY77YCOJ25cnsvwK6UlBzm-g&s" alt="User" class="h-8 w-8 rounded-full mr-2"/>
                                            <div>
                                                <div class="text-amber-900">James Wilson</div>
                                                <div class="text-sm text-amber-600">james@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">Moderator</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">23</td>
                                    <td class="px-4 py-3 text-amber-700">2025-04-24</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-red-600 hover:text-red-500">Suspend</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVUK0rL-1gBSRiGWQ9IfP2HLh5DAuEV_iMhg&s" alt="User" class="h-8 w-8 rounded-full mr-2"/>
                                            <div>
                                                <div class="text-amber-900">Lisa Chen</div>
                                                <div class="text-sm text-amber-600">lisa@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">Contributor</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">0</td>
                                    <td class="px-4 py-3 text-amber-700">-</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-green-600 hover:text-green-500">Approve</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-amber-700">Showing 1-4 of 15,847 users</div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">&lt;</button>
                            <button class="px-3 py-1 bg-amber-700 text-white rounded-md">1</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">2</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">3</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">&gt;</button>
                        </div>
                    </div>
                </div>

                <!-- User Details Modal (Hidden by default) -->
                <div id="userModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-amber-900">Edit User</h3>
                            <button class="text-amber-900 hover:text-amber-700" id="closeUserModal">✕</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-amber-700 mb-1">First Name</label>
                                <input type="text" value="Michael" class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Last Name</label>
                                <input type="text" value="Brown" class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Email</label>
                                <input type="email" value="michael@example.com" class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Role</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>Contributor</option>
                                    <option>Editor</option>
                                    <option>Moderator</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Status</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>Active</option>
                                    <option>Suspended</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Date Joined</label>
                                <input type="date" value="2024-10-15" class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-amber-700 mb-1">Biography</label>
                            <textarea class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200 h-24">Michael is a history enthusiast with expertise in ancient civilizations and early mathematics.</textarea>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 transition-colors">Cancel</button>
                            <button class="bg-amber-700 text-white py-2 px-4 rounded-lg hover:bg-amber-800 transition-colors">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Management Tab -->
            <div id="content" class="tab-content">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">Content Management</h2>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Articles</h3>
                        <div class="flex space-x-2">
                            <input type="text" placeholder="Search articles..." class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                            <select class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Rejected</option>
                                <option>Featured</option>
                            </select>
                            <button class="bg-amber-700 text-white py-1 px-4 rounded-lg hover:bg-amber-800 transition-colors">
                                Add Article
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">Title</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Author</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Category</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Published</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">Ancient Egyptian Mathematics</td>
                                    <td class="px-4 py-3 text-amber-700">John Smith</td>
                                    <td class="px-4 py-3 text-amber-700">Mathematics</td>
                                    <td class="px-4 py-3 text-amber-700">-</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Review</button>
                                            <button class="text-green-600 hover:text-green-500">Approve</button>
                                            <button class="text-red-600 hover:text-red-500">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">The Renaissance Period</td>
                                    <td class="px-4 py-3 text-amber-700">Emma Wilson</td>
                                    <td class="px-4 py-3 text-amber-700">Art History</td>
                                    <td class="px-4 py-3 text-amber-700">2025-04-15</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Approved</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-purple-600 hover:text-purple-500">Feature</button>
                                            <button class="text-red-600 hover:text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">Roman Engineering Marvels</td>
                                    <td class="px-4 py-3 text-amber-700">James Wilson</td>
                                    <td class="px-4 py-3 text-amber-700">Engineering</td>
                                    <td class="px-4 py-3 text-amber-700">2025-04-22</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">Featured</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-amber-600 hover:text-amber-500">Unfeature</button>
                                            <button class="text-red-600 hover:text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">Medieval Medicine Practices</td>
                                    <td class="px-4 py-3 text-amber-700">Sarah Johnson</td>
                                    <td class="px-4 py-3 text-amber-700">Medicine</td>
                                    <td class="px-4 py-3 text-amber-700">-</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-sm">Rejected</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Review</button>
                                            <button class="text-green-600 hover:text-green-500">Reconsider</button>
                                            <button class="text-red-600 hover:text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="text-amber-700">Showing 1-4 of 2,453 articles</div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">&lt;</button>
                            <button class="px-3 py-1 bg-amber-700 text-white rounded-md">1</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">2</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">3</button>
                            <button class="px-3 py-1 bg-amber-100 text-amber-900 rounded-md">&gt;</button>
                        </div>
                    </div>
                </div>

                <!-- Article Details Modal (Hidden by default) -->
                <div id="articleModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
<div class="bg-white rounded-lg p-6 w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-amber-900">Edit Article</h3>
                            <button class="text-amber-900 hover:text-amber-700" id="closeArticleModal">✕</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="md:col-span-2">
                                <label class="block text-amber-700 mb-1">Title</label>
                                <input type="text" value="Ancient Egyptian Mathematics" class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Author</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>John Smith</option>
                                    <option>Emma Wilson</option>
                                    <option>James Wilson</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Category</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>Mathematics</option>
                                    <option>Art History</option>
                                    <option>Engineering</option>
                                    <option>Medicine</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Status</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                    <option>Featured</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-amber-700 mb-1">Time Period</label>
                                <select class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200">
                                    <option>Ancient (Before 500 CE)</option>
                                    <option>Medieval (500-1500 CE)</option>
                                    <option>Renaissance (1400-1700 CE)</option>
                                    <option>Modern (1700-1900 CE)</option>
                                    <option>Contemporary (1900-Present)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-amber-700 mb-1">Article Content</label>
                            <textarea class="w-full rounded-lg bg-amber-50 text-amber-900 py-2 px-3 border border-amber-200 h-64">Ancient Egyptian mathematics was a crucial part of their civilization, developing alongside their architectural and engineering achievements. The Egyptians used a decimal system and had symbols for numbers 1-9, 10, 100, 1000, etc. They employed these mathematical concepts for practical purposes like land measurement, pyramid construction, and timekeeping.

The Rhind Mathematical Papyrus, dated around 1650 BCE, demonstrates their advanced understanding of fractions, algebra, and geometry. Egyptians had sophisticated methods for computing the areas of shapes and volumes of solids, essential for their monumental building projects.

Their mathematical notation system, while different from ours today, shows remarkable ingenuity and practical applications. Egyptian mathematicians could solve linear equations and had methods for calculating proportions that were crucial for their architectural achievements.

The influence of Egyptian mathematics extended to later Greek mathematics and thereby into our modern mathematical understanding.</textarea>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 transition-colors">Cancel</button>
                            <button class="bg-amber-700 text-white py-2 px-4 rounded-lg hover:bg-amber-800 transition-colors">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Management -->
            <div id="reports" class="tab-content">


               <!-- Main Content -->
    <main class="pt-24 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header with Search and Add Button -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <h2 class="text-3xl font-bold text-amber-900">Product Management</h2>
                <div class="flex gap-4 w-full sm:w-auto">
                    <div class="relative flex-1 sm:flex-initial">
                        <input type="search" placeholder="Search products..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <a href="/Add_prodact">
                    <button class="px-4 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Product
                    </button>
                </a>
                </div>
            </div>

            <!-- Product List -->
            <div class="store-card rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-amber-800 text-amber-100">
                            <tr>
                                <th class="px-6 py-3 text-left">Product</th>
                                <th class="px-6 py-3 text-left">Category</th>
                                <th class="px-6 py-3 text-left">Price</th>
                                <th class="px-6 py-3 text-left">Stock</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-amber-200">
                            <!-- Product Row 1 -->
                            <tr class="hover:bg-amber-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://th.bing.com/th/id/OIP.x2ECQILsY0coJ2IjDmllJwHaJu?rs=1&pid=ImgDetMain" alt="Ancient Civilizations Book" class="w-12 h-12 object-cover rounded"/>
                                        <div>
                                            <div class="font-semibold text-amber-900">Ancient Civilizations: A Complete Guide</div>
                                            <div class="text-sm text-amber-700">SKU: ACB001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-amber-700">Books</td>
                                <td class="px-6 py-4 text-amber-700">$29.99</td>
                                <td class="px-6 py-4 text-amber-700">45</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <button class="text-amber-600 hover:text-amber-900" onclick="showEditModal()">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" onclick="showDeleteModal()">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product Row 2 -->
                            <tr class="hover:bg-amber-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://th.bing.com/th/id/R.980228e453700a479d1e30b4cc51fc2b?rik=9O6%2bhWTbwQE4lA&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2ff%2fd%2fd%2f327266.jpg&ehk=Wqx0bJSWeQrEHBfr75MYvRoZAaX2zJ06wVngblP%2bF0c%3d&risl=&pid=ImgRaw&r=0" alt="Vintage World Map" class="w-12 h-12 object-cover rounded"/>
                                        <div>
                                            <div class="font-semibold text-amber-900">Vintage World Map (1800s)</div>
                                            <div class="text-sm text-amber-700">SKU: VWM002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-amber-700">Historical Maps</td>
                                <td class="px-6 py-4 text-amber-700">$49.99</td>
                                <td class="px-6 py-4 text-amber-700">23</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Draft</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <button class="text-amber-600 hover:text-amber-900" onclick="showEditModal()">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" onclick="showDeleteModal()">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
            </div>


        </div>
    </div>

    <script>
        // Tab navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');

                // Update active tab
                document.querySelectorAll('.nav-link').forEach(el => {
                    el.classList.remove('bg-amber-800/50');
                    el.classList.add('hover:bg-amber-800/50');
                });
                this.classList.add('bg-amber-800/50');
                this.classList.remove('hover:bg-amber-800/50');

                // Show target content
                document.querySelectorAll('.tab-content').forEach(el => {
                    el.classList.remove('active');
                });
                document.getElementById(target).classList.add('active');
            });
        });

        // User Modal
        document.querySelectorAll('button:contains("Edit")').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('userModal').classList.remove('hidden');
            });
        });

        document.getElementById('closeUserModal').addEventListener('click', function() {
            document.getElementById('userModal').classList.add('hidden');
        });

        // Article Modal
        document.querySelectorAll('button:contains("Review")').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('articleModal').classList.remove('hidden');
            });
        });

        document.getElementById('closeArticleModal').addEventListener('click', function() {
            document.getElementById('articleModal').classList.add('hidden');
        });

        // Profile dropdown
        const profileImg = document.querySelector('img[alt="Admin Profile"]');
        const profileDropdown = document.getElementById('profileDropdown');

        profileImg.addEventListener('click', function() {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking elsewhere
        document.addEventListener('click', function(e) {
            if (!profileImg.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Sample data for the activity chart
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'New Users',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: '#92400e',
                    tension: 0.4
                }, {
                    label: 'New Articles',
                    data: [28, 48, 40, 19, 86, 27, 90],
                    borderColor: '#b45309',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'User Growth',
                    data: [12500, 13200, 14100, 14800, 15300, 15847],
                    borderColor: '#92400e',
                    backgroundColor: 'rgba(146, 64, 14, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        // Content Distribution Chart
        const contentDistributionCtx = document.getElementById('contentDistributionChart').getContext('2d');
        new Chart(contentDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Ancient', 'Medieval', 'Renaissance', 'Modern', 'Contemporary'],
                datasets: [{
                    data: [583, 721, 492, 357, 300],
                    backgroundColor: [
                        '#92400e',
                        '#b45309',
                        '#d97706',
                        '#f59e0b',
                        '#fbbf24'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });

        // Fix for the button selector (since the :contains selector isn't standard)
        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent.includes('Edit')) {
                btn.addEventListener('click', function() {
                    document.getElementById('userModal').classList.remove('hidden');
                });
            }
            if (btn.textContent.includes('Review')) {
                btn.addEventListener('click', function() {
                    document.getElementById('articleModal').classList.remove('hidden');
                });
            }
        });
    </script>
</body>
</html>
