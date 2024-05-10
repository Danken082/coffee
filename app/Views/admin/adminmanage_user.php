<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin History</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
        }

        .card:hover {
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <?php include('sidebar.php') ?>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                    <!-- ... Your navigation content ... -->
                </nav>

                <div class="row">
                  
                    <div class="col-12">
                        <div class="card my-4">  <br><br><br>
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                                    <h6 class="text-white text-capitalize ps-3">Lists of Admin</h6>
                                    <a href="/adminmnguser" class="btn btn-success btn-sm me-3">Add User</a>
                                </div>
                            </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center ">Full Name</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Email</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Contact No</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Address</th>
                                    
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Role</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Date Created</th>

                                        <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php foreach($admin as $a): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <p class="text-xs text-uppercase text-secondary mb-0"><?=$a['FirstName'], '  ', $a['LastName'] ?></p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs text-secondary mb-0"><?=$a['email'] ?></p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs text-secondary mb-0"><?=$a['ContactNo'] ?></p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs text-secondary mb-0"><?=$a['address'] ?></p>
                                                </td>
                                               
                                                <td class="text-center text-xs">
                                                    <?=$a['UserRole'] ?>
                                                </td>

                                                <td class="text-center">
                                                        <p class="text-xs text-secondary mb-0"><?=$a['CreatedAt'] ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="<?= base_url('/adminedituser/' .$a['UserID']) ?>" id='UserID' class="text-success font-weight-bold text-xs me-2" data-toggle="tooltip" data-original-title="Edit Coffee">Edit</a>||
                                                    <a href="<?= base_url('/deleteuser/' .$a['UserID']) ?>" onclick="return confirm('Are you sure you want to remove this user?')" class="text-danger font-weight-bold text-xs" id='UserID' data-toggle="tooltip" data-original-title="Delete User">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
                                                    

    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/chartjs.min.js"></script>

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