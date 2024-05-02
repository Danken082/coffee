<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <title>Add Items to Inventory</title>
    </head>
    <body>
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Add Items</h6>
                    </div>
                </div>
                <div class="card-body px-4 pb-3">
                    <form action="<?= base_url('additems')?>" class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="input-group input-group-outline my-3">
                            <label for="name" class="form-label"></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="Stocks" class="form-label"></label>
                            <input type="text" class="form-control" id="stocks" name="stocks" placeholder="Stocks" min="1">
                        </div>
                        <h6>Select Category</h6>
                        <div class="input-group input-group-outline my-3">
                            <label for="category" class="form-label"></label>
                            <select name="item_categ" id="category">
                                <option disabled selected>Category</option>
                                <option value="Equipment">Equipment</option>
                                <option value="Raw Materials">Raw Materials</option>
                                <option value="Supplies">Supplies</option>
                            </select>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <button type="submit" class="btn btn-success">Add Items</button>
                        </div>
                        <div><a href="<?= base_url('/adminitems')?>" class="btn btn-info">BACK</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>