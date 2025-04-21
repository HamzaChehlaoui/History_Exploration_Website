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
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Ajouter Nouveau Produit</h2>

                <form class="space-y-6" method="POST" action="{{ route('produits.store') }}">
                    @csrf

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Informations de Base -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Informations de Base</h3>

                        <div>
                            <label class="block text-amber-900 mb-2" for="name">Nom du Produit</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-amber-900 mb-2" for="description">Description</label>
                            <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
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

                    <!-- Images du Produit (URLs uniquement) -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-amber-900">Images du Produit</h3>

                        <div>
                            <label class="block text-amber-900 mb-2">URLs d'images</label>
                            <div class="space-y-3" id="image-urls-container">
                                <div class="flex items-center gap-2">
                                    <input type="url" name="image_urls[]" placeholder="https://exemple.com/image.jpg" class="flex-1 px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                    <button type="button" class="add-url-btn px-3 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                                        <span class="sr-only">Ajouter</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            @error('image_urls.*')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-amber-600 mt-2">Entrez les URLs complètes des images (format: https://exemple.com/image.jpg)</p>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gérer l'ajout dynamique de champs d'URL d'image
        let container = document.getElementById('image-urls-container');

        document.addEventListener('click', function(e) {
            if (e.target.closest('.add-url-btn')) {
                let newRow = document.createElement('div');
                newRow.className = 'flex items-center gap-2';
                newRow.innerHTML = `
                    <input type="url" name="image_urls[]" placeholder="https://exemple.com/image.jpg" class="flex-1 px-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <button type="button" class="remove-url-btn px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        <span class="sr-only">Supprimer</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;
                container.appendChild(newRow);
            }

            if (e.target.closest('.remove-url-btn')) {
                e.target.closest('.flex').remove();
            }
        });
    });
    </script>

</html>
