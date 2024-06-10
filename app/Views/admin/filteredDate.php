<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin History</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
        }

        .sidebar a {
            color: white;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(87deg, #11cdef 0, #1171ef 100%);
            height:50px;

            color: white;
            border-bottom: none;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .card-object
        {
            margin:10px;
        }
        .export {
            box-shadow: 2px 2px #888888;
            background-color: #04AA6D;
        }

        .table th {
            border-top: none;
        }

        .table td {
            border-top: none;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .text-secondary {
            color: #6c757d !important;
        }
        
        .font-weight-bold {
            font-weight: 700 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="col-lg-10">
                <br><br><br>
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="d-flex justify-content-between card-object">
                            <h6 class="text-white text-capitalize ps-3">Order History</h6>
                            <form action="<?= base_url('exportReport/' .$toDate .'/'. $fromDate)?>" method="get">
                            <button class="btn btn-primary export" type="submit">Export </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Product Name</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Date</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Total Amount</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Amount Paid</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Change Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($report as $salesReport): ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs text-secondary mb-0"><?= $salesReport['prod_name'] ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-secondary mb-0"><?= (new DateTime($salesReport['order_date']))->format('F j, Y - H:i:s') ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= number_format($salesReport['total_amount'], 2) ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= number_format($salesReport['amount_paid'], 2) ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= number_format($salesReport['change_amount'], 2) ?></p>
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
    </div>
</body>

</html>
