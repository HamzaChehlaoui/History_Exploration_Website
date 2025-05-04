{{-- file : produit_filter --}}
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
                @if($produit->quantite > 0)
                @auth
                    <button class="add-to-cart-btn bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors"
                            data-product-id="{{ $produit->id }}"
                            data-product-price="{{ $produit->prix }}"
                            data-product-name="{{ $produit->name }}"
                            data-product-img="{{ $produit->imagePath }}">
                        Add to Cart
                    </button>
                @else
                    <a href="{{ route('login') }}">
                        <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors w-full">
                            Login to Add to Cart
                        </button>
                    </a>
                @endauth
            @else
                <button class="bg-gray-400 text-amber-100 px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                    Product not available
                </button>
            @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
<div id="pagination-links" class="mt-6">
    {{ $produits->appends(request()->query())->links('pagination::tailwind') }}
</div>



