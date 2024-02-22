<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="<?php base_url('order')?>" method ="post">
        <input type="hidden" name="CustomerID" value="<?= session()->get('UserID')?>">
        <input type="hidden" name="ProductID" value="<?= $prod['prod_id']?>">
        <p><?= $prod['prod_name']?></p>
        <p><?= $prod['prod_mprice']?></p>
        <p><?= $prod['prod_img']?></p>
        <input type="number" name="quantity">
        <input type="hidden" name="status" value="noPaid">
        <input type="text" name="quantity">
        <Select name="order_type">
            <option value="dinein">Dine In</option>
            <option value="takeout">Take Out</option>
            
        </Select>
        <input type="hidden" name="order_status" value="notPaid">
        </form>
</body>
</html>