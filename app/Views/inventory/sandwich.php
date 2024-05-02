<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
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
        <br>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/adminprod')?>" style="background-color: transparent; color:white; font-size: 1.5em;">Back to Product Items</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="background-color: transparent; color:white; font-size: 1.5em;">Sandwich List</li>
        </ol><br><br>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <table>
                    <thead>
                        <tr>
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Name</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Description</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Quantity</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Price</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Barcode</th>
                            
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Image</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Actions</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($prod as $p): ?>
                            <tr>
                                <td class="text-center">
                                    <p class="text-xs  font-weight-bold"><?=$p['prod_name'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs  font-weight-bold"><?=$p['prod_desc'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs  font-weight-bold"><?=$p['prod_quantity'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs  font-weight-bold">₱ <?=$p['prod_mprice'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold"><?=$p['prod_code'] ?></p>
                                </td>
                                <td class="text-center">
                                    <img src="<?php base_url();?>/assets/images/products/<?= $p['prod_img'] ?>" alt="img">
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('/editsandwich/' .$p['prod_id']) ?>" id='id'
                                        class="text-info font-weight-bold text-xs me-2"
                                        data-toggle="tooltip" data-original-title="Edit Coffee">
                                        Edit
                                    </a>||
                                    <a href="<?= base_url('/deletesandwich/' .$p['prod_id']) ?>" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Delete</a>
                                </td>
                            <td>
                                    <form action="<?= base_url('/availablesand/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $p['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Available">
                                    <button type="submit" style="background-color: #507b58; color: white; padding: 5px 10px; font-size: 10px; border-radius: 20px;">Available</button>
                                </form> <br><form action="<?= base_url('/unavailablesand/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $p['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Unavailable">
                                    <button type="submit" style="background-color: #ab3131; color: white; padding: 5px 10px; font-size: 10px; border-radius: 20px;">Unavailable</button>
                                </form></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>
            </div>
        </div>
    </body>
</html>