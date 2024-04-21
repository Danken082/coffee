<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (session()->getFlashdata('error')): ?>
            <?= session()->getFlashdata('error') ?>
        
    <?php endif; ?>
    <form action="<?= base_url('AdminTable')?>" method="post">
        <label for="">Table Type:</label>
        <input type="text" name="table_Type" id="tabbleType">
        <label for="numbers">Table Number:</label>
        <input type="number" id="number" name="TableNum" min="1">
        <button type="submit">Add Table</button>
    </form>
		<script>
			var inputs = document.getElementById("number");

        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

</body>
</html>