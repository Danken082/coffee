<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('/addtocart/')?>">
    <input type="text" name="ProductID" value ="<?= $cart['prod_id']?>">
    <input type="text" name ="CustomerID" value ="<?= session()->get('UserID')?>">
    <input type="text" name="prod_name" value= "<?= $cart['prod_name']?>">
    <input type="text" name="prod_mprice" value="<?= $cart['prod_mprice']?>">
    <img src="<?php base_url(); ?>assets/images/<?= $cart['prod_img'];?>" alt="">
    <input type="number" name="quantity">
    <input type="hidden" name="Status" value="oncart">
    <button type="submit">go</button>
    </form>
</body>
</html>