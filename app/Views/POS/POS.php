<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/pos.css">
    
    <script src="assets/js/pos.js"></script>
    <title>Point of Sale</title>
</head>

<body>
    <div class="container">
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
            <?php foreach($pasta as $item): ?>
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
            <?php foreach($meal as $item): ?>
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
                    <!-- Pass the product price to the JavaScript function -->
                    <button class="btn btn-primary btn-outline-primary add-to-order" data-price="<?= $item['prod_mprice'] ?>">Order Now</button>
                </div>
            <?php endforeach; ?>
            <?php foreach($salad as $item): ?>
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
            <?php foreach($soup as $item): ?>
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

    <script>
        // JavaScript for handling orders
        const orderButtons = document.querySelectorAll('.add-to-order');
        const orderList = document.querySelector('.order-list');
        const totalPrice = document.getElementById('total-price');
        let total = 0;

        orderButtons.forEach(button => {
            button.addEventListener('click', () => {
                const product = button.parentElement;
                const productName = product.querySelector('h3').innerText;
                const productPrice = parseFloat(button.dataset.price); // Fetch price from data-price attribute
                total += productPrice;
                orderList.innerHTML += `<li>${productName} - ₱ ${productPrice.toFixed(2)}</li>`;
                totalPrice.textContent = `₱ ${total.toFixed(2)}`;
            });
        });

        document.getElementById('finish-order').addEventListener('click', () => {
    const orderItems = document.querySelectorAll('.order-list li');
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
        document.querySelector('.order-list').innerHTML = '';
        // Reset the total price
        total = 0;
        totalPrice.textContent = '₱ 0.00';
    })
    .catch(error => {
        console.error('Error:', error);
        // Optionally, display an error message to the user
    });
});
    
    </script>
    <script>
        
    </script>
</body>
</html>
