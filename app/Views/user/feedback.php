<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Feedback Form</title>
    <link href="/assets/css/feedback.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2>Rate Product</h2>
        <div class="product-name">
            <h3><?= session()->get('prod_name') ?></h3>
        </div>
        <div class="feedback-display">
            <span class="emoji">😊</span>
            <span class="feedback-text">Give us a rating</span>
        </div>
        <form action="<?= base_url('confirmfeedback') ?>" method="post">
            <input type="hidden" name="CustomerID" value="<?= session()->get('UserID') ?>">
            <input type="hidden" name="ProductID" value="<?= $ProductID ?>">
            <input type="hidden" name="orderID" value="<?= $orderID ?>">
            <input type="hidden" name="ratings" id="ratings" value="">
            <div class="rating">
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1"></label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2"></label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3"></label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4"></label>
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5"></label>
            </div>
            <textarea name="comment" placeholder="Enter your feedback here..." rows="5"></textarea>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
    <a href="<?= base_url('myOrders') ?>" class="back-button">Back</a>

    <script src="/assets/js/feedback.js"></script>
</body>
</html>