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
            button.addEventListener('click', function () {
                let productId = this.getAttribute('data-product-id');
                let price = parseFloat(this.getAttribute('data-product-price'));
                let name = this.getAttribute('data-product-name');
                let imgSrc = this.getAttribute('data-product-img');

                // Add to cart total
                cartTotalPrice += price;

                // Add item to cart items array
                let existingItemIndex = cartItems.findIndex(item => item.id === productId);

                if (existingItemIndex !== -1) {

                    cartItems[existingItemIndex].quantity += 1;
                } else {

                    cartItems.push({
                        id: productId,
                        name: name,
                        price: price,
                        img: imgSrc,
                        quantity: 1
                    });
                }


                localStorage.setItem('cartTotalPrice', cartTotalPrice);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));


                cartTotalElement.textContent = cartTotalPrice.toFixed(2);


                let counter = document.getElementById('cart-counter');
                counter.classList.add('animate-pulse');
                setTimeout(() => {
                    counter.classList.remove('animate-pulse');
                }, 500);

                console.log(`Product ${productId} added to cart. Price: $${price}`);
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
