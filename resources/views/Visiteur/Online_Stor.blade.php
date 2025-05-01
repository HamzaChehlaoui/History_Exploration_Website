@extends('Visiteur.master')

@section('content')
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Cart Total Price Counter -->
    <div id="cart-counter" class="fixed top-4 right-4 bg-amber-800 text-amber-100 px-4 py-2 rounded-full shadow-lg z-50 flex items-center gap-2 cursor-pointer hover:bg-amber-700 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span>Total: $<span id="cart-total">0.00</span></span>
    </div>

    <!-- Main Content -->
    <main class="pt-24 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Categories -->
            <div class="mb-8 flex overflow-x-auto pb-4 space-x-4">
                <button class="px-6 py-2 bg-amber-800 text-amber-100 rounded-full whitespace-nowrap">All Products</button>
                <button class="px-6 py-2 bg-amber-100 text-amber-900 rounded-full whitespace-nowrap hover:bg-amber-200">Books</button>
                <button class="px-6 py-2 bg-amber-100 text-amber-900 rounded-full whitespace-nowrap hover:bg-amber-200">Historical Maps</button>
                <button class="px-6 py-2 bg-amber-100 text-amber-900 rounded-full whitespace-nowrap hover:bg-amber-200">Souvenirs</button>
                <button class="px-6 py-2 bg-amber-100 text-amber-900 rounded-full whitespace-nowrap hover:bg-amber-200">Educational Tools</button>
            </div>

            <!-- Featured Products -->
            <section class="mb-12">
            <h2 class="text-3xl font-bold text-amber-900 mb-6">Products</h2>
                    <!-- Replace this in your Blade template -->
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
                <button class="add-to-cart-btn bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors"
                        data-product-id="{{$produit->id}}"
                        data-product-price="{{$produit->prix}}"
                        data-product-name="{{$produit->name}}"
                        data-product-img="{{$produit->imagePath}}">
                    Add to Cart
                </button>
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
                    {{ $produits->links('pagination::tailwind') }}
                </div>
            </section>


        </div>
    </main>



    <script src="/js/stor.js"></script>


@endsection
</body>
</html>
