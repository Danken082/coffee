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
<body>
    <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to your Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url("loginAuth"); ?>" method="POST">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="loginEmail" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="loginPassword" required>
                    <button type="button" id="toggleLoginPassword" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <?php //echo $googleAuth; ?>
        </form>
      </div>
    </div>
  </div>
</div>


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
