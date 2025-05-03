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
                    <a href="/Dashbord_admin">
                    <div class="flex items-center space-x-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Logo" class="h-8 w-8 md:h-10 md:w-10">
                        <span class="text-xl md:text-2xl font-bold text-amber-100">TimeTrekker</span>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-12 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="store-card rounded-lg shadow-lg p-8">
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Ajouter Nouveau Produit</h2>

                <form class="space-y-6" method="POST" action="{{ route('produits.store') }}">
                    @csrf

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Nom du Produit -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Nom du Produit</h3>
                        <div>
                            <label class="block text-amber-900 mb-2" for="name">Nom du Produit</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description du Produit -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Description du Produit</h3>
                        <div>
                            <label class="block text-amber-900 mb-2" for="description">Description</label>
                            <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Catégorie du Produit -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Catégorie du Produit</h3>
                        <div>
                            <label class="block text-amber-900 mb-2" for="category_id">Choisir une catégorie</label>
                            <select id="category_id" name="category_id" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                <option value="">-- Sélectionner --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Image du Produit -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Image du Produit</h3>
                        <div>
                            <label class="block text-amber-900 mb-2" for="imagePath">URL de l'image</label>
                            <input type="url" id="imagePath" name="imagePath" placeholder="https://exemple.com/image.jpg" value="{{ old('imagePath') }}"
                                class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            @error('imagePath')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-amber-600 mt-2">Entrez l'URL complète de l'image du produit</p>
                        </div>
                    </div>

                    <!-- Prix & Inventaire -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Prix & Inventaire</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-amber-900 mb-2" for="prix">Prix (€)</label>
                                <input type="number" id="prix" name="prix" step="0.01" value="{{ old('prix') }}" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                @error('prix')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-amber-900 mb-2" for="quantite">Quantité en Stock</label>
                                <input type="number" id="quantite" name="quantite" value="{{ old('quantite') }}" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                @error('quantite')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <button type="button" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition-colors">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors">
                            Ajouter Produit
                        </button>
                    </div>
                </form>






            </div>
        </div>
    </main>
</body>


</html>
