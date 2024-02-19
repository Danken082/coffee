<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <title>Register</title>
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    </head>

    <body class="">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url('/assets/images/hotcofee2.jpg'); background-size:cover; ">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                                <div class="card card-plain">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign Up</h4>
                                        </div>
                                    </div><br>

                                    </div><br>
                                    <div class="card-body">
                                        <form action="<?= base_url("adminregister"); ?>" role="form" class="text-start" method="POST">
                                        <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="LastName" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('LastName') ?></small>
                                                <?php endif;?>
                                            </div>
                                            
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="FirstName" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('FirstName') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="Username" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('Username') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                            <?php if(isset($validation)):?>
                                                <small class="text-danger"><?= $validation->getError('email') ?></small>
                                            <?php endif;?>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="Password" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('Password') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Contact Number</label>
                                                <input type="text" name="ContactNo" class="form-control" required>
                                            </div>
                                            <?php if(isset($validation)):?>
                                                <small class="text-danger"><?= $validation->getError('ContactNo') ?></small>
                                            <?php endif;?>
                                            <div class="input-group input-group-outline mb-3">
                                                <select name="gender" id="" class="form-control "><option disabled selected>Gender</option><option value="male">Male</option><option value="female">Female</option></select>    
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('gender') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <label>Birthday:</label>
                                            <div class="input-group input-group-outline mb-3">
                                                <input type="date" name="birthdate" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('birthdate') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control" required>
                                                <?php if(isset($validation)):?>
                                                    <small class="text-danger"><?= $validation->getError('address') ?></small>
                                                <?php endif;?>
                                            </div>
                                            <input type="hidden" name="UserRole" value="customer">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Register</button>
                                            </div>
                                        </form>
                                    </div><br>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">Already have an account?<a href="<?= site_url(); ?>" class="text-primary text-gradient font-weight-bold">Sign in</a></p><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html> 