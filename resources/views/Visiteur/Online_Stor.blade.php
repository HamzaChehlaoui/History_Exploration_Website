@extends('Visiteur.master')

@section('content')
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($produits as $produit)
                    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="relative">
                            <img src="https://th.bing.com/th/id/OIP.fthV-jpiDbUMe4G8v77AgwHaE7?w=626&h=417&rs=1&pid=ImgDetMain" alt="Ancient Civilizations Book" class="w-full h-48 object-cover"/>
                            <div class="absolute top-2 right-2 bg-amber-500 text-amber-900 px-2 py-1 rounded-full text-sm font-bold">
                               {{$produit->quantite}}
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">{{$produit->name}}</h3>
                            <p class="text-amber-700 text-sm mb-4">{{$produit->description}}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">{{$produit->prix}} $</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Educational Tools Section -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Featured Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Timeline Maker Kit -->
                    @foreach($produits->take(2) as $produit)
                    <div class="store-card rounded-lg shadow-lg p-6 flex gap-6">
                        <img src="https://th.bing.com/th/id/R.367c3def5e45392799e9185321544613?rik=r%2b4VUxnebwNb9A&pid=ImgRaw&r=0" alt="Timeline Maker Kit" class="w-32 h-32 object-cover rounded-lg"/>
                        <div>
                            <h3 class="text-xl font-semibold text-amber-900 mb-2">{{$produit->name}}</h3>
                            <p class="text-amber-700 mb-4">{{$produit->description}}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">{{$produit->prix}}</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>
        </div>
    </main>

    <!-- Newsletter -->
    <section class="bg-amber-800 text-amber-100 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">Stay Updated</h2>
            <p class="mb-6">Subscribe to receive updates about new historical items and special offers</p>
            <div class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 rounded-lg bg-amber-700 text-amber-100 placeholder-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500"/>
                <button class="bg-amber-100 text-amber-900 px-6 py-2 rounded-lg font-semibold hover:bg-amber-200 transition-colors">
                    Subscribe
                </button>
            </div>
        </div>
    </section>
@endsection
</body>
</html>
