<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sales Report On <?= $year?></h2>
        <form action="<?= base_url('viewReportMonthly') ?>" method="post">
            <?php foreach($monthname as $month):?>
            <input type="hidden" name="monthname[]" value="<?= date('F', mktime(0, 0, 0, $month, 1))?>">
            <?php endforeach;?>
            <?php foreach($totasalesbyMonth as $monthsales):?>
                <input type="hidden" name="monthsales[]" value="<?= $monthsales?>">
            <?php endforeach;?>
            <?php foreach($total as $sales):?>
                <input type="hidden" name="total" value="<?= $sales?>">
            <?php endforeach;?>
            <input type="hidden" name="year" value="<?= $year?>">
            <div class="form-group">
                <label for="expense">Expenses</label>
                <input type="text" name="expense" id="expense" placeholder="Cost  This Year">
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="text" name="cost" id="cost" placeholder="Expenses This Year">
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("expense").addEventListener("input", function(event) {
            let inputValue = event.target.value;
            event.target.value = inputValue.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        });

        document.getElementById("cost").addEventListener("input", function(event) {
            let inputValue = event.target.value;
            event.target.value = inputValue.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        });
    </script>
</body>
</html>
