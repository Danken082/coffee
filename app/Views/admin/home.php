<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
        
        <main id="view-panel" class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                <!-- Your navbar content -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <br>
                                <p>Welcome Back <?= session()->get('UserRole')?>!</p>
                                <hr>
                            </div>
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
