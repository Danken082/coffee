<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            background: url(/assets/user/images/bg5.jpg) no-repeat fixed;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .backbtn{
            text-align: justify;
        }

        h1 {
            color: #8B4513; 
        }

        form {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            color: #8B4513; 
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #8B4513; 
            border-radius: 5px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#8B4513" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5H7z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 15px;
            padding-right: 30px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #8B4513;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5e2d00;
        }

        .btn-back {
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #8B4513;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #5e2d00;
            color: white;
        }
    </style>
</head>
    <body>
        <div class="container">
            <h1>Add to Cart</h1>
            <form action="<?= base_url('/addtocart/' . $cart['prod_id']) ?>">
                <input type="hidden" name="ProductID" value="<?= $cart['prod_id'] ?>" readonly>
                <input type="hidden" name="CustomerID" value="<?= session()->get('UserID') ?>" readonly>
                <label for="ProductName">Product Name:</label>
                <input type="text" name="prod_name" value="<?= $cart['prod_name'] ?>" readonly>
                <label for="ProductName">Product Size:</label>
                <select name="size" id="size">
                    <option selected disabled>Size</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
                <label for="ProductPrice">Product Price:</label>
                <input type="text" name="prod_mprice" value="<?= $cart['prod_mprice'] ?> Medium" readonly>
                <input type="text" name="prod_lprice" value="<?= $cart['prod_lprice'] ?> Large" readonly>
                <img src="<?= base_url(); ?>/assets/images/<?= $cart['prod_img']; ?>" alt="">
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
