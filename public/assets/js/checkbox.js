// Function to calculate subtotal and total
function calculateTotals() {
    var checkboxes = document.querySelectorAll('.item-checkbox');
    var subtotal = 0;

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            var rowIndex = checkbox.closest('tr').rowIndex - 1; // Adjust for header row
            var totalCell = document.getElementById('total-price-' + rowIndex);
            subtotal += parseFloat(totalCell.innerText.replace('₱ ', ''));
        }
    });

    document.getElementById('subtotal').innerText = '₱ ' + subtotal.toFixed(2);

    var deliveryCost = 50; // Set the delivery cost here if needed
    var total = subtotal + deliveryCost;
    document.getElementById('total-price').innerText = '₱ ' + total.toFixed(2);
    document.getElementById('total-amount').value = total.toFixed(2);
}

// Function to update item total price
function updateItemTotalPrice(rowIndex) {
    var quantityInput = document.getElementById('quantity-' + rowIndex);
    var pricePerItem = parseFloat(document.getElementById('price-' + rowIndex).innerText.replace('₱ ', ''));
    var totalCell = document.getElementById('total-price-' + rowIndex);
    var totalPrice = quantityInput.value * pricePerItem;
    totalCell.innerText = '₱ ' + totalPrice.toFixed(2);

    // Recalculate totals
    calculateTotals();
}

// Event listener for checkbox click
document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', calculateTotals);
});

// Event listeners for increase and decrease buttons
document.querySelectorAll('.increment').forEach(function(button) {
    button.addEventListener('click', function() {
        var rowIndex = button.getAttribute('data-index');
        var quantityInput = document.getElementById('quantity-' + rowIndex);
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updateItemTotalPrice(rowIndex);
    });
});

document.querySelectorAll('.decrement').forEach(function(button) {
    button.addEventListener('click', function() {
        var rowIndex = button.getAttribute('data-index');
        var quantityInput = document.getElementById('quantity-' + rowIndex);
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateItemTotalPrice(rowIndex);
        }
    });
});

// Initial calculation
calculateTotals();
