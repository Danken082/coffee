<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Online Payment</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h2 {
            color: #343a40;
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        .container p {
            font-size: 1.1em;
            color: #495057;
            margin: 10px 0;
        }
        .product-info {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .product-info p {
            font-weight: bold;
            color: #343a40;
        }
        .image-upload {
            margin-top: 20px;
        }
        .image-upload label {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .image-upload input[type="file"] {
            display: none;
        }
        .gcash-image {
            margin-top: 20px;
            width: 100%;
            border-radius: 8px;
        }
        .submit-button {
            margin-top: 20px;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 1em;
        }
        .submit-button:hover {
            background-color: #218838;
        }

        /* Media Query for Mobile */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            .container h2 {
                font-size: 1.4em;
            }
            .container p, .product-info p, .image-upload label, .submit-button {
                font-size: 1em;
            }
        }
        @media (max-width: 480px) {
            .container h2 {
                font-size: 1.3em;
            }
            .image-upload label {
                font-size: 0.9em;
                padding: 8px 16px;
            }
            .submit-button {
                padding: 10px;
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?= base_url('OrderOnline')?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?> <!-- CSRF Protection -->

            <input type="hidden" name="CustomerID" value="<?= base64_decode($CustomerID)?>">
            <input type="hidden" name="ProductID" value="<?= base64_decode($ProductID)?>">
            <input type="hidden" name="quantity" value="<?= base64_decode($quantity)?>">
            <input type="hidden" name="size" value="<?= base64_decode($size)?>">
            <input type="hidden" name="total" value="<?= base64_decode($total)?>">
            <input type="hidden" name="barcode" value="<?= base64_decode($barcode)?>">

            <h2>Order Payment Preview</h2>
            <p>Hello, <?= session()->get('FirstName') . ' ' . ucwords(session()->get('LastName')) ?></p>

            <div class="product-info">
                <p>Product: <?= htmlspecialchars($prodName['prod_name']) ?></p>
                <p>Quantity: <?= htmlspecialchars($quantity) ?></p>
                <p>Size: <?= htmlspecialchars($size) ?></p>
                <p>Total: ₱<?= htmlspecialchars($total) ?></p>
            </div>

            <div class="image-upload">
                <label for="fileUpload">Upload Payment Screenshot</label>
                <input type="file" name="image" id="fileUpload" accept="image/*">
            </div>

            <img class="gcash-image" src="<?= base_url('assets/images/gcash.jpg')?>" alt="Gcash Payment">

            <button class="submit-button">Submit Payment</button>
        </form>
    </div>
</body>
</html>
 