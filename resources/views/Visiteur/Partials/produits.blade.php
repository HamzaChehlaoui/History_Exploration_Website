<div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($produits as $produit)
    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
        <div class="relative">
            <img src="{{$produit->imagePath}}" alt="Ancient Civilizations Book" class="w-full h-48 object-cover"/>
            <div class="absolute top-2 right-2 bg-amber-500 text-amber-900 px-2 py-1 rounded-full text-sm font-bold">
                {{$produit->quantite}}
            </div>
        </div>
        <div class="p-4">
            <h3 class="text-lg font-semibold text-amber-900 mb-2">{{$produit->name}}</h3>
            <p class="text-amber-700 text-sm mb-4">{{$produit->description}}</p>
            <div class="flex justify-between items-center">
                <span class="text-xl font-bold text-amber-900 product-price" data-price="{{$produit->prix}}">{{$produit->prix}} $</span>
                <button class="add-to-cart-btn bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors"
                        data-product-id="{{$produit->id}}"
                        data-product-price="{{$produit->prix}}">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6" id="pagination-links">
    {{ $produits->links('pagination::tailwind') }}
</div>
