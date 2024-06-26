<div id="new-cart-items">
    <?php foreach($myCart as $index => $item): ?>
        <div class="cart-item">
            <input type="checkbox" name="items[]" value="<?= $index ?>" class="item-checkbox" onchange="updateNewCartTotals()">
            <img src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="Product Image">
            <div class="details">
                <div class="product-name"><?= $item['prod_name'] ?></div>
                <div class="product-size">
                    <?php if ($item['prod_lprice'] > 0): ?>
                        <select name="size" class="custom-size-selector" data-index="<?= $index ?>" data-medium-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>" onchange="updateNewSizePrice(this)">
                            <option value="Medium" <?= $item['size'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
                            <option value="Large" <?= $item['size'] === 'Large' ? 'selected' : '' ?>>Large</option>
                        </select>
                    <?php endif; ?>
                </div>
                <?php $price = $item['size'] === 'Medium' ? $item['prod_mprice'] : ($item['size'] === 'Large' ? $item['prod_lprice'] : 0); ?>
                <div class="price" id="newprice-<?= $index ?>">₱ <?= number_format($price, 2) ?></div>
                <div class="quantity-group">
                    <button type="button" class="decrease" data-index="<?= $index ?>" onclick="decreaseNewQuantity(this)">-</button>
                    <input type="number" readonly name="quantity" class="quantity form-control input-number" value="<?= $item['quantity'] ?>" min="1" max="100" id="newquantity-<?= $index ?>">
                    <button type="button" class="increase" data-index="<?= $index ?>" onclick="increaseNewQuantity(this)">+</button>
                </div>
            </div>
            <div class="product-remove">
                <a href="<?= base_url('/removetocart/') . $item['id'] ?>" onclick="return confirm('Are you sure you want to remove this from your cart?')">
                    <span class="icon-close"></span>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    // For Mobile and Tablet devices
        function updateNewCartTotals() {
        const checkboxes = document.querySelectorAll('#new-cart-items .item-checkbox');
        let subtotal = 0;
        const newcartData = {};

        checkboxes.forEach(checkbox => {
            const index = checkbox.value;
            const priceElement = document.getElementById(`newprice-${index}`);
            const quantityElement = document.getElementById(`newquantity-${index}`);
            const totalElement = document.getElementById(`total-price-${index}`);
            const sizeElement = document.querySelector(`.custom-size-selector[data-index="${index}"]`);
            const price = parseFloat(priceElement.textContent.replace('₱', '').trim());
            const quantity = parseInt(quantityElement.value);

            const total = price * quantity;
            totalElement.textContent = `₱ ${total.toFixed(2)}`;

            if (checkbox.checked) {
                subtotal += total;
            }

            newcartData[index] = {
                checked: checkbox.checked,
                quantity: quantity,
                size: sizeElement ? sizeElement.value : null,
                price: price // Save the price based on the selected size
            };
        }); 

        localStorage.setItem('newCartData', JSON.stringify(newcartData));

        document.getElementById('cart-total').textContent = `₱ ${subtotal.toFixed(2)}`;
        const deliveryFee = 50.00;
        const grandTotal = subtotal + deliveryFee;
        document.getElementById('grand-total').textContent = `₱ ${grandTotal.toFixed(2)}`;
        document.getElementById('total-amount').value = grandTotal.toFixed(2);
    }

    function updateNewSizePrice(selectElement) {
        const index = selectElement.dataset.index;
        const selectedSize = selectElement.value;
        const priceElement = document.getElementById(`newprice-${index}`);
        const quantityElement = document.getElementById(`newquantity-${index}`);
        const totalElement = document.getElementById(`total-price-${index}`);
        const checkbox = document.querySelector(`#new-cart-items .item-checkbox[value="${index}"]`);
        
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
        totalElement.textContent = `₱ ${total.toFixed(2)}`;

        // Update the cart data in local storage immediately after size change
        const newcartData = JSON.parse(localStorage.getItem('newCartData')) || {};
        newcartData[index] = {
            checked: checkbox.checked,
            quantity: quantity,
            size: selectedSize,
            price: newPrice // Save the new price based on the selected size
        };
        localStorage.setItem('newCartData', JSON.stringify(newcartData));

        // Only update the subtotal if the checkbox is checked
        if (checkbox.checked) {
            updateNewCartTotals();
        }
    }

    function decreaseNewQuantity(button) {
        const index = button.dataset.index;
        const quantityInput = document.getElementById(`newquantity-${index}`);
        if (quantityInput.value > 1) {
            quantityInput.value--;
            updateNewCartTotals();
        }
    }

    function increaseNewQuantity(button) {
        const index = button.dataset.index;
        const quantityInput = document.getElementById(`newquantity-${index}`);
        if (quantityInput.value < 100) {
            quantityInput.value++;
            updateNewCartTotals();
        }
    }

    function loadNewCartData() {
        const newcartData = JSON.parse(localStorage.getItem('newCartData'));
        if (newcartData) {
            Object.keys(newcartData).forEach(index => {
                const data = newcartData[index];
                const checkbox = document.querySelector(`#new-cart-items .item-checkbox[value="${index}"]`);
                const quantityElement = document.getElementById(`newquantity-${index}`);
                const sizeElement = document.querySelector(`.custom-size-selector[data-index="${index}"]`);
                const priceElement = document.getElementById(`newprice-${index}`);

                if (checkbox) checkbox.checked = data.checked;
                if (quantityElement) quantityElement.value = data.quantity;
                if (sizeElement && data.size) sizeElement.value = data.size;
                if (priceElement) priceElement.textContent = `₱ ${data.price.toFixed(2)}`; // Set the saved price
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadNewCartData();
        updateNewCartTotals();  // Ensure the cart totals are updated after loading the data
    });
</script>