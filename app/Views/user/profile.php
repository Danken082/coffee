<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body>
      <div class="container">
        <div class="main-body">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url("/mainhome"); ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex flex-column">
                        <div class="align-items-center text-center">
                        <h4><p class="mb-1 text-black"><?= session()->get('FirstName')?> <?= session()->get('LastName')?></p></h4><br>
                          <img src="<?= base_url()?>/assets/user/images/<?=session()->get('profile_img')?>" alt="pfp" class="rounded-circle" width="150"><br><br>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Last Name:</h6>
                            </div>
                            <div class="text"><?= session()->get('LastName')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>First Name:</h6>
                            </div>
                            <div class="text"><?= session()->get('FirstName')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Gender:</h6>
                            </div>
                            <div class="text"><?= session()->get('gender')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Email:</h6>
                            </div>
                            <div class="text"><?= session()->get('email')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Phone Number:</h6>
                            </div>
                            <div class="text"><?= session()->get('ContactNo')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Username:</h6>
                            </div>
                            <div class="text"><?= session()->get('Username')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Address:</h6>
                            </div>
                            <div class="text"><?= session()->get('address')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6>Birthdate:</h6>
                            </div>
                            <div class="text"><?= session()->get('birthdate')?></div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <a class="btn btn-info" href="<?= site_url("/editprofile/"); ?><?= session()->get('UserID')?>">Edit Profile</a>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                </div>
              </div>
            </div>
          </div>

          <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
          <script type="text/javascript"></script>

</body>
</html>