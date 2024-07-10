<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <link href="/assets/css/invent.css" rel="stylesheet" />
</head>
    <body>
        <div style="text-align: center; border: 2px solid lightblue; padding: 10px;">
            <h4>Product Items</h4>
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('/admininventory')?>" style="background-color: transparent; color:white; font-size: 1.5em;">Back to Inventory</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color:white; font-size: 1.5em;">Products</li>
        </ol>
        <a href="/myproducts" class="btn btn-success btn-sm me-3 text-center" style="margin: 20px; float: right; background-color: lightblue;">Add Product</a>
        <br><br>
        <div class="prodcontainer">
        <h2>Meals</h2>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/nachos.jpg" alt="appetizer">
                    <div class="container"><br>
                        <a href="/inventoryappetizer" class="btn btn-success btn-sm me-3 text-center">Appetizer</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/orangechicken.jpg" alt="meals">
                    <div class="container"><br>
                        <a href="/inventorymeal" class="btn btn-success btn-sm me-3 text-center">Breakfast Meals</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/honeychicken.jpg" alt="chicken">
                    <div class="container"><br>
                        <a href="/inventorychicken" class="btn btn-success btn-sm me-3 text-center">Chicken Tenders</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/chickenhv.jpg" alt="chicken fillet">
                    <div class="container"><br>
                        <a href="/inventorychickenfillet" class="btn btn-success btn-sm me-3 text-center">Crunchy Chicken Fillet</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/parmegianameatball.png" alt="pasta">
                    <div class="container"><br>
                        <a href="/inventorypasta" class="btn btn-success btn-sm me-3 text-center">Pasta</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/chefsalad.jpg" alt="salad">
                    <div class="container"><br>
                        <a href="/inventorysalad" class="btn btn-success btn-sm me-3 text-center">Salad</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/cheesybacon.jpg" alt="sandwich">
                    <div class="container"><br>
                        <a href="/inventorysandwich" class="btn btn-success btn-sm me-3 text-center">Sub Sandwiches</a>
                    </div>
                </div><br>
            </div>
        </div>
        <h2>Drinks</h2>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/hotcappuccino.jpg" alt="hot coffee">
                    <div class="container"><br>
                        <a href="/inventoryhotcoffee" class="btn btn-success btn-sm me-3 text-center">Hot Coffee</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/icedamericano.jpg" alt="iced coffee">
                    <div class="container"><br>
                        <a href="/inventoryicedcoffee" class="btn btn-success btn-sm me-3 text-center">Iced Coffee</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/icedcookiesncream.jpg" alt="flavored coffee">
                    <div class="container"><br>
                        <a href="/inventoryflavoredcoffee" class="btn btn-success btn-sm me-3 text-center">Flavored Iced Coffee</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/javafrap.jpg" alt="frappe drinks">
                    <div class="container"><br>
                        <a href="/inventoryfrappe" class="btn btn-success btn-sm me-3 text-center">Frappe Drinks</a>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/blueberry.jpg" alt="lemonade" >
                    <div class="container"><br>
                        <a href="/inventorylemonade" class="btn btn-success btn-sm me-3 text-center">Lemonade</a>
                    </div>
                </div><br>
            </div>
            <div class="card">
                <div class="box">
                    <img src="/assets/images/products/icedtea.jpg" alt="others">
                    <div class="container"><br>
                        <a href="/inventoryothers" class="btn btn-success btn-sm me-3 text-center">Others</a>
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