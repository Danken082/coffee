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
    <title>Add Product to Inventory</title>
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
                    <h6 class="text-white text-capitalize ps-3">Add Product</h6>
                </div>
                <div>
                    <a href="<?= base_url('/adminprod')?>" class="btn btn-info">BACK</a>
                </div>
            </div>
            <div class="card-body px-4 pb-3">
                <form action="<?= base_url('addproduct')?>" class="row g-3" method="POST" enctype="multipart/form-data">
                    <div class="input-group input-group-outline my-3">
                        <label for="product-name" class="form-label"></label>
                        <input type="text" class="form-control" id="product-name" name="prod_name" placeholder="Product Name" required>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label for="quantity" class="form-label"></label>
                        <input type="number" class="form-control" id="quantity" name="prod_quantity" placeholder="Quantity" min="1" required>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label for="medium" class="form-label"></label>
                        <input type="number" class="form-control" id="medium" name="prod_mprice" placeholder="Medium Price" min="0" required>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label for="large" class="form-label"></label>
                        <input type="number" class="form-control" id="large" name="prod_lprice" placeholder="Large Price" min="0" required>
                    </div>
                    <h6 class="text-white">Select Category</h6>
                    <div class="input-group input-group-outline my-3">
                        <label for="category" class="form-label"></label>
                        <select name="prod_categ" id="category" class="form-control" required>
                            <option disabled selected>Category</option>
                            <option value="Hot Coffee">Hot Coffee</option>
                            <option value="Iced Coffee">Iced Coffee</option>
                            <option value="Flavored Coffee">Flavored Iced Coffee</option>
                            <option value="Non Coffee Frappe">Non Coffee Frappe</option>
                            <option value="Coffee Frappe">Coffee Frappe</option>
                            <option value="Others">Others</option>
                            <option value="Meals">Meals</option>
                            <option value="Pasta">Pasta</option>
                            <option value="Appetizer">Appetizer</option>
                            <option value="Salad">Salad</option>
                            <option value="Soup">Soup</option>
                            <option value="Sandwich">Sandwiches</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label for="Code" class="form-label"></label>
                        <input type="text" name="prod_desc" class="form-control" placeholder="Product Description" required>
                    </div>
                    <h6 class="text-white">Select Image for Product</h6>
                    <div class="input-group input-group-outline my-3">
                        <input type="file" id="images" name="prod_img" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="input-group input-group-outline my-3 text-center" style="display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-success" style="background-color: #1167b1; color: white;">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
