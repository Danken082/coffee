
    document.addEventListener('DOMContentLoaded', function () {
        const cartTable = document.getElementById('cart-table');

        cartTable.addEventListener('change', function (event) {
            if (event.target && event.target.name === 'quantity[]') {
                const orderID = event.target.dataset.orderID;
                const newQuantity = event.target.value;

                // Send AJAX request to update quantity
                fetch('/update-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest' // Add this header to identify AJAX requests
                    },
                    body: JSON.stringify({
                        orderID: orderID,
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Update total price and display on the page if needed
                    console.log(data); // Optional: Log response data
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });