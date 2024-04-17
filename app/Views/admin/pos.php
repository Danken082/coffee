<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe POS System</title>
    <link rel="stylesheet" href="/assets/css/pos.css">
</head>
<body>
    <div class="container">
        <h1>Cafe POS System</h1>
        <div class="menu">
            <h2>Menu</h2>
            <ul>
                <li><span class="item-name">Coffee</span> - $2.50</li>
                <li><span class="item-name">Tea</span> - $2.00</li>
                <!-- Add more items here -->
            </ul>
        </div>
        <div class="order">
            <h2>Order</h2>
            <ul id="order-list">
                <!-- Display ordered items here -->
            </ul>
            <h3>Total: $<span id="total">0.00</span></h3>
            <button onclick="checkout()">Checkout</button>
        </div>
    </div>

    <script src="/assets/js/script.js"></script>
</body>
</html>
