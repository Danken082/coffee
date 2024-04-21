<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <title>Add User</title>
    </head>
    <body>
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Add User</h6>
                    </div>
                </div>

                <div class="card-body px-4 pb-3">
                    <form action="<?= base_url('adminadduser')?>" class="row g-3" method="POST">
                        <div class="input-group input-group-outline my-3">
                            <label for="lastname" class="form-label"></label>
                            <input type="text" class="form-control" id="lastname" name="LastName" placeholder="LastName" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="firstname" class="form-label"></label>
                            <input type="text" class="form-control" id="firstname" name="FirstName" placeholder="FirstName" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="username" class="form-label"></label>
                            <input type="text" class="form-control" id="username" name="Username" placeholder="Username" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <label for="birthdate" class="form-label">Birthdate:</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="date" class="form-control" id="birthdate" name="birthdate"required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="contact number" class="form-label"></label>
                            <input type="text" class="form-control" id="contact number" name="ContactNo" placeholder="ContactNo" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="address" class="form-label"></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label for="password" class="form-label"></label>
                            <input type="text" class="form-control" id="password" name="Password" placeholder="Password" required>
                        </div>
                        <select name="UserRole">
                            <option>Admin</option>
                            <option>Staff</option>
                        </select>
                        <br><br>
                        <div class="input-group input-group-outline my-3">
                            <button type="submit" class="btn btn-success">Add user</button>
                        </div>
                        <div><a href="<?= base_url('/adminmanage_user')?>" class="btn btn-info">BACK</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>