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
        <title>Edit Items</title>
    </head>
    <body>
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Edit Raw Materials</h6>
                    </div>
                </div>

                <div class="card-body px-4 pb-3">
                    <form action="<?= base_url('/updateraw/'. $raw['rawID'])?>" class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-5">
                            <label for="Name" class="form-label">Name</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="name" name="name" value="<?=$raw['name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Stocks" class="form-label">Stocks</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="stocks" name="stocks" min="1" value="<?=$raw['stocks'] ?>" readonly>
                            </div>
                        </div>
                             <div class="col-md-5">
                            <label for="Stocks" class="form-label">Add Stocks</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="stocks" name="addstocks" min="1">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="Barcode" class="form-label">BarCode</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" readonly class="form-control" id="barcode" name="barcode" value="<?=$raw['barcode'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline my-3">
                                <button type="submit" class="btn btn-success">Update Raw Materials</button>
                            </div>
                            <a href="<?= base_url('/inventoryrawmats')?>" class="btn btn-info">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>