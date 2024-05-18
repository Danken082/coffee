<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="/assets/images/coffeelogo.jpg">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        <link rel="stylesheet" href="/assets/css/register.css">
        <link rel="stylesheet" href="/assets/css/profile.css">
    </head>
    <body>
            
        <div class="register-card">
            <h4>Sign Up</h4>
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
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="ContactNo" id="ContactNo" class="form-control" required>
                    </div>
                    <?php if(isset($validation)):?>
                        <small class="text-danger"><?= $validation->getError('ContactNo') ?></small>
                    <?php endif;?>
                    <div class="input-group input-group-outline mb-3">
                        <select name="gender" id="" class="form-control "><option disabled selected>Gender</option><option value="Male">Male</option><option value="Female">Female</option></select>    
                        <?php if(isset($validation)):?>
                            <small class="text-danger"><?= $validation->getError('gender') ?></small>
                        <?php endif;?>
                    </div>
                    <label>Birthdate:</label>
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
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password </label>
                        <input type="password" name="Password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required>
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button>
                        <?php if(isset($validation)):?>
                            <small class="text-danger"><?= $validation->getError('Password') ?></small>
                        <?php endif;?>
                    </div>
                    <input type="hidden" name="UserRole" value="Customer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-register">Register</button>
                    </div>
                </form>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="login-link">Already have an account?<a href="<?= site_url("/login"); ?>"> Sign in</a></p>
            </div>
        </div>
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>

        <script>
			var inputs = document.getElementById("ContactNo");

        inputs.addEventListener("input", function(event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
       </script>
       <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
            });
        </script>



</body>
</html> 