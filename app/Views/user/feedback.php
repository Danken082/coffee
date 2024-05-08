<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #663300; /* Coffee Brown */
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: vertical;
        }
        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 30px;
            color: #663300;/* Coffee Brown */
            cursor: pointer;
        }
        .rating label:before {
            content: '\2605'; /* Star Unicode */
        }
        .rating input:checked ~ label {
            color: #663300;/* Coffee Brown */
        }
        .rating input:checked ~ label:before {
            color: #ffeecc; /* Cream */
            transition: color 0.3s ease;
        }
        .rating input:checked:nth-child(5) ~ label:nth-child(5):before,
        .rating input:checked:nth-child(4) ~ label:nth-child(4):before,
        .rating input:checked:nth-child(3) ~ label:nth-child(3):before,
        .rating input:checked:nth-child(2) ~ label:nth-child(2):before,
        .rating input:checked:nth-child(1) ~ label:nth-child(1):before {
            color: #ffeecc; /* Cream */
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #663300; /* Coffee Brown */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #996633; /* Darker Coffee Brown */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Feedback Form</h2>
        <form action="<?= base_url('confirmfeedback')?>" method="post">
            <input type="hidden" name="CustomerID" placeholder="CustomerID" value ="<?= session()->get('UserID')?>">
            <input type="hidden" name="ProductID" placeholder="ProductID" value="<?= $ProductID?>">
            <div class="rating">
                <input type="radio" id="star1" name="ratings" value="1">
                <label for="star1"></label>
                <input type="radio" id="star2" name="ratings" value="2">
                <label for="star2"></label>
                <input type="radio" id="star3" name="ratings" value="3">
                <label for="star3"></label>
                <input type="radio" id="star4" name="ratings" value="4">
                <label for="star4"></label>
                <input type="radio" id="star5" name="ratings" value="5">
                <label for="star5"></label>
            </div>
            <input type="hidden" name="orderID" placeholder="OrderID" value="<?= $orderID?>">
            <textarea name="comment" placeholder="Enter your feedback here..." rows="5"></textarea>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
