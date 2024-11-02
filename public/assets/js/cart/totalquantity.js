document.addEventListener('DOMContentLoaded', () => {
    // Function to calculate subtotal and total
    function calculateTotals() {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        let subtotal = 0;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                const itemId = checkbox.value;
                const totalCell = document.getElementById(`total-price-${itemId}`);
                subtotal += parseFloat(totalCell.innerText.replace('₱ ', ''));
            }
        });

        document.getElementById('cart-total').innerText = '₱ ' + subtotal.toFixed(2);

        const deliveryCost = 50; // Fixed delivery cost
        const total = subtotal + deliveryCost;
        document.getElementById('grand-total').innerText = '₱ ' + total.toFixed(2);
        document.getElementById('total-amount').value = total.toFixed(2);
    }

    // Function to update item total price
    function updateItemTotalPrice(itemId) {
        const quantityInput = document.getElementById(`quantity-${itemId}`);
        const pricePerItem = parseFloat(document.getElementById(`price-${itemId}`).innerText.replace('₱ ', ''));
        const totalCell = document.getElementById(`total-price-${itemId}`);
        const totalPrice = quantityInput.value * pricePerItem;
        totalCell.innerText = totalPrice.toFixed(2);

        // Update hidden total input
        document.getElementById(`hidden-total-price-${itemId}`).value = totalPrice.toFixed(2);

        // Recalculate totals
        calculateTotals();
    }

    // Event listeners for checkboxes
    document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', calculateTotals);
    });

    // Event listeners for increment and decrement buttons
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.getAttribute('data-index');
            const quantityInput = document.getElementById(`quantity-${itemId}`);
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateItemTotalPrice(itemId);
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.getAttribute('data-index');
            const quantityInput = document.getElementById(`quantity-${itemId}`);
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateItemTotalPrice(itemId);
            }
        });
    });

    // Event listener for size changes (if applicable)
    document.querySelectorAll('.size-selector').forEach(select => {
        select.addEventListener('change', function() {
            const itemId = select.getAttribute('data-index');
            const selectedSize = select.value;
            const priceElement = document.getElementById(`price-${itemId}`);

            let newPrice = 0;
            if (selectedSize === 'Medium') {
                newPrice = parseFloat(select.getAttribute('data-medium-price'));
            } else if (selectedSize === 'Large') {
                newPrice = parseFloat(select.getAttribute('data-large-price'));
            }

            priceElement.innerText = `₱ ${newPrice.toFixed(2)}`;
            updateItemTotalPrice(itemId); // Recalculate item price based on size
        });
    });

    // Initial calculation when the page loads
    calculateTotals();
});
