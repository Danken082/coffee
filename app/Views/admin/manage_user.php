<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Users</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
    </head>
    <body>
        
    <?php include('sidetopbar.php'); ?> 
        
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Manage Users</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Manage Users</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline"></div>
                    </div>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">List of Users</h6>
                            <a href="/adminmnguser" class="btn btn-success btn-sm me-3">Add User</a>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>


                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center ">Name</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Username</th>
                                    
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 text-center">Role</th>

                                        <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php foreach($mnguser as $user): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <p class="text-xs text-uppercase text-secondary mb-0"><?=$user['FirstName'], '  ', $user['LastName'] ?></p>
                                                </td>
                                            
                                                <td class="text-center">
                                                    <p class="text-xs text-secondary mb-0"><?=$user['Username'] ?></p>
                                                </td>
                                               
                                                <td class="text-center text-xs">
                                                    <!-- nakalagay dito kung anong role nung naglogin example admin, staff, manager or owner tingnan mo na lang to dun sa coffee na file kung paano ang pagkakagawa-->
                                                    <?=$user['UserRole'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="<?= base_url('/adminedituser/' .$user['UserID']) ?>" id='user_id'
                                                        class="text-success font-weight-bold text-xs me-2"
                                                        data-toggle="tooltip" data-original-title="Edit Coffee">
                                                        Edit
                                                    </a>||
                                                    <a href="<?= base_url('/deleteuser/' .$user['UserID']) ?>" class="text-danger font-weight-bold text-xs"
                                                        id='user_id' data-toggle="tooltip" data-original-title="Delete User">Delete</a>
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
                                                    

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        function confirmDelete(event, userId) {
            event.preventDefault(); // Prevent the default link behavior

            // Display the confirmation message
            if (confirm("Are you sure you want to delete this user?")) {
                // Create a hidden input field dynamically
                var hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "user_id";
                hiddenInput.value = userId;

                // Append the hidden input to the form
                var form = document.getElementById("deleteForm");
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

    </body>
</html>