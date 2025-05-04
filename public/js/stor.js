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
