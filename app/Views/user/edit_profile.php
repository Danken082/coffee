<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="/assets/user/css/bootstrap/bootstrap.min1.css"/>
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body>
      <div class="container">
        <div class="main-body">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url("user/mainhome"); ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
          </nav>
          <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                <form action="<?= base_url('/user/updateprofile/'. $eprof['UserID'])?>" class="row g-3" method="POST">
                    <div class="card-body">
                      <div class="d-flex flex-column">
                        <div class="align-items-center text-center">
                        <h4><p class="mb-1 text-black"><?= session()->get('FirstName')?> <?= session()->get('LastName')?></p></h4><br>
                          <img src="<?= base_url()?>assets/user/images/<?=session()->get('profile_img')?>" alt="pfp" class="rounded-circle" width="150" value="<?=$eprof['profile_img'] ?>"><br><br>
                          <button id="editProfileBtn" class="btn btn-primary" type="button">Edit Profile</button><br><br>
                          <input type="file" id="fileInput" name="profile_img" style="display: none;">
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Last Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="lastname" name="LastName" value="<?=$eprof['LastName'] ?>"></div>
                        </div>
                        <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="firstname" name="FirstName" value="<?=$eprof['FirstName'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="gender" name="gender" value="<?=$eprof['gender'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="email" name="email" value="<?=$eprof['email'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Phone Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="contact number" name="ContactNo" value="<?=$eprof['ContactNo'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="username" name="Username" value="<?=$eprof['Username'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="address" name="address" value="<?=$eprof['address'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Birthdate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="date" class="form-control" id="birthdate" name="birthdate" value="<?=$eprof['birthdate'] ?>"></div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="submit" class="btn-info">Save Changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
    </script>

</body>
</html>