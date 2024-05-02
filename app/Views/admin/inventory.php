<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }

        .container img {
            width: 50%;
            height: auto;
            border-radius: 10px;
            border: 2px solid #ddd; 
            overflow: hidden;
        }

        .container .btn {
            background-color: transparent;
            color: #555;
            font-size: 16px;
            padding: 10px 20px;
            border: 2px solid #555;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .container .btn:hover {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
        <main id="view-panel" class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            </nav><br><br><br>
            <div style="text-align: center; color: lightblue; font-size: 24px; font-weight: bold;">Items and Product</div>
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <br><br><br><br>
                        </div>
                    </div>
                </div><br><br><br>
                <div class="container">
                    <div>
                        <img src="/assets/images/hmpg1.jpg" alt="Snow" style="height:400px; width:400px;">
                        <div class="btn-container"><br>
                            <a href="/adminitems" class="btn btn-success btn-sm me-3 text-center">Items</a>
                        </div>
                    </div>
                    <div>
                        <img src="/assets/images/coffeewlp2.jpg" alt="Snow" style="height:400px; width:400px;">
                        <div class="btn-container"><br>
                        <a href="/adminprod" class="btn btn-success btn-sm me-3 text-center">Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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