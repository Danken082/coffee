<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Inventory</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>
<body style="background-color: #191C24;">
    <style>
        .prodcontainer {
            position: relative;
            min-height: 70vh;
        }

        h2 {
            text-align: center;
        }

        .prodcontainer .cards {
            padding: 30px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .prodcontainer .cards .card {
            width: 450px;
            height: 400px;
            background: #191C24;
            margin: 10px 50px;
            border-radius: 10px;
        }
        .btn-info:hover {
    background-color: grey;
}

    </style>
    
    <div style="text-align: center; border: 2px solid lightblue; padding: 10px;">
    <h4 style="color: white;">Product Items</h4>
</div>
    <div class="container">
        <div class="col-12">
        <div class="card my-4">
   
</div>

        </div>
    </div>
    
<a href="<?= base_url('/admininventory')?>" class="btn btn-info" style="margin: 20px; background-color: transparent;">BACK</a>
<a href="/myproducts" class="btn btn-success btn-sm me-3 text-center" style="margin: 20px; float: right; background-color: lightblue;">Add Product</a>

    <div class="prodcontainer">
        <h2>Drinks</h2>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/coffeewlp6.jpg" alt="hotcoffee" style="width:100%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventoryhotcoffee" class="btn btn-success btn-sm me-3 text-center">Hot Coffee</a>
                    </div>
                </div><br>
            </div>

            <div class="card">
                <div class="box">
                    <img src="/assets/images/icedcoffee.jpg" alt="icedcoffee" style="width:100%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventoryicedcoffee" class="btn btn-success btn-sm me-3 text-center">Iced Coffee</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/icedspanishlatte.jpg" alt="flavoredcoffee" style="width:100%; height:77%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventoryflavoredcoffee" class="btn btn-success btn-sm me-3 text-center">Flavored Iced Coffee</a>
                    </div>
                </div><br>
            </div>

            <div class="card">
                <div class="box">
                    <img src="/assets/images/noncoffee.jpg" alt="noncoffee" style="width:100%; height:61%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorynoncoffee" class="btn btn-success btn-sm me-3 text-center">Non Coffee Frappe</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/coffeefrappe1.jpg" alt="coffeefrappe" style="width:100%; height:60%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorycoffeefrappe" class="btn btn-success btn-sm me-3 text-center">Coffee Frappe</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/coffeewlp2.jpg" alt="others" style="width:100%; height:80%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventoryothers" class="btn btn-success btn-sm me-3 text-center">Others</a>
                    </div>
                </div><br>
            </div>
        </div>
        <h2>Meals</h2>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/meals.jpg" alt="meals" style="width:100%; height:98%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorymeal" class="btn btn-success btn-sm me-3 text-center">Rice Meals</a>
                    </div>
                </div><br>
            </div>

            <div class="card">
                <div class="box">
                    <img src="/assets/images/carbonara.jpg" alt="pasta" style="width:100%; height:60%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorypasta" class="btn btn-success btn-sm me-3 text-center">Pasta</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/nachos.jpg" alt="appetizer" style="width:100%; height:65%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventoryappetizer" class="btn btn-success btn-sm me-3 text-center">Appetizer</a>
                    </div>
                </div><br>
            </div>

            <div class="card">
                <div class="box">
                    <img src="/assets/images/chefsalad.jpg" alt="salad" style="width:100%; height:83%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorysalad" class="btn btn-success btn-sm me-3 text-center">Salad</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/crabandcornsoup.jpg" alt="soup" style="width:100%; height:77%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorysoup" class="btn btn-success btn-sm me-3 text-center">Soup</a>
                    </div>
                </div><br>
            </div>

            <div class="card">
                <div class="box">
                    <img src="/assets/images/cheesybacon.jpg" alt="sandwich" style="width:100%; height:60%; border-radius: 20px;">
                    <div class="container"><br>
                        <a href="/inventorysandwich" class="btn btn-success btn-sm me-3 text-center">Sandwiches</a>
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
