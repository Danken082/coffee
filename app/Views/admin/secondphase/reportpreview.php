<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        @page {
            size: 11in 8.5in landscape;
            margin: 1in;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
        }
        .container {
            width: 100%;
            max-width: 1000px;
            border: 2px solid #333;
            padding: 20px;
            background-color: #fff;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 24px;
            margin: 0;
        }
        .header p {
            font-size: 16px;
            margin: 5px 0;
        }
        .export-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            font-size: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 10;
        }
        .export-button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .scrollable {
            max-height: 500px;
            overflow-y: auto;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header h2 {
                font-size: 20px;
            }
            .header p {
                font-size: 14px;
            }
            .export-button {
                top: 10px;
                left: 10px;
                padding: 8px 12px;
                font-size: 12px;
            }
            th, td {
                font-size: 12px;
                padding: 8px;
            }
        }
        /* Responsive Rotation for Mobile */
        @media (max-width: 768px) and (orientation: portrait) {
            body {
                transform: rotate(-90deg);
                transform-origin: left top;
                width: 100vh;
                height: 100vw;
                overflow-x: hidden;
                position: absolute;
                top: 100%;
                left: 0;
            }
            .container {
                max-width: none;
                height: auto;
                padding: 10px;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?= base_url('exportReport/' .$toDate .'/'. $fromDate)?>" method="get">
            <button class="export-button" onclick="exportReport()">Export</button>
        </form>
        <div class="header">
            <h2>Crossroads Coffee And Deli</h2>
            <p>Sales Report</p>
            <p>From <?= (new \DateTime($fromDate))->format('F j, Y') ?> to <?= (new \DateTime($toDate))->format('F j, Y') ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Size</th>
                    <th>Sales</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody class="scrollable">
                <?php if (!empty($report)): ?>
                    <?php foreach ($report as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['prod_name']) ?></td>
                            <td><?= htmlspecialchars($item['prod_quantity']) ?></td>
                            <?php if(!empty($item['size'])):?>
                                <td><?= ucwords(htmlspecialchars($item['size'])) ?></td>
                            <?php else:?>
                                <td>Regular</td>
                            <?php endif;?>
                            <td><?= htmlspecialchars($item['total_amount']) ?></td>
                            <td><?= (new \DateTime($item['order_date']))->format('F j, Y - H:i:s') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p><small>Total Sales: <?= $totalSum?></small></p>
    </div>
</body>
</html>
