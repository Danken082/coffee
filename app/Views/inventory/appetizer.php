<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hot Coffee</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <link href="/assets/css/table.css" rel="stylesheet" />
    </head>
    <body>
    <div class="container">
            <div class="col-12">
                <div class="card my-4">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h4 class="text-white text-capitalize ps-3">Appetizer List</h4>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <table class="table align-items-center">
                    <thead>
                        <tr>
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Name</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Description</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Quantity</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Price</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Code</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Image</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Actions</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($prod as $a): ?>
                            <tr>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?=$a['prod_name'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?=$a['prod_desc'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?=$a['prod_quantity'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold">₱ <?=$a['prod_mprice'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?=$a['prod_code'] ?></p>
                                </td>
                                <td class="text-center">
                                    <img src="<?php base_url();?>/assets/images/products/<?= $a['prod_img'] ?>" alt="img">
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('/editappetizer/' .$a['prod_id']) ?>" id='id'
                                        class="text-info font-weight-bold text-xs me-2"
                                        data-toggle="tooltip" data-original-title="Edit Coffee">
                                        Edit
                                    </a>||
                                    <a href="<?= base_url('/deleteappetizer/' .$a['prod_id']) ?>" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Delete</a>
                                </td>
                                <td>
                                    <form action="<?= base_url('/availableappetizer/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $a['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Available">
                                    <button type="submit">Available</button>
                                </form><br><form action="<?= base_url('/unavailableappetizer/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $a['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Unavailable">
                                    <button type="submit">Unavailable</button>
                                </form></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>
                <a href="<?= base_url('/adminprod')?>" class="btn btn-info">BACK</a>
            </div>
        </div>
    </body>
</html>