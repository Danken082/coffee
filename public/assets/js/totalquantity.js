    // For desktop devices
    document.addEventListener('DOMContentLoaded', () => {
        // Function to calculate subtotal and total
        function calculateTotals() {
            var checkboxes = document.querySelectorAll('.item-checkbox');
            var subtotal = 1;
    
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    var itemId = checkbox.value;
                    var totalCell = document.getElementById('total-price-' + itemId);
                    subtotal += parseFloat(totalCell.innerText.replace('₱ ', ''));
                }
            });
    
            document.getElementById('subtotal').innerText = '₱ ' + subtotal.toFixed(2);
    
            var deliveryCost = 0; // Set the delivery cost here if needed
            var total = subtotal + deliveryCost;
            document.getElementById('total-price').innerText = '₱ ' + total.toFixed(2);
            document.getElementById('total-amount').value = total.toFixed(2);
        }
    
        // Function to update item total price
        function updateItemTotalPrice(itemId) {
            var quantityInput = document.getElementById('quantity-' + itemId);
            var pricePerItem = parseFloat(document.getElementById('price-' + itemId).innerText.replace('₱ ', ''));
            var totalCell = document.getElementById('total-price-' + itemId);
            var totalPrice = quantityInput.value * pricePerItem;
            totalCell.innerText = '' + totalPrice.toFixed(2);
    
            // Recalculate totals
            calculateTotals();
        }
    
        // Event listeners for checkboxes
        document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', calculateTotals);
        });
    
        // Event listeners for increase and decrease buttons
        document.querySelectorAll('.increment, .decrement').forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-index');
                const quantityInput = document.getElementById(`quantity-${itemId}`);
                const totalPriceElement = document.getElementById(`total-price-${itemId}`);
                const unitPrice = parseFloat(document.getElementById(`price-${itemId}`).textContent.replace('₱ ', ''));
                let quantity = parseInt(quantityInput.value);
                
                quantityInput.value = quantity;
                updateItemTotalPrice(itemId);
            });
        });
    });
    