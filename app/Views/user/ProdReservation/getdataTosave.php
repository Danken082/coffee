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
            <div id="totalPrice" class="form-group"></div>

            <div class="form-group">
                <label for="payment">Upload Your Proof of Payment Here:</label>
                <input required type="file" name="payment" id="payment" accept=".jpg, .jpeg, .png, .gif">
    </div>

            <div class="form-group">
                <p>Scan Gcash QrCode:</p>
                <img src="<?= base_url()?>/assets/images/gcash.jpg" alt="#gcash qr" id="gcashQr">
            </div>

            <button type="submit">Submit Payment</button>
        </form>
    </div>

    <script>
   document.addEventListener('DOMContentLoaded', () => {
    const paymentData = JSON.parse(localStorage.getItem('paymentData'));
    const lastName = localStorage.getItem('lastName');
    const firstName = localStorage.getItem('firstName');
    const contact = localStorage.getItem('contact');
    const email = localStorage.getItem('email');
    const hc = localStorage.getItem('hc');
    const date = localStorage.getItem('date');
    const message = localStorage.getItem('message');

    if (paymentData) {
        const productFields = document.getElementById('productFields');

        // Create hidden input fields for personal data
        const inputs = [
            { name: 'LastName', value: lastName },
            { name: 'FirstName', value: firstName },
            { name: 'contact', value: contact },
            { name: 'email', value: email },
            { name: 'hc', value: hc },
            { name: 'date', value: date },
        ];

        inputs.forEach(inputData => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = inputData.name;
            input.value = inputData.value;
            productFields.appendChild(input);
        });

        const messageInput = document.createElement('textarea');
        messageInput.name = 'message';
        messageInput.hidden = true;
        messageInput.value = message;
        productFields.appendChild(messageInput);

        let totalSum = 0; // Variable to hold the total sum of all products

        // Loop through each item in the payment data array
        paymentData.forEach((item, index) => {
            const productSize = item.productSize && item.productSize.trim() !== '' ? item.productSize : 'Regular';
            const productIdInput = document.createElement('input');
            productIdInput.type = 'hidden';
            productIdInput.name = `products[${index}][productId]`;
            productIdInput.value = item.productId;

            const productnameInput = document.createElement('input');
            productnameInput.type = 'hidden';
            productnameInput.name = `products[${index}][productname]`;
            productnameInput.value = item.productname;

            const totalPriceInput = document.createElement('input');
            totalPriceInput.type = 'hidden';
            totalPriceInput.name = `products[${index}][totalPrice]`;
            totalPriceInput.value = item.totalPrice;

            const productSizeInput = document.createElement('input');
            productSizeInput.type = 'hidden';
            productSizeInput.name = `products[${index}][productSize]`;
            productSizeInput.value = productSize;

            const totalQuantityInput = document.createElement('input');
            totalQuantityInput.type = 'hidden';
            totalQuantityInput.name = `products[${index}][totalQuantity]`;
            totalQuantityInput.value = item.totalQuantity;

            // Append the hidden inputs to the form
            productFields.appendChild(productnameInput);
            productFields.appendChild(productIdInput);
            productFields.appendChild(totalPriceInput);
            productFields.appendChild(totalQuantityInput);
            productFields.appendChild(productSizeInput);

            // Update the total sum
            totalSum += parseFloat(item.totalPrice);

            


            const productDetailsDiv = document.createElement('div');
            productDetailsDiv.classList.add('product-details');
            productDetailsDiv.innerHTML = `
                <p>Name: ${firstName}</p>
                <p>Contact: ${contact}</p>
                <p>Message: ${message}</p>
                
                <p>Product Name: ${item.productname}</p>
                <p>Product Size: ${productSize}</p>
                <p>Total Price: ₱${item.totalPrice}</p>
                <p>Total Quantity: ${item.totalQuantity}</p>
            `;

            productFields.appendChild(productDetailsDiv);
        });



        const totalPriceDiv = document.createElement('div');
        totalPriceDiv.classList.add('total-price');
        totalPriceDiv.innerHTML = `<p>Total Price of All Products: ₱${totalSum.toFixed(2)}</p>`;
        productFields.appendChild(totalPriceDiv);
    }
});
    </script>
</body>
</html>
