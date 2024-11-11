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
            overflow-y: hidden; /* Prevents body from scrolling */
        }
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            max-height: 90vh; /* Limits the height of the container */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow-y: auto; /* Enables scrolling within the container */
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
        .file-name, .preview-image {
            margin-top: 10px;
            font-size: 0.9em;
            color: #495057;
        }
        .preview-image {
            max-width: 100%;
            margin-top: 15px;
            border-radius: 8px;
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
        
        /* Responsive Styles for Mobile */
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
            .preview-image {
                max-width: 100%;  /* Ensure the image scales down on smaller screens */
                height: auto;
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
            .preview-image {
                width: 100%;  /* Image takes full width on smaller screens */
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?= base_url('OrderOnline')?>" method="post" enctype="multipart/form-data">
            <p><small>Please Make It Fully Paid</small></p>

            <input type="hidden" name="CustomerID" value="<?= $CustomerID?>">
            <input type="hidden" name="ProductID" value="<?= $ProductID?>">
            <input type="hidden" name="quantity" value="<?= $quantity?>">
            <input type="hidden" name="size" value="<?= $size?>">
            <input type="hidden" name="total" value="<?= $total?>">
            <input type="hidden" name="barcode" value="<?= $barcode?>">

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
                <input type="file" name="Paymentimage" id="fileUpload" accept="image/*" onchange="previewImage()">
                <p class="file-name" id="fileName">No file selected</p>
            </div>
            
            <!-- Image preview -->
            <img id="imagePreview" class="preview-image" src="#" alt="Image Preview" style="display: none;">

            <img class="gcash-image" src="<?= base_url('assets/images/gcash.jpg')?>" alt="Gcash Payment">

            <button class="submit-button">Submit Payment</button>
        </form>
    </div>

    <script>
        function previewImage() {
            const fileInput = document.getElementById('fileUpload');
            const fileNameDisplay = document.getElementById('fileName');
            const imagePreview = document.getElementById('imagePreview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(fileInput.files[0]);
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file selected';
                imagePreview.style.display = 'none';
            }
        }
    </script>
</body>
</html>
