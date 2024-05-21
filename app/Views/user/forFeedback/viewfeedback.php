<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <style>
        .stars {
            display: inline-block;
            font-size: 0; /* Fix for inline-block space */
        }
        .stars::before {
            content: '★★★★★';
            font-size: 24px;
            background: linear-gradient(90deg, gold calc(var(--rating) / 5 * 100%), lightgray calc(var(--rating) / 5 * 100%));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <?php foreach($feedback as $customerComment):?>
        <p><strong><?= htmlspecialchars($customerComment['Username']) ?></strong></p>
        <div class="stars" style="--rating: <?= htmlspecialchars($customerComment['ratings']) ?>;"></div>
        <p><?= htmlspecialchars($customerComment['comment']) ?></p>
    <?php endforeach; ?>
</body>
</html>
