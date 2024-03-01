<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Order Payment</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link href="/assets/css/table.css" rel="stylesheet" />
    </head>
    <body>
        
    <?php include('sidetopbar.php'); ?>

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order Payment</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Order Payment</h6>
                </nav>
            </div>
        </nav><br>

        <div class="container">
            <div class="col-12">
                <div class="card my-4">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h4 class="text-white text-capitalize ps-3">Order Payment List</h4>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Customer Name</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Name</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Price</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Product Status</th>
                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Payment Status</th>   
                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Order Type</th>
                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Order Code</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($order as $orP): ?>
                        <tr>

                        <td class="text-center">
                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['FirstName'];?> <?= $orP['LastName'];?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['prod_name'];?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['total'];?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['orderStatus'];?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['paymentStatus'];?></p>
                                </td>
                                     <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['orderType'];?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs text-primary mb-0 font-weight-bold"></p>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="<?= base_url('/aOrder/')?>" method="post">
                                    <input type="hidden" name="accept" value="<?= $orP['orderID']?>">
                                    <button type="submit"   class="text-info font-weight-bold text-xs me-2"
                                        data-toggle="tooltip" data-original-title="Edit Coffee">Accept</button>
                                    </form>
                                    <a href="" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Decline</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
