<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="/images/tea.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="https://fontawesome.com/"/>
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    </head>
    
    <body class="g-sidenav-show bg-gray-200"> 
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0">
                    <img src="/assets/images/tea.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-3 font-weight-bold text-white" style="font-size: 1.5em;">Coffee Ledger</span>
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse w-auto "id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("adminhome"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-house-user"></i>
                            </div>
                            <span class="nav-link-text ms-1">Home</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("admindash"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-chart-line"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("admininventory"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-warehouse"></i>
                            </div>
                            <span class="nav-link-text ms-1">Inventory</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="<?= site_url("adminorder"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-receipt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Order</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white " href="<?= site_url("adminorderpayment"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-receipt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Order Payment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("adminhistory"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-list"></i>
                            </div>
                            <span class="nav-link-text ms-1">History</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account page</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("adminmanage_user"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-user"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Admin User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= site_url("admincustomer_user"); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-user"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage User</span>
                        </a>
                    </li><br><br>
                    <li class="nav-item">
                        <a href="<?= site_url("logout"); ?>" class="nav-link text-white">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-power-off me-sm-1"></i>
                            </div>
                            <span class="d-sm-inline d-none">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">

        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
    </body>
</html>