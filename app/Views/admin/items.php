<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Equipments</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <link href="/assets/css/invent.css" rel="stylesheet" />
    </head>
    <body>
        <div style="text-align: center; border: 2px solid lightblue; padding: 10px;">
            <h4 style="color: white;">Items</h4>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admininventory')?>" style="background-color: transparent; color:white; font-size: 1.5em;">Back to Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white; font-size: 1.5em;">Items</li>
        </ol>
        <a href="/myitems" class="btn btn-success btn-sm me-3 text-center" style="margin: 20px; float: right; background-color: lightblue;">Add Items</a>
        <br><br>
        <div class="prodcontainer">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <img src="/assets/images/hmpg1.jpg" alt="equip">
                        <div class="container"><br>
                            <a href="/inventoryequip" class="btn btn-success btn-sm me-3 text-center">Equipments</a>
                        </div>
                    </div><br>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="/assets/images/rawmats.png" alt="material">
                        <div class="container"><br>
                            <a href="/inventoryrawmats" class="btn btn-success btn-sm me-3 text-center">Raw Materials</a>
                        </div>
                    </div><br>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="/assets/images/supply.jpg" alt="supply">
                        <div class="container"><br>
                            <a href="/inventorysupply" class="btn btn-success btn-sm me-3 text-center">Supplies</a>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>

        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/chartjs.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
    </body>
</html>