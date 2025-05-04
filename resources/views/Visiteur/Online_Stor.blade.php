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
                <button class="category-filter px-6 py-2 bg-amber-800 text-amber-100 rounded-full whitespace-nowrap" data-category-id="all">
                    All Products
                </button>
                  @forEach($catigorys as $catigory)
                <button class="category-filter px-6 py-2 bg-amber-100 text-amber-900 rounded-full whitespace-nowrap hover:bg-amber-200" data-category-id="{{ $catigory->id }}">
                    {{ $catigory->name }}
                </button>
                   @endforeach
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
                    {{ $produits->links('pagination::tailwind') }}
                </div>
            </section>


        </div>
    </main>



    <script src="/js/stor.js"></script>


@endsection
</body>
</html>
<script>
   function activateCategoryFilters() {
    document.querySelectorAll('.category-filter').forEach(button => {
        button.addEventListener('click', function () {
            // Set active state for the clicked button
            document.querySelectorAll('.category-filter').forEach(btn => {
                btn.classList.remove('bg-amber-800', 'text-amber-100');
                btn.classList.add('bg-amber-100', 'text-amber-900');
            });
            this.classList.remove('bg-amber-100', 'text-amber-900');
            this.classList.add('bg-amber-800', 'text-amber-100');

            const categoryId = this.dataset.categoryId;

            fetch(`{{ route('store') }}?category=${categoryId}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('product-list').parentElement.innerHTML = html;
                activatePaginationLinks(categoryId);
                // Reinitialize cart functionality for the new products
                updateCart();
            });
        });
    });
}

function activatePaginationLinks(categoryId = null) {
    document.querySelectorAll('#pagination-links a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            const fullUrl = categoryId ? `${url}&category=${categoryId}` : url;

            fetch(fullUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('product-list').parentElement.innerHTML = html;
                activatePaginationLinks(categoryId);
                // Reinitialize cart functionality for the new products
                updateCart();
            });
        });
    });
}

// Make updateCart function available globally
function updateCart() {
    let addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        // Check if product is out of stock
        const productCard = button.closest('.store-card');
        const quantityBadge = productCard.querySelector('.absolute.top-2.right-2');
        const quantity = parseInt(quantityBadge.textContent.trim());

        if (quantity <= 0) {
            button.disabled = true;
            button.classList.remove('bg-amber-800', 'hover:bg-amber-700');
            button.classList.add('bg-gray-400', 'cursor-not-allowed');
            button.textContent = 'Product not available';
        }

        // Remove existing event listeners before adding new ones to prevent duplicates
        button.removeEventListener('click', addToCartHandler);
        button.addEventListener('click', addToCartHandler);
    });
}

// Separate the handler function to be able to remove it later
function addToCartHandler() {
    let productId = this.getAttribute('data-product-id');
    let price = parseFloat(this.getAttribute('data-product-price'));
    let name = this.getAttribute('data-product-name');
    let imgSrc = this.getAttribute('data-product-img');

    fetch('/update-stock', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Get the latest cart data from localStorage
            let cartTotalPrice = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            // Update cart
            cartTotalPrice += price;
            cartItems.push({
                id: productId,
                name: name,
                price: price,
                img: imgSrc,
                quantity: 1
            });

            localStorage.setItem('cartTotalPrice', cartTotalPrice);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            // Update UI
            document.getElementById('cart-total').textContent = cartTotalPrice.toFixed(2);

            const productCard = this.closest('.store-card');
            const quantityBadge = productCard.querySelector('.absolute.top-2.right-2');
            quantityBadge.textContent = data.new_quantity;

            if (data.new_quantity <= 0) {
                this.disabled = true;
                this.classList.remove('bg-amber-800', 'hover:bg-amber-700');
                this.classList.add('bg-gray-400', 'cursor-not-allowed');
                this.textContent = 'Product not available';
            }

            let counter = document.getElementById('cart-counter');
            counter.classList.add('animate-pulse');
            setTimeout(() => {
                counter.classList.remove('animate-pulse');
            }, 500);
        } else {
            console.log('Error updating stock');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        console.log('Error connecting to server.', 'error');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Initialize cart counter
    let cartTotalPrice = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let cartTotalElement = document.getElementById('cart-total');
    cartTotalElement.textContent = cartTotalPrice.toFixed(2);

    document.getElementById('cart-counter').addEventListener('click', function() {
        window.location.href = '/cart';
    });

    // Initialize filters and cart functionality
    activateCategoryFilters();
    activatePaginationLinks();
    updateCart();
});
</script>
