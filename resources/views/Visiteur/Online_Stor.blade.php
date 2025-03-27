@extends('Visiteur.master')

@section('content')
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
test 
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
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Featured Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Product Card 1 -->
                    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="relative">
                            <img src="https://th.bing.com/th?id=OIF.RieF3sGruqGgvY%2faDsi6fQ&rs=1&pid=ImgDetMain" alt="Ancient Civilizations Book" class="w-full h-48 object-cover"/>
                            <div class="absolute top-2 right-2 bg-amber-500 text-amber-900 px-2 py-1 rounded-full text-sm font-bold">
                                Best Seller
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">Ancient Civilizations: A Complete Guide</h3>
                            <p class="text-amber-700 text-sm mb-4">Comprehensive guide to ancient civilizations with detailed illustrations</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$29.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="relative">
                            <img src="https://th.bing.com/th/id/R.ba83ba9b6833663d03c49468699e419d?rik=%2b6I0rXsRT%2bRFtA&pid=ImgRaw&r=0" alt="Vintage World Map" class="w-full h-48 object-cover"/>
                            <div class="absolute top-2 right-2 bg-amber-500 text-amber-900 px-2 py-1 rounded-full text-sm font-bold">
                                New
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">Vintage World Map (1800s)</h3>
                            <p class="text-amber-700 text-sm mb-4">High-quality reproduction of 19th-century world map</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$49.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <img src="https://th.bing.com/th/id/OIP.fthV-jpiDbUMe4G8v77AgwHaE7?w=626&h=417&rs=1&pid=ImgDetMain" alt="Historical Timeline Cards" class="w-full h-48 object-cover"/>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">Historical Timeline Cards</h3>
                            <p class="text-amber-700 text-sm mb-4">Educational cards featuring major historical events</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$19.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="store-card rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                        <img src="https://i.etsystatic.com/12230256/r/il/a4fcec/4933578802/il_1080xN.4933578802_grg8.jpg" alt="Roman Empire Coin Replica" class="w-full h-48 object-cover"/>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">Roman Empire Coin Replica Set</h3>
                            <p class="text-amber-700 text-sm mb-4">Authentic replicas of ancient Roman coins</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$34.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Educational Tools Section -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-amber-900 mb-6">Educational Tools</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Timeline Maker Kit -->
                    <div class="store-card rounded-lg shadow-lg p-6 flex gap-6">
                        <img src="https://th.bing.com/th/id/R.367c3def5e45392799e9185321544613?rik=r%2b4VUxnebwNb9A&pid=ImgRaw&r=0" alt="Timeline Maker Kit" class="w-32 h-32 object-cover rounded-lg"/>
                        <div>
                            <h3 class="text-xl font-semibold text-amber-900 mb-2">Timeline Maker Kit</h3>
                            <p class="text-amber-700 mb-4">Create your own historical timelines with this comprehensive kit</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$39.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Historical Atlas -->
                    <div class="store-card rounded-lg shadow-lg p-6 flex gap-6">
                        <img src="https://th.bing.com/th/id/OIP.6AHOZNBVdKPTGOeGwLAntAAAAA?rs=1&pid=ImgDetMain" alt="Historical Atlas" class="w-32 h-32 object-cover rounded-lg"/>
                        <div>
                            <h3 class="text-xl font-semibold text-amber-900 mb-2">Interactive Historical Atlas</h3>
                            <p class="text-amber-700 mb-4">Digital atlas with interactive maps from different time periods</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-amber-900">$59.99</span>
                                <button class="bg-amber-800 text-amber-100 px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">
                                    Add to Cart
                                </button>

                            </div>
                        </div>
                    </div>
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
