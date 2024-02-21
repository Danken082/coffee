<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #8B4513;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        img {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }

        button[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #8B4513;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #A0522D;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Add to Cart</h1>
        <form action="<?= base_url('/addtocart/')?>">
            <label for="ProductID">Product ID:</label>
            <input type="text" name="ProductID" value ="<?= $cart['prod_id']?>" readonly>
            <label for="CustomerID">Customer ID:</label>
            <input type="text" name ="CustomerID" value ="<?= session()->get('UserID')?>" readonly>
            <label for="ProductName">Product Name:</label>
            <input type="text" name="prod_name" value= "<?= $cart['prod_name']?>" readonly>
            <label for="ProductPrice">Product Price:</label>
            <input type="text" name="prod_mprice" value="<?= $cart['prod_mprice']?>" readonly>
            <img src="<?php base_url(); ?>assets/images/<?= $cart['prod_img'];?>" alt="">
            <input type="number" name="quantity" placeholder="Enter Quantity" required>
            <input type="hidden" name="Status" value="oncart">
            <button type="submit">Add to Cart</button>
        </form><br><br>
        <a href="<?= base_url('user/shop')?>" class="btn btn-info">BACK</a>
    </div>
</body>
</html>