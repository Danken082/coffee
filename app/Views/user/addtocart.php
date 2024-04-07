<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="/assets/user/css/bootstrap/bootstrap.min2.css"/>
    <link rel="stylesheet" href="/assets/css/cart.css">
</head>
    <body>
        <div class="container">
            <h1>Add to Cart</h1>
            <form action="<?= base_url('/addtocart/' . $cart['prod_id']) ?>">
                <input type="hidden" name="ProductID" value="<?= $cart['prod_id'] ?>" readonly>
                <input type="hidden" name="CustomerID" value="<?= session()->get('UserID') ?>" readonly>
                <label for="ProductName">Product Name:</label>
                <input type="text" name="prod_name" value="<?= $cart['prod_name'] ?>" readonly>
                <label for="ProductSize">Pick Product Size:</label>
                <select name="size" id="size" class="size" required>
                    <option selected disabled></option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
                <label for="ProductPrice">Product Price:</label>
                <input type="text" name="prod_mprice" value="Medium: <?= $cart['prod_mprice'] ?>" readonly>
                <input type="text" name="prod_lprice" value="Large: <?= $cart['prod_lprice'] ?>" readonly>
                <img src="<?= base_url(); ?>/assets/images/products/<?= $cart['prod_img']; ?>" alt="">
                <input type="number" name="quantity" placeholder="Enter Quantity" required>
                <input type="hidden" name="Status" value="oncart">
                <button type="submit">Add to Cart</button>
            </form><br><br>
            <div class= 'backbtn'>
                <a href="<?= site_url('user/shop') ?>" class="btn-back">BACK</a>
            </div>
        </div>
    </body>
</html>
