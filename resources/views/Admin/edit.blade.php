<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TimeTrekker - Edit Produc</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-2xl font-bold text-center text-amber-700 mb-6">Edit Product</h1>

        <form action="{{ route('produits.update', $produit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-amber-700 font-semibold mb-2">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $produit->name) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-amber-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">{{ old('description', $produit->description) }}</textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="prix" class="block text-amber-700 font-semibold mb-2">Price ($)</label>
                <input type="number" name="prix" id="prix" step="0.01" value="{{ old('prix', $produit->prix) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <label for="quantite" class="block text-amber-700 font-semibold mb-2">Quantity</label>
                <input type="number" name="quantite" id="quantite" value="{{ old('quantite', $produit->quantite) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required>
            </div>

            <!-- Image URL -->
            <div class="mb-4">
                <label for="image_url" class="block text-amber-700 font-semibold mb-2">Image URL</label>
                <input type="text" name="image_url" id="image_url" value="{{ old('image_url') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">
                <small class="text-gray-500">Optional: Provide a new image URL</small>
            </div>

            <!-- Preview Image -->
            <div id="imagePreview" class="mb-6 hidden">
                <img src="" alt="Image Preview" class="w-32 h-32 object-cover rounded mx-auto">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    Update Product
                </button>
            </div>

        </form>
    </div>

    {{-- JavaScript for Image Preview --}}
    <script>
        const imageUrlInput = document.getElementById('image_url');
        const imagePreviewDiv = document.getElementById('imagePreview');
        const imgElement = imagePreviewDiv.querySelector('img');

        imageUrlInput.addEventListener('input', () => {
            const url = imageUrlInput.value;
            if (url) {
                imgElement.src = url;
                imagePreviewDiv.classList.remove('hidden');
            } else {
                imagePreviewDiv.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
