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
            <form action="<?= base_url('user/checkouts/') ?>" method="post">
            <label for="ProductName" style="font-size:30px"><?= $order['prod_name'] ?></label>
                <input type="hidden" name="ProductID" value="<?= $order['prod_id'] ?>" readonly>
                <input type="hidden" name="CustomerID" value="<?= session()->get('UserID') ?>" readonly>
                <label for="ProductSize">Pick Product Size:</label>
                <select name="size" id="size" class="size" required>
                    <option selected disabled></option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    </select>
                <label for="ProductPrice">Product Price:</label>
                <input type="text" name="prod_mprice" value="Medium: <?= $order['prod_mprice'] ?>" readonly>
                <input type="text" name="prod_lprice" value="Large: <?= $order['prod_lprice'] ?>" readonly>
                <img src="<?= base_url(); ?>/assets/images/products/<?= $order['prod_img']; ?>" alt="">
                <input type="number" name="quantity" placeholder="Enter Quantity" required>
                <input type="hidden" name="Status" value="oncart">
                <button type="submit">Buy Now</button>
            </form><br><br>
            <div class= 'backbtn'>
                <a href="<?= site_url('/mainshop') ?>" class="btn-back">BACK</a>
            </div>
        </div>
    </body>
</html>
