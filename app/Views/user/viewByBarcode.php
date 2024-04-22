<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order In Code</title>
</head>
<body>
   <?= $single['FirstName']?><br>
   <?= $single['ContactNo']?><br>
   <?= $single['address']?><br>
   <?= $single['barcode']?><br>

    <p>Order ni <?= $single['FirstName']?></p>
   <?php foreach($barcode as $order): ?>
    <p>Product Name:</p> <?=  $order['prod_name']?><br>
    <p>Order Quantity:</p> <?= $order['quantity']?><br>
    <p>Product Size:</p>  <?= $order['size']?><br>
    <p>Total</p> <?= $order['total']?><br>
   <?php endforeach;?>
</body>
</html>
