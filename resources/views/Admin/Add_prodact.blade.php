<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Add Product</title>
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
        <div class="max-w-3xl mx-auto">
            <div class="store-card rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Add New Product</h2>

                <form class="space-y-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Basic Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2" for="productName">Product Name</label>
                                <input type="text" id="productName" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>

                            <div>
                                <label class="block text-amber-900 mb-2" for="category">Category</label>
                                <select id="category" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                    <option>Books</option>
                                    <option>Historical Maps</option>
                                    <option>Souvenirs</option>
                                    <option>Educational Tools</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-amber-900 mb-2" for="description">Description</label>
                            <textarea id="description" rows="4" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
                        </div>
                    </div>

                    <!-- Pricing & Inventory -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Pricing & Inventory</h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2" for="price">Price ($)</label>
                                <input type="number" id="price" step="0.01" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>

                            <div>
                                <label class="block text-amber-900 mb-2" for="stock">Stock Quantity</label>
                                <input type="number" id="stock" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>

                            <div>
                                <label class="block text-amber-900 mb-2" for="sku">SKU</label>
                                <input type="text" id="sku" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Product Image</h3>

                        <div class="border-2 border-dashed border-amber-300 rounded-lg p-8 text-center">
                            <div class="space-y-2">
                                <svg class="mx-auto h-12 w-12 text-amber-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="text-sm text-amber-700">
                                    <label for="file-upload" class="relative cursor-pointer bg-amber-800 rounded-md font-medium text-amber-100 hover:text-amber-200 px-4 py-2">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="mt-2">or drag and drop</p>
                                </div>
                                <p class="text-xs text-amber-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product Status -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Product Status</h3>

                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="active" class="form-radio text-amber-800">
                                <span class="ml-2 text-amber-900">Active</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="draft" class="form-radio text-amber-800">
                                <span class="ml-2 text-amber-900">Draft</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <button type="button" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors">
                            Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
