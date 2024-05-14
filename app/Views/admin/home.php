<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
        <main id="view-panel" class="col-lg-9"><br><br><br><br>
          <div class="container">
            <div class="card">
              <div class="card-body">
                <h1>Welcome Back <?= session()->get('UserRole')?>!</h1><hr>
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
