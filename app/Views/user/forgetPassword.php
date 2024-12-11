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

</style>
<body>
    <div class="login-container">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="login-alert" id="flashMessage">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
        <div class="login-card">
            <h4>Forgot Your Password?</h4>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>  
            <form action="<?= base_url("forgetpasswordAuth"); ?>" role="form" method="POST">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
             
            <div class="form-group">
                    <button type="submit" class="btn btn-login">Search</button>
                    <p class="register-link">Remember your Password? <a href="<?= site_url("/login"); ?>">Login</a></p>
                    <p class="home-link"><a href="<?= site_url("/"); ?>">Back to Home</a></p>
            </form>
        </div>
    </div>
    
 
</body>
</html>