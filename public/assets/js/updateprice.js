// For desktop device
function updateCartTotals() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    let subtotal = 0;
    const cartData = {};

    checkboxes.forEach(checkbox => {
        const index = checkbox.value;
        const priceElement = document.getElementById(`price-${index}`);
        const quantityElement = document.getElementById(`quantity-${index}`);
        const totalElement = document.getElementById(`total-price-${index}`);
        const totalHide = document.getElementById(`hidden-total-price-${index}`);
        const sizeElement = document.querySelector(`select[data-index="${index}"]`);
        const price = parseFloat(priceElement.textContent.replace('₱', '').trim());
        const quantity = parseInt(quantityElement.value);

        const total = price * quantity;
        totalElement.textContent = total.toFixed(2); // Update total text
        totalHide.value = total.toFixed(2); // Update hidden input value

        if (checkbox.checked) {
            subtotal += total;
        }

        cartData[index] = {
            checked: checkbox.checked,
            quantity: quantity,
            size: sizeElement ? sizeElement.value : null,
            price: price // Save the price based on the selected size
        };
    });

    localStorage.setItem('cartData', JSON.stringify(cartData));

    document.getElementById('cart-total').textContent = `₱ ${subtotal.toFixed(2)}`;
    const deliveryFee = 50.00;
    const grandTotal = subtotal + deliveryFee;
    document.getElementById('grand-total').textContent = `₱ ${grandTotal.toFixed(2)}`;
    document.getElementById('total-amount').value = grandTotal.toFixed(2);
}

function updateSizePrice(selectElement) {
    const index = selectElement.dataset.index;
    const selectedSize = selectElement.value;
    const priceElement = document.getElementById(`price-${index}`);
    const quantityElement = document.getElementById(`quantity-${index}`);
    const totalElement = document.getElementById(`total-price-${index}`);
    const totalHide = document.getElementById(`hidden-total-price-${index}`);
    const checkbox = document.querySelector(`.item-checkbox[value="${index}"]`);
    
    // Update the price based on the selected size
    let newPrice;
    if (selectedSize === 'Medium') {
        newPrice = parseFloat(selectElement.dataset.mediumPrice);
    } else if (selectedSize === 'Large') {
        newPrice = parseFloat(selectElement.dataset.largePrice);
    } else {
        newPrice = 0;
    }

    priceElement.textContent = `₱ ${newPrice.toFixed(2)}`;

    // Update the total price for this item
    const quantity = parseInt(quantityElement.value);
    const total = newPrice * quantity;
    totalElement.textContent = total.toFixed(2); // Update total text
    totalHide.value = total.toFixed(2); // Update hidden input value

    // Update the cart data in local storage immediately after size change
    const cartData = JSON.parse(localStorage.getItem('cartData')) || {};
    cartData[index] = {
        checked: checkbox.checked,
        quantity: quantity,
        size: selectedSize,
        price: newPrice // Save the new price based on the selected size
    };
    localStorage.setItem('cartData', JSON.stringify(cartData));

    // Only update the subtotal if the checkbox is checked
    if (checkbox.checked) {
        updateCartTotals();
    }
}

function decreaseQuantity(button) {
    updateCartTotals();
}

function increaseQuantity(button) {
        updateCartTotals();
}

function loadCartData() {
    const cartData = JSON.parse(localStorage.getItem('cartData'));
    if (cartData) {
        Object.keys(cartData).forEach(index => {
            const data = cartData[index];
            const checkbox = document.querySelector(`.item-checkbox[value="${index}"]`);
            const quantityElement = document.getElementById(`quantity-${index}`);
            const sizeElement = document.querySelector(`select[data-index="${index}"]`);
            const priceElement = document.getElementById(`price-${index}`);

            if (checkbox) checkbox.checked = data.checked;
            if (quantityElement) quantityElement.value = data.quantity;
            if (sizeElement && data.size) sizeElement.value = data.size;
            if (priceElement) priceElement.textContent = `₱ ${data.price.toFixed(2)}`; // Set the saved price
        });
    }
}

function selectAllItems(selectAllCheckbox) {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
    });
    updateCartTotals();
}

document.addEventListener('DOMContentLoaded', () => {
    loadCartData();
    updateCartTotals();  // Ensure the cart totals are updated after loading the data

    const selectAllCheckbox = document.getElementById('select-all');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', () => selectAllItems(selectAllCheckbox));
    }
});
