<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saved Reports</title>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .buttons a {
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }
        .buttons a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Saved Sales Reports</h2>
    <?php if (!empty($reports)): ?>
        <table>
            <thead>
                <tr>
                    <th>Report Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?= htmlspecialchars($report['name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="buttons">
                            <!-- Download triggers the same preview modal -->
                            <a href="<?= base_url('reports/' . urlencode($report['name'])) ?>" target="_blank">Preview & Download</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reports found.</p>
    <?php endif; ?>
</body>
</html>
