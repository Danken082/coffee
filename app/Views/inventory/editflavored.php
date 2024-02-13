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
        <title>Edit Inventory</title>
    </head>
    <body>
        <div class="col-md-12">
            <!-- Edit Product Form -->
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Edit Drink</h6>
                    </div>
                </div>

                <div class="card-body px-4 pb-3">

                    <form action="<?= base_url('/updateflavored/'. $eflav['prod_id'])?>" class="row g-3" method="POST">
                    <div class="col-md-5">
                            <label for="Name" class="form-label">Product Name</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="name" name="prod_name" value="<?=$eflav['prod_name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Quantity" class="form-label">Quantity</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="number" class="form-control" id="quantity" name="prod_quantity" value="<?=$eflav['prod_quantity'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Medium" class="form-label">Price</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="medium" name="prod_mprice" value="<?=$eflav['prod_mprice'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Barcode" class="form-label">BarCode</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="barcode" name="prod_code" value="<?=$eflav['prod_code'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Images" class="form-label">Images</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="file" id="images" name="prod_img" value="<?=$eflav['prod_img'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline my-3">
                                <button type="submit" class="btn btn-success">Update Drink</button>
                            </div>
                            <a href="<?= base_url('/inventoryflavoredcoffee')?>" class="btn btn-info">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>