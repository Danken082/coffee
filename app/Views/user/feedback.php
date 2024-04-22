<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    <h2>Order Feedback Form</h2>

    <form action="<?= base_url('confirmfeedback')?>" method="post">
    <input type="text" name="CustomerID" placeholder="CustomerID">
    <input type="text" name="ProductID" placeholder="ProductID">
    <input type="text" name="ratings" placeholder="rating">
    <input type="text" name="orderID" placeholder="orderID">
    <textarea name="comment" cols="30" rows="10"></textarea>
    <button type="submit">feedback</button>

    </form>
</body>
</html>