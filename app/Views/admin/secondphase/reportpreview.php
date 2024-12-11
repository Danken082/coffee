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
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 100%;
            max-width: 1100px;
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            font-size: 28px;
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
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e1f5fe;
        }
        .signature-section {
            margin-top: 30px;
            text-align: center;
        }
        .signature-box {
            margin: 30px auto;
            width: 50%;
            text-align: center;
            padding: 10px;
            border-top: 2px solid #333;
        }
        .footer {
            text-align: right;
            font-size: 12px;
            color: #555;
            margin-top: 20px;
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
            <p><strong>Sales Report</strong></p>
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
            <tbody>
                <?php if (!empty($report)): ?>
                    <?php foreach ($report as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['prod_name']) ?></td>
                            <td><?= htmlspecialchars($item['prod_quantity']) ?></td>
                            <?php if (!empty($item['size'])): ?>
                                <td><?= ucwords(htmlspecialchars($item['size'])) ?></td>
                            <?php else: ?>
                                <td>Regular</td>
                            <?php endif; ?>
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
        <p><strong>Total Sales: <?= $totalSum ?></strong></p>
        <br>
        <br>
        <!-- Signature Section -->
        <div class="signature-section">
            <div class="signature-box">
  
              <p>Prepared By:</p>
                <p><strong>Jose Gabriel Astruias</strong></p>
                <p>Position: Owner</p>
            </div>
        </div>

    </div>
</body>
</html>
