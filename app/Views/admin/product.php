<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="assets/js/pos.js"></script>
    <title>Point of Sale</title>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs" id="posTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">Tab 1</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Tab 2</button>
            </li>
        </ul>
        <div class="tab-content" id="posTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <!-- Content for Tab 1 -->
                <div class="products">
                    <?php foreach($app as $item): ?>
                        <div class="box">    
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
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Order Now</button>
                        </div>
                    <?php endforeach; ?>
                    <!-- Repeat for other categories (pasta, meal, salad, soup) -->
                </div>
                <div class="orders">
                    <h2>Customer Orders</h2><br>
                    <ul class="order-list">
                        <!-- Orders will appear here -->
                    </ul>
                    <div class="total">
                        <h3>Total Price: <span id="total-price">₱ 0.00</span></h3>
                    </div>
                    <button id="finish-order" class="btn btn-success">Finish Order</button>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <!-- Content for Tab 2, same as Tab 1 -->
                <div class="products">
                    <?php foreach($app as $item): ?>
                        <div class="box">    
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
                            <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Order Now</button>
                        </div>
                    <?php endforeach; ?>
                    <!-- Repeat for other categories (pasta, meal, salad, soup) -->
                </div>
                <div class="orders">
                    <h2>Customer Orders</h2><br>
                    <ul class="order-list">
                        <!-- Orders will appear here -->
                    </ul>
                    <div class="total">
                        <h3>Total Price: <span id="total-price">₱ 0.00</span></h3>
                    </div>
                    <button id="finish-order" class="btn btn-success">Finish Order</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for handling orders
        const orderButtons = document.querySelectorAll('.add-to-order');
        const orderLists = document.querySelectorAll('.order-list');
        const totalPrices = document.querySelectorAll('#total-price');
        let total = 0;

        orderButtons.forEach(button => {
            button.addEventListener('click', () => {
                const product = button.parentElement;
                const productName = product.querySelector('h3').innerText;
                const productPrice = parseFloat(button.dataset.price); // Fetch price from data-price attribute
                total += productPrice;

                // Determine which tab is active
                const activeTab = document.querySelector('.tab-pane.active');
                const orderList = activeTab.querySelector('.order-list');
                const totalPrice = activeTab.querySelector('#total-price');

                orderList.innerHTML += `<li>${productName} - ₱ ${productPrice.toFixed(2)}</li>`;
                totalPrice.textContent = `₱ ${total.toFixed(2)}`;
            });
        });

        document.getElementById('finish-order').addEventListener('click', () => {
            const activeTab = document.querySelector('.tab-pane.active');
            const orderItems = activeTab.querySelectorAll('.order-list li');
            const orders = [];
            
            orderItems.forEach(item => {
                const parts = item.textContent.split(' - ');
                const productName = parts[0];
                const productPrice = parseFloat(parts[1].replace('₱ ', ''));
                orders.push({ name: productName, price: productPrice });
            });

            // Send the order data to the server
            fetch('/save-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ orders: orders, total: total })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                // Optionally, display a message to the user indicating that the order was saved successfully
                // Clear the order list
                activeTab.querySelector('.order-list').innerHTML = '';
                // Reset the total price
                total = 0;
                activeTab.querySelector('#total-price').textContent = '₱ 0.00';
            })
            .catch(error => {
                console.error('Error:', error);
                // Optionally, display an error message to the user
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
