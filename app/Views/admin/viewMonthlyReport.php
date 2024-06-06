<!DOCTYPE html>
<html>
<head>
    <title>Daily Sales</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

h1 {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

h3 {
    margin-top: 0;
    color: #333;
}

p {
    color: #777;
}

    </style>
</head>
<body>
    <form action="<?= base_url('salesReportPerMonth')?>" method="post">
    <div class="container">
        <input type="hidden" name="yearName" value="<?= esc($year) ?>">
        <h1>Daily Sales for the Year of <?= esc($year) ?></h1>
        <?php if (!empty($month) && !empty($monthly) && count($month) === count($monthly)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Month(<?= $year?>)</th>
                        <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($month as $index => $month): ?>
                        <tr>
                            <td><?= esc($month) ?></td>
                            
                            <td>₱ <?= number_format($monthly[$index],2) ?></td>
                        </tr>
                        <input type="hidden" name ="month[]"value="<?= esc($month) ?>">
                        <input type="hidden" name="monthly[]" value="<?= esc($monthly[$index]) ?>">
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Expenses: <?= number_format($expenses,2) ?></h3>
            <h3>Cost: <?= number_format($cost,2) ?></h3>
            <h3>Yearly Sales: <?= number_format($monthsales,2) ?></h3>
            <input type="hidden" name="expenses" value="<?=$expenses?>">
            <input type="hidden" name="cost" value="<?=$cost?>">
            <input type="hidden" name="monthsales" value="<?=$monthsales?>">
            <input type="hidden" name="year" value="<?=$monthsales?>">
            <input type="hidden" name="total" value="<?=$total?>">
            <?php if($total <= 0): ?>
                <h3>Our Total Loss in the Month of <?= esc($month) ?>,Year <?= esc($year) ?>: <?= abs($total) ?></h3>
                
            <?php else: ?>
                <h3>Our Total Profit in the Year <?= esc($year) ?>: <?= number_format($total,2) ?></h3>
            <?php endif; ?>
        <?php else: ?>
            <p>No sales data available for this month.</p>
        <?php endif; ?>
        <button type="submit">Export</button>
        </form>
    </div>
</body>
</html>
