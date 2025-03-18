<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Product Management</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .store-card {
            background: linear-gradient(to bottom right, rgba(251, 243, 219, 0.9), rgba(251, 243, 219, 0.7));
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-1 flex justify-center sm:justify-between items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-amber-100">
                            <span class="text-amber-400">⌛</span> TimeTrekker Store
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>

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
                    <button class="px-4 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Product
                    </button>
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

    <!-- Edit Product Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="store-card rounded-lg shadow-lg p-6 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-amber-900">Edit Product</h3>
                <button onclick="hideEditModal()" class="text-amber-700 hover:text-amber-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-amber-900 mb-2">Product Name</label>
                        <input type="text" value="Ancient Civilizations: A Complete Guide" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-amber-900 mb-2">Category</label>
                        <select class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option>Books</option>
                            <option>Historical Maps</option>
                            <option>Souvenirs</option>
                            <option>Educational Tools</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-amber-900 mb-2">Description</label>
                    <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">Comprehensive guide to ancient civilizations with detailed illustrations</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-amber-900 mb-2">Price ($)</label>
                        <input type="number" value="29.99" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-amber-900 mb-2">Stock</label>
                        <input type="number" value="45" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-amber-900 mb-2">Status</label>
                        <select class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option>Active</option>
                            <option>Draft</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="hideEditModal()" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="store-card rounded-lg shadow-lg p-6 max-w-md w-full mx-4">
            <div class="text-center">
                <svg class="w-12 h-12 text-red-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                </svg>
                <h3 class="text-2xl font-semibold text-amber-900 mb-4">Are you sure you want to delete this product?</h3>
                <p class="text-sm text-amber-700 mb-6">This action cannot be undone.</p>
                <div class="flex justify-center gap-4">
                    <button type="button" onclick="hideDeleteModal()" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                        Cancel
                    </button>
                    <button type="button" onclick="deleteProduct()" class="px-6 py-2 bg-red-600 text-amber-100 rounded-lg hover:bg-red-700 transition-colors">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle modal visibility -->
    <script>
        function showEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
        }

        function hideEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function deleteProduct() {
            // Handle the product deletion logic here
            alert('Product deleted!');
            hideDeleteModal(); // Close the modal after deletion
        }
    </script>
</body>
</html>
