<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <link rel="stylesheet" href="/assets/user/css/bootstrap/bootstrap.min1.css"/>
    <link href="https://fontawesome.com/"/>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body>
      <div class="container">
        <div class="main-body">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url("/adminhome"); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= site_url("/adminprofile"); ?>">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
          </nav>
          <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-3">
                <h2 class="row justify-content-center">Edit Profile</h2>
                <form action="<?= base_url('/updateadminprofile/'. $eprof['UserID'])?>" class="row g-3" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="upload">
                        <img src="/assets/user/images/<?php echo $eprof['profile_img']?>" alt="pfp" id="profile" class="rounded-circle" width="150">
                        <div class="rightRound" id="upload">
                          <input type="file" name="profile_img" id="profile_img" accept=".jpg, .jpeg, .png">
                          <i class="fa fa-solid fa-camera"></i>
                        </div>
                        <div class="leftRound">
                          <button id="remove">
                            <i class="fa fa-solid fa-trash"></i>
                        </button>
                        </div>
                        <div class="rightRound" id="confirm" style="display: none;">
                          <input type="submit" name="" value="">
                          <i class="fa fa-check"></i>
                        </div>
                        <div class="leftRound" id="cancel" style="display: none;">
                          <i class="fa fa-times"></i>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Last Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="lastname" name="LastName" value="<?= session()->get('LastName') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>First Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="firstname" name="FirstName" value="<?= session()->get('FirstName') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php echo (session()->get('gender') == 'Male') ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="male">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php echo (session()->get('gender') == 'Female') ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="female">Female</label>
                          </div>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="email" name="email" value="<?= session()->get('email') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Phone Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="contact number" name="ContactNo" value="<?= session()->get('ContactNo') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="username" name="Username" value="<?= session()->get('Username') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="text" class="form-control" id="address" name="address" value="<?= session()->get('address') ?>"></div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6>Birthdate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary"><input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= session()->get('birthdate') ?>"></div>
                      </div><br>
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
      <script type="text/javascript">
        document.getElementById("profile_img").onchange = function() {
          document.getElementById("profile").src = URL.createObjectURL(profile_img.files[0]);

          document.getElementById("cancel").style.display = "block";
          document.getElementById("confirm").style.display = "block";
          document.getElementById("remove").style.display = "block";

          document.getElementById("upload").style.display = "none";
        }

        var userImage = document.getElementById('profile').src;
        document.getElementById("cancel").onclick = function(){;
          document.getElementById("profile").src = userImage;

          document.getElementById("cancel").style.display = "none";
          document.getElementById("confirm").style.display = "none";

          document.getElementById("upload").style.display = "block";
        }

          document.getElementById("remove").onclick = function() {
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 500) {
                      document.getElementById("profile").src = "/assets/user/images/profile.png";

                      document.getElementById("cancel").style.display = "none";
                      document.getElementById("confirm").style.display = "none";

                      document.getElementById("upload").style.display = "block";
                  } else {
                      console.error('Error:', xhr.responseText);
                  }
              }
          };
          xhr.open('GET', '<?= base_url('/removeprofile/'. $eprof['UserID'])?>');
          xhr.send();
      };
      </script>
</body>
</html>