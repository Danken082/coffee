<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        /* CSS for the receipt layout */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .receipt {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: auto;
        }
        .receipt h2 {
            text-align: center;
        }
        .receipt p {
            margin: 5px 0;
        }
        .item {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Receipt</h2>
        <p><strong>Customer Name:</strong> <?= $customer_name ?></p>
        <p><strong>Payment Date:</strong> <?= date('F j, Y, g:i a', strtotime($payment_date)) ?></p>
        <hr>
        <h3>Items:</h3>
        <?php foreach ($items as $item): ?>
            <div class="item">
                <p><strong><?= $item['name'] ?>:</strong> $<?= number_format($item['price'], 2) ?></p>
            </div>
        <?php endforeach; ?>
        <hr>
        <p><strong>Total Amount Paid:</strong> $<?= number_format($amount_paid, 2) ?></p>
    </div>
</body>
</html>