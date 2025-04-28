document.addEventListener('DOMContentLoaded', function () {
    let cartTotalPrice = parseFloat(localStorage.getItem('cartTotalPrice')) || 0;
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let cartTotalElement = document.getElementById('cart-total');
    cartTotalElement.textContent = cartTotalPrice.toFixed(2);

    document.getElementById('cart-counter').addEventListener('click', function() {
        window.location.href = '/cart';
    });

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

            button.addEventListener('click', function () {
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
                        // Success: Update frontend quantities
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
                        cartTotalElement.textContent = cartTotalPrice.toFixed(2);

                        quantityBadge.textContent = data.new_quantity;

                        if (data.new_quantity <= 0) {
                            button.disabled = true;
                            button.classList.remove('bg-amber-800', 'hover:bg-amber-700');
                            button.classList.add('bg-gray-400', 'cursor-not-allowed');
                            button.textContent = 'Product not available';
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
            });

        });
    }

    updateCart();

    document.addEventListener('click', function (e) {
        if (e.target.closest('#pagination-links a')) {
            e.preventDefault();
            const link = e.target.closest('a');
            const url = link.getAttribute('href');
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');
                const newProducts = htmlDoc.querySelector('#product-list').innerHTML;
                const newPagination = htmlDoc.querySelector('#pagination-links').innerHTML;
                document.querySelector('#product-list').innerHTML = newProducts;
                document.querySelector('#pagination-links').innerHTML = newPagination;
                updateCart();
            })
            .catch(error => console.error('Error:', error));
        }
    });
});

