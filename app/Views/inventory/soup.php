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
    <body style="background-color: #021024">
    <style>
        
        table {
            border-collapse: collapse; /* Collapse border spacing */
            width: 100%; /* Set table width to 100% */
            color: black !important;
        }
        th {
            background-color: #052659; /* Green background */
            border: 1px solid #ddd; /* Add border */
            padding: 8px; /* Add padding */
            text-align: center; /* Center-align text */
        }

        /* CSS for table rows */
        tr {
            background-color: #7da0ca; 
        }

        /* CSS for table cell */
        td {
            border: 1px solid #052659; /* Add border */
            padding: 8px; /* Add padding */
            text-align: center; /* Center-align text */
            color: black;
        }
    </style>
    <div style="text-align: center; border: 2px solid lightblue; padding: 10px;">
        <h4 style="color: white; background-color: #021024;">Soup List</h4>
        </div>
        <a href="<?= base_url('/adminprod')?>" class="btn btn-info" style="margin: 20px; background-color: transparent;">BACK</a>
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
                                    <p class="text-xs font-weight-bold"><?=$p['prod_desc'] ?></p>
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
                                    <a href="<?= base_url('/editsoup/' .$p['prod_id']) ?>" id='id'
                                        class="text-info font-weight-bold text-xs me-2"
                                        data-toggle="tooltip" data-original-title="Edit Coffee">
                                        Edit
                                    </a>
                                    <a href="<?= base_url('/deletesoup/' .$p['prod_id']) ?>" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Delete</a>
                                </td>
                
                            <td>
                                    <form action="<?= base_url('/availablesoup/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $p['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Available">
                                    <button type="submit" style="background-color: #507b58; color: white; padding: 5px 10px; font-size: 10px; border-radius: 20px;">Available</button>
                                </form> <br><form action="<?= base_url('/unavailablesoup/')?>" method="POST">
                                    <input type="hidden" name="update" value="<?= $p['prod_id']?>">
                                    <input type="hidden" name="prod_status" value="Unavailable">
                                    <button type="submit"style="background-color: #ab3131; color: white; padding: 5px 10px; font-size: 10px; border-radius: 20px;">Unavailable</button>
                                </form></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>

            </div>
        </div>
    </body>
</html>