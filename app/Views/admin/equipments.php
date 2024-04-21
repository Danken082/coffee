<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Equipments</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    </head>
    <body style="background-color: #191C24">
        <style>
            .prodcontainer{
                position: relative;
                min-height: 70vh;
            }
            
            h2{
                text-align: center;
            }

            img{
                width:450px;
                height:320px; 
                border-radius: 20px;
            }

            .prodcontainer .cards{
                padding: 30px 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .prodcontainer .cards .card{
                width: 450px;
                height: 400px;
                background: #191C24;
                margin: 10px 50px;
                border-radius: 10px;
            }

            .breadcrumb{
                background-color: #191C24;
            }
        </style>
        <div style="text-align: center; border: 2px solid lightblue; padding: 10px;">
            <h4 style="color: white;">Equipment Items</h4>
        </div>
        <div class="container">
            <div class="col-12">
                <div class="card my-4"></div>
            </div>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admininventory')?>" style="background-color: transparent; color:white;">Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white;">Equipments</li>
        </ol>
        <div class="prodcontainer">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <img src="/assets/images/hmpg1.jpg" alt="hotcoffee">
                        <div class="container"><br>
                            <a href="/inventoryhotcoffee" class="btn btn-success btn-sm me-3 text-center">Cafe Equipment</a>
                        </div>
                    </div><br>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="/assets/images/products/icedcoffee.jpg" alt="icedcoffee">
                        <div class="container"><br>
                            <a href="/inventoryicedcoffee" class="btn btn-success btn-sm me-3 text-center">Stocks</a>
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