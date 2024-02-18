<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin History</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
    </head>
    <body>
        
    <?php include('sidetopbar.php'); ?>
        
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">History</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">History</h6>
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
                            <h6 class="text-white text-capitalize ps-3">Order History</h6>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order ID</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Date</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Total Amount</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Amount Paid</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Change Amount</th>

                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Products</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($history as $h): ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs text-secondary mb-0"><?=$h['order_id'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-secondary mb-0"><?=$h['order_date'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?=$h['total_amount'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?=$h['amount_paid'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?=$h['change_amount'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold">
                                                    <!-- ilalagay dito yung product name na galing sa table na product_tbl nakajoin sila -->
                                                </p>
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
        
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/chartjs.min.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>

    </body>
</html>