<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Crossroad</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <link rel="stylesheet" href="/assets/user/css/open-iconic-bootstrap.min.css"/>
        <link rel="stylesheet" href="/assets/user/css/animate.css"/>
        <link rel="stylesheet" href="/assets/user/css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="/assets/user/css/owl.theme.default.min.css"/>
        <link rel="stylesheet" href="/assets/user/css/magnific-popup.css"/>
        <link rel="stylesheet" href="/assets/user/css/aos.css"/>
        <link rel="stylesheet" href="/assets/user/css/ionicons.min.css">
        <link rel="stylesheet" href="/assets/user/css/bootstrap-datepicker.css"/>
        <link rel="stylesheet" href="/assets/user/css/jquery.timepicker.css"/>
        <link rel="stylesheet" href="/assets/user/css/flaticon.css"/>
        <link rel="stylesheet" href="/assets/user/css/icomoon.css"/>
        <link rel="stylesheet" href="/assets/user/css/styles.css"/>
    </head>
    <style>
        .rounded-circle{
            width: 50px;
            height: 50px;
            float: right;          
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" style="color: white;">CrossRoads<small>Coffee and Deli</small></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="<?= site_url("/mainhome"); ?>" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="<?= site_url("/mainmenu"); ?>" class="nav-link">Menu</a></li>
                        <li class="nav-item"><a href="<?= site_url("/mainservices"); ?>" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="<?= site_url("/mainabout"); ?>" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="<?= site_url("/mainshop"); ?>" class="nav-link">Shop</a></li>
                        <li class="nav-item"><a href="<?= site_url("/maincontact"); ?>" class="nav-link">Contact</a></li>
                        <li class="nav-item cart"><a href="<?= site_url("/cart"); ?>" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="<?php if($cartItemCount >=1):?>bag<?php endif;?> d-flex justify-content-center align-items-center"><small><?php if($cartItemCount >= 1):?><?= $cartItemCount ?><?php elseif($cartItemCount ==0):?><?php endif;?></small></span></a></li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="<?= base_url()?>/coffee/assets/user/images<?=session()->get('profile_img')?>" alt="pfp" class="rounded-circle img" width="150"><p style="font-size:x-small"><?= session()->get('FirstName')?> <?= session()->get('LastName')?></p>
                                    <span class="availability-status online"></span>
                                </div>
                            </a>
                               <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="<?= site_url("/profile/"); ?>"><i class="mdi mdi-cached me-2 text-success"></i>See Profile</a>
                                <a class="dropdown-item" href="myOrders"><i class="mdi mdi-cached me-2 text-success"></i>Orders</a>
                                <a class="dropdown-item" href="/myReservation"><i class="mdi mdi-cached me-2 text-success"></i>Reservation</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url("/logout"); ?>">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/user/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="/assets/user/js/popper.min.js"></script>
        <script src="/assets/user/js/bootstrap.min.js"></script>
        <script src="/assets/user/js/jquery.easing.1.3.js"></script>
        <script src="/assets/user/js/jquery.waypoints.min.js"></script>
        <script src="/assets/user/js/jquery.stellar.min.js"></script>
        <script src="/assets/user/js/owl.carousel.min.js"></script>
        <script src="/assets/user/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/user/js/aos.js"></script>
        <script src="/assets/user/js/jquery.animateNumber.min.js"></script>
        <script src="/assets/user/js/bootstrap-datepicker.js"></script>
        <script src="/assets/user/js/jquery.timepicker.min.js"></script>
        <script src="/assets/user/js/scrollax.min.js"></script>
        <script src="/assets/user/js/google-map.js"></script>
        <script src="/assets/user/js/main.js"></script>
        <script src="/assets/js/pos.js"></script>
    </body>
</html>