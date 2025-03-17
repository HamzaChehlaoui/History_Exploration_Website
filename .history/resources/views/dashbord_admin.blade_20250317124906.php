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
                    <img src="https://media.licdn.com/dms/image/v2/D4E03AQFWCBmuwtAlgg/profile-displayphoto-shrink_400_400/B4EZSXbCmpGwAg-/0/1737707237271?e=1743638400&v=beta&t=x9JJjjcO7Ce3Sy1Ek5m4blpq7ZsLZ9dmdia-rPOWrps" alt="Admin Profile" class="h-8 w-8 rounded-full border-2 border-amber-400"/>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Layout -->
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar -->
        <div class="w-64 bg-amber-900/95 text-amber-100 p-4 space-y-4">
            <div class="space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg bg-amber-800/50 hover:bg-amber-800 transition-colors">
                    Dashboard Overview
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors">
                    User Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors">
                    Content Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors">
                    Reports & Analytics
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors">
                    Settings
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
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

            <!-- Content Management -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
                <!-- Recent Content -->
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Recent Content</h3>
                        <div class="flex space-x-2">
                            <select class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">Title</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Author</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">Ancient Egyptian Mathematics</td>
                                    <td class="px-4 py-3 text-amber-700">John Smith</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Review</button>
                                            <button class="text-red-600 hover:text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">The Renaissance Period</td>
                                    <td class="px-4 py-3 text-amber-700">Emma Wilson</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Approved</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-red-600 hover:text-red-500">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- User Management
                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">User Management</h3>
                        <select class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200">
                            <option>All Users</option>
                            <option>Active</option>
                            <option>Suspended</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">User</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Articles</th>
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
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">15</td>
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
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-sm">Suspended</span>
                                    </td>
                                    <td class="px-4 py-3 text-amber-700">8</td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <button class="text-amber-600 hover:text-amber-500">Edit</button>
                                            <button class="text-green-600 hover:text-green-500">Activate</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
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
    </div>

    <script>
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
    </script>
</body>
</html>
