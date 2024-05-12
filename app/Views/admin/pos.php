<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
    <link href="/assets/css/pos.css" rel="stylesheet" />
    <link href="https://fontawesome.com/"/>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <a href="<?= base_url('/adminhome')?>" style="background-color: transparent; color:black; font-size: 1.5em;">Back to Home</a>
        <div class="container">
            <div class="products-container">
                <div class="search-bar-container">
                    <input type="text" id="search" class="search-bar" placeholder="Search products...">
                    <i class="fa fas fa-search search-icon"></i>
                </div>
                <h2>Products</h2>
                <div class="category-tabs">
                        <button class="category-tab active" data-category="all">All</button>
                        <button class="category-tab" data-category="app">Appetizer</button>
                        <button class="category-tab" data-category="pasta">Pasta</button>
                        <button class="category-tab" data-category="meal">Rice Meal</button>
                        <button class="category-tab" data-category="salad">Salad</button>
                        <button class="category-tab" data-category="sand">Sandwich</button>
                        <button class="category-tab" data-category="soup">Soup</button>
                        <button class="category-tab" data-category="hot">Hot Coffee</button>
                        <button class="category-tab" data-category="iced">Iced Coffee</button>
                        <button class="category-tab" data-category="flav">Flavored Iced Coffee</button>
                        <button class="category-tab" data-category="non">Non Coffee Frappe</button>
                        <button class="category-tab" data-category="coffee">Coffee Frappe</button>
                        <button class="category-tab" data-category="other">Others</button>
                    </div>
                    <div class="products">
                        <?php foreach($app as $item): ?>
                            <div class="box" data-category="app">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span>₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach($pasta as $item): ?>
                            <div class="box" data-category="pasta">
                                <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                                <h3><a><?= $item['prod_name'] ?></a></h3>
                                <?php if($item['prod_lprice'] == 0.00):?> 
                                    <p class="price">
                                        <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                    </p>
                                <?php else:?>
                                    <p class="price">
                                        <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                    </p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                            </div>
                        <?php endforeach; ?>
                    <?php foreach($meal as $item): ?>
                        <div class="box" data-category="meal">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span> ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($salad as $item): ?>
                        <div class="box" data-category="salad">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($sand as $item): ?>
                        <div class="box" data-category="sand">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($soup as $item): ?>
                        <div class="box" data-category="soup">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($hot as $item): ?>
                        <div class="box" data-category="hot">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($iced as $item): ?>
                        <div class="box" data-category="iced">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($flav as $item): ?>
                        <div class="box" data-category="flav">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($non as $item): ?>
                        <div class="box" data-category="non">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($coffee as $item): ?>
                        <div class="box" data-category="coffee">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                                <?php else:?>
                                    <select class="size-select" data-regular-price="<?= $item['prod_mprice'] ?>" data-large-price="<?= $item['prod_lprice'] ?>">
                                        <option value="<?= $item['prod_mprice'] ?>">Regular</option>
                                        <option value="<?= $item['prod_lprice'] ?>">Large</option>
                                    </select>
                                <?php endif;?><br><br>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($other as $item): ?>
                        <div class="box" data-category="other">
                            <img class="menu-img img mb-4" src="<?= "/assets/images/products/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
                            <h3><a><?= $item['prod_name'] ?></a></h3>
                            <?php if($item['prod_lprice'] == 0.00):?> 
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                                </p>
                            <?php else:?>
                                <p class="price">
                                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                                </p>
                            <?php endif;?>
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Add</button>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="no-product-message" style="display: none;">
                    There's no such product here.
                </div>
            </div>
            <div class="orders-container">
                <div class="box">
                    <h2>Customer Orders</h2>
                    <table class="order-list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="total">
                        <h3>Total Quantity: <span id="total-quantity">0</span></h3>
                        <h3>Total Price: <span id="total-price">₱ 0.00</span></h3>
                    </div>
                    <div class="payment-container">
                        <input type="number" id="payment-input" placeholder="Enter payment amount"><br><br>
                        <button id="pay-button">Pay</button><br><br>
                        <div id="change-output"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const orderButtons = document.querySelectorAll('.add-to-order');
        const orderList = document.querySelector('.order-list tbody');
        const totalPrice = document.getElementById('total-price');
        const totalQuantity = document.getElementById('total-quantity');
        let total = 0;
        let quantityTotal = 0;

        orderButtons.forEach(button => {
            button.addEventListener('click', () => {
                const product = button.parentElement;
                const productName = product.querySelector('h3').innerText;
                let productPrice = parseFloat(button.dataset.price);
                let productSize = '';

                // Check if the product has regular and large sizes
                if (product.querySelector('.size-select')) {
                    // Get the selected size
                    const selectedOption = product.querySelector('.size-select option:checked');
                    productSize = selectedOption ? selectedOption.textContent : '';
                    // Get the selected price based on the dropdown selection
                    productPrice = parseFloat(selectedOption.value);
                }

                let existingRow = null;

                // Check if the product is already in the order list with the same size
                orderList.querySelectorAll('tr').forEach(row => {
                    const rowProductName = row.cells[0].textContent;
                    let rowProductSize = '';

                    // Check if the row contains size information
                    if (row.querySelector('.size-cell')) {
                        rowProductSize = row.querySelector('.size-cell').textContent;
                    }

                    // Check if the product name and size match an existing row
                    if (rowProductName === productName && rowProductSize === productSize) {
                        existingRow = row;
                        return;
                    }
                });

                if (existingRow) {
                    // Increase the quantity if the product is already in the order list with the same size
                    const quantityElement = existingRow.querySelector('.quantity');
                    const quantity = parseInt(quantityElement.textContent) + 1;
                    quantityElement.textContent = quantity; // Update the quantity
                    total += productPrice; // Increment total by the product price
                    quantityTotal += 1; // Increment total quantity
                    totalPrice.textContent = `₱ ${total.toFixed(2)}`; // Update the total price
                    totalQuantity.textContent = quantityTotal; // Update total quantity
                } else {
                    // Check if the product is already in the order list with a different size
                    let productExists = false;
                    orderList.querySelectorAll('tr').forEach(row => {
                        const rowProductName = row.cells[0].textContent;
                        if (rowProductName === productName) {
                            productExists = true;
                            return;
                        }
                    });

                    // Add row to the table if the product is not in the order list or if a different size is selected
                    if (!productExists || productSize) {
                        total += productPrice; // Add the selected price to the total
                        quantityTotal += 1; // Increment total quantity
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${productName}</td>
                            <td class="size-cell">${productSize}</td>
                            <td class="quantity-cell">
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </td>
                            <td class="price-cell">₱ ${productPrice.toFixed(2)}</td>
                            <td><button class="remove">Remove</button></td>
                        `;
                        orderList.appendChild(row);
                        totalPrice.textContent = `₱ ${total.toFixed(2)}`;
                        totalQuantity.textContent = quantityTotal; // Update total quantity
                    }
                }
            });
        });

        // Event listeners for increasing and decreasing quantity
        orderList.addEventListener('click', (event) => {
            const target = event.target;
            if (target.classList.contains('increase')) {
                const quantityElement = target.parentNode.querySelector('.quantity');
                const quantity = parseInt(quantityElement.textContent);
                const price = parseFloat(target.parentNode.nextElementSibling.textContent.replace('₱ ', ''));
                quantityElement.textContent = quantity + 1;
                total += price;
                quantityTotal += 1; // Increment total quantity
                totalPrice.textContent = `₱ ${total.toFixed(2)}`;
                totalQuantity.textContent = quantityTotal; // Update total quantity
            } else if (target.classList.contains('decrease')) {
                const quantityElement = target.parentNode.querySelector('.quantity');
                const quantity = parseInt(quantityElement.textContent);
                if (quantity > 1) {
                    const price = parseFloat(target.parentNode.nextElementSibling.textContent.replace('₱ ', ''));
                    quantityElement.textContent = quantity - 1;
                    total -= price;
                    quantityTotal -= 1; // Decrement total quantity
                    totalPrice.textContent = `₱ ${total.toFixed(2)}`;
                    totalQuantity.textContent = quantityTotal; // Update total quantity
                }
            } else if (target.classList.contains('remove')) {
                const row = target.closest('tr');
                const price = parseFloat(row.querySelector('.price-cell').textContent.replace('₱ ', ''));
                const quantity = parseInt(row.querySelector('.quantity').textContent);
                total -= price * quantity;
                quantityTotal -= quantity; // Subtract removed item quantity from total quantity
                row.remove();
                totalPrice.textContent = `₱ ${total.toFixed(2)}`;
                totalQuantity.textContent = quantityTotal; // Update total quantity
            }
        });
    </script>
    <script>
        const payButton = document.getElementById('pay-button');
        const paymentInput = document.getElementById('payment-input');
        const changeOutput = document.getElementById('change-output');

        orderButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Your existing code for adding items to the order list
            });
        });

        // Event listeners for increasing and decreasing quantity
        // Your existing code for quantity manipulation

        payButton.addEventListener('click', () => {
            const payment = parseFloat(paymentInput.value);
            const change = payment - total;

            if (change >= 0) {
                changeOutput.textContent = `Change: ₱ ${change.toFixed(2)}`;
            } else {
                alert('Insufficient payment.');
            }
        });
    </script>
    <script>
        const categoryTabs = document.querySelectorAll('.category-tab');
        const productBoxes = document.querySelectorAll('.products .box');

        categoryTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.dataset.category;
                filterProducts(category);
            });
        });

        function filterProducts(category) {
            productBoxes.forEach(box => {
                const productCategory = box.dataset.category;

                if (category === 'all' || productCategory === category) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        }
    </script>
    <script>
        const searchInput = document.getElementById('search');
        const noProductMessage = document.querySelector('.no-product-message');

        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.trim().toLowerCase();
            let anyProductFound = false;

            productBoxes.forEach(box => {
                const productName = box.querySelector('h3').innerText.toLowerCase();

                if (productName.includes(searchTerm)) {
                    box.style.display = 'block';
                    anyProductFound = true;
                } else {
                    box.style.display = 'none';
                }
            });

            if (anyProductFound) {
                noProductMessage.style.display = 'none';
            } else {
                noProductMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
