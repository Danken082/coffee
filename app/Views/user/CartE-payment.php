<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
        }

        .product-details {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .product-details p {
            margin: 5px 0;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            .form-group label {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
        #gcashQr {
        display: block; 
        width: 500px;
        height: auto; 
        margin: 0 auto;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Data</h1>
        <form id="paymentForm" action="/saveData" method="POST"  enctype="multipart/form-data">
            
            <div id="productFields" class="form-group"></div>
            <p>P<?php echo($select['total'])?></p>
            <p>P<?php var_dump($select['selectedItems'])?></p>
            <div id="totalPrice" class="form-group"></div>

            <div class="form-group">
                <label for="payment">Upload Your Proof of Payment Here:</label>
                <h3>Please Pay Minimum is the Half or Full of Your Payment For Reservation</h3>
                <input required type="file" name="payment" id="payment" accept=".jpg, .jpeg, .png, .gif">
    </div>

            <div class="form-group">
                <p>Scan Gcash QrCode:</p>
                <img src="<?= base_url()?>/assets/images/gcash.jpg" alt="#gcash qr" id="gcashQr">
            </div>

            <button type="submit">Submit Payment</button>
        </form>
    </div>

   
</body>
</html>
