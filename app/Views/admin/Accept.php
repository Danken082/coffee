<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <p><?= $order['FirstName']?></p>
        <p><?= $order['LastName']?></p>

        <p><?= $order['prod_name']?></p>
        <p><?= $order['paymentStatus']?></p>
        <p><?= $order['total']?></p>
    </form>
</body>
</html>