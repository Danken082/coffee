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
            <form action="<?= base_url('/saveOrder/' . $order['prod_id']) ?>" method="post">
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
                <label for="Medium" name="prod_mprice" value="<?= $order['prod_mprice'] ?>">Medium: ₱ <?= $order['prod_mprice'] ?></label>
                <label for="Large" name="prod_lprice" value="<?= $order['prod_lprice'] ?>">Large: ₱ <?= $order['prod_lprice'] ?></label>
                <img src="<?= base_url(); ?>/assets/images/products/<?= $order['prod_img']; ?>" alt="">
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