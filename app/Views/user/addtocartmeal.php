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
            <form action="<?= base_url('/addtocart/' . $cart['prod_id']) ?>">
            <label for="ProductName" style="font-size:30px"><?= $cart['prod_name'] ?></label>
                <input type="hidden" name="ProductID" value="<?= $cart['prod_id'] ?>" readonly>
                <input type="hidden" name="CustomerID" value="<?= session()->get('UserID') ?>" readonly>
                <input type="hidden" name="size" value="Medium" readonly>
                <label for="ProductPrice" name="prod_mprice" value="<?= $cart['prod_mprice'] ?>">Price: ₱ <?= $cart['prod_mprice'] ?></label>
                <img src="<?= base_url(); ?>/assets/images/products/<?= $cart['prod_img']; ?>" alt="">
                <input type="number" name="quantity" placeholder="Enter Quantity" required>
                <input type="hidden" name="Status" value="oncart">
                <button type="submit">Add to Cart</button>
            </form><br><br>
            <div class= 'backbtn'>
                <a href="<?= site_url('/mainshop') ?>" class="btn-back">BACK</a>
            </div>
        </div>
    </body>
</html>
