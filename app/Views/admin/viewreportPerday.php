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
    <form action="<?= base_url('reports')?>" method="post">
    <div class="container">
        <h1>Daily Sales for the Month of <?= esc($month) ?>, <?= esc($year) ?></h1>
        <?php if (!empty($days) && !empty($daysales) && count($days) === count($daysales)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($days as $index => $day): ?>
                        <tr>
                            <td><?= esc($day) ?></td>
                            
                            <td>₱ <?= number_format($daysales[$index],2) ?></td>
                        </tr>
                        <input type="hidden" name ="day[]"value="<?= esc($day) ?>">
                        <input type="hidden" name="dailysales[]" value="<?= esc($daysales[$index]) ?>">
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Expenses: <?= number_format($expenses,2) ?></h3>
            <h3>Cost: <?= number_format($cost,2) ?></h3>
            <h3>Monthly Sales: <?= number_format($monthly,2) ?></h3>
            <input type="hidden" name="monthly" value="<?=$monthly?>">
            <input type="hidden" name="expenses" value="<?=$expenses?>">
            <input type="hidden" name="cost" value="<?=$cost?>">
            <input type="hidden" name="month" value="<?=$month?>">
            <input type="hidden" name="year" value="<?=$year?>">
            <input type="hidden" name="total" value="<?=$total?>">
            <?php if($total <= 0): ?>
                <h3>Our Total Loss in the Month of <?= esc($month) ?>,Year <?= esc($year) ?>: <?= abs($total) ?></h3>
                
            <?php else: ?>
                <h3>Our Total Profit in the Month of <?= esc($month) ?>, Year <?= esc($year) ?>: <?= number_format($total,2) ?></h3>
            <?php endif; ?>
        <?php else: ?>
            <p>No sales data available for this month.</p>
        <?php endif; ?>
        <button type="submit">Export</button>
        </form>
    </div>
</body>
</html>
