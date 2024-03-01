<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('AuthProd')?>" method="post"></form>
    <p><?= $order['FirstName'];?> <?= $order['LastName'];?></p>
    <p><?= $order['prod_name']?></p>
    <p><?= $order['prod_size']?></p>
    <p><?= $order['total']?></p>
    <p><?= $order['barcode']?></p>
    <input type="hidden" name="LastName" value="<?= $order['LastName']?> ">
    <input type="hidden" name="FirstName" value="<?= $order['FirstName']?> ">
    <input type="hidden" name="LastName" value="<?= $order['LastName']?> ">
    <input type="hidden" name="orderStatus" value="Approved">
</body>
</html>