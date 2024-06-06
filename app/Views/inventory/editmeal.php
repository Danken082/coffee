<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <title>Edit Inventory</title>
    <style>
        body {
            background-color: #021024;
            font-family: 'Roboto', sans-serif;
        }
        .card {
            background-color: transparent;
            border: none;
        }
        .card-header {
            background-color: transparent;
        }
        .card-body {
            color: #e0e0e0;
        }
        .form-control {
            background-color: #33475b;
            border: none;
            color: #ffffff;
        }
        .form-control:focus {
            background-color: #3f5971;
            color: #ffffff;
        }
        .btn-success {
            background-color: #4caf50;
            border-color: #4caf50;
        }
        .btn-info {
            background-color: #029acf;
            border-color: #029acf;
        }
        select.form-control { 
            background-color: #33475b;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <br><br>
    <div class="col-md-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 d-flex justify-content-between">
                <div class="border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Edit Meal</h6>
                </div>
                <div>
                    <a href="<?= base_url('/inventorymeal')?>" class="btn btn-info">BACK</a>
                </div>
            </div>
            <div class="card-body px-4 pb-3">
                <form action="<?= base_url('/updatemeal/'. $emeal['prod_id'])?>" class="row g-3" method="POST" enctype="multipart/form-data">
                    <div class="col-md-5">
                        <label for="Name" class="form-label text-white">Product Name</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control" id="name" name="prod_name" value="<?=$emeal['prod_name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="Description" class="form-label text-white">Product Description</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control" id="description" name="prod_desc" value="<?=$emeal['prod_desc'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="Quantity" class="form-label text-white">Quantity</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="number" class="form-control" id="quantity" name="prod_quantity" min="1" value="<?=$emeal['prod_quantity'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="Medium" class="form-label text-white">Price</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" class="form-control" id="medium" name="prod_mprice" min="1" value="<?=$emeal['prod_mprice'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="Barcode" class="form-label text-white">Barcode</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" disabled class="form-control" id="barcode" name="prod_code" value="<?=$emeal['prod_code'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="Images" class="form-label text-white">Images</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="file" id="images" name="prod_img" value="<?=$emeal['prod_img'] ?>" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group input-group-outline my-3 text-center" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-success" style="background-color: #1167b1; color: white;">Update Meal</button>
                        </div>
                        <div class="text-center">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
