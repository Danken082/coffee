<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="485291892730-tfveu4ohrd1iq9k0u10c7v9rp8o8680v.apps.googleusercontent.com">
    <link rel="icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <title>Crossroads Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<style>
.google-login-btn {
    display: flex;
    justify-content: center; 
    align-items: center;
}

.google-login-btn img {
    width: 100%;
    max-width: 15rem;
    height: 4rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
</style>

<body>
    <div class="login-container">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="login-alert" id="flashMessage">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
        <div class="login-card">
            <h4>Log in to your Account</h4>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>
            <form action="<?= base_url("loginAuth"); ?>" role="form" method="POST">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-login">Login</button>
                    <div class="google-login-btn">
                        <?php echo $googleAuth; ?>
                    </div>
                </div>
                    <p class="register-link">Don't have an account yet? <a href="<?= site_url("register"); ?>">Register Now</a></p>
                    <p class="register-link">I can't remembet my password <a href="<?= site_url("/forgetpassword"); ?>">Forget Password</a></p>
                    <p class="home-link"><a href="<?= site_url("/"); ?>">Back to Home</a></p>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>  
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