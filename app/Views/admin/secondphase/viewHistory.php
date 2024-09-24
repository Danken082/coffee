<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Order Payment</title>
        <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style>
    .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        padding: 20px;
        background-color: #f8f9fa; /* Light gray background */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        color: #333; /* Set default text color to dark gray */
    }

    .card-body {
        color: #333; /* Ensures text is dark inside the card body */
    }

    .list-group-item h6 {
        color: #333; /* Set dark color for headers */
    }


            .button-back {
                margin-top: 10px;
            }

            .button-back a {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .button-back a:hover {
                background-color: #0056b3;
            }

            .list-group-item {
                padding: 10px 15px;
                background-color: #fff;
                border-radius: 0.5rem;
                margin-bottom: 10px;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            }

            .list-group-item h6 {
                font-weight: bold;
            }

            .total-price {
                font-size: 1.2rem;
                font-weight: bold;
                color: #28a745;
                margin-top: 20px;
            }

            .edit-order-btn {
                padding: 5px 10px;
                font-size: 14px;
                background-color: #17a2b8;
                color: white;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .edit-order-btn:hover {
                background-color: #138496;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid mt-4">
            <div class="row">
                <!-- Sidebar -->
                <?php include('sidebar.php'); ?>

                <div class="col-lg-9">
                    <br><br><br>
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Order Payment List</h6>
                                <div class="button-back">
                                    <a href="javascript:history.back()">Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-4 pb-2">
                            <ul class="list-group">
                                <form action="<?= base_url('AcceptthisOrder')?>" method="post">
                                    <?php foreach ($barcode as $order): ?>
                                        <li class="list-group-item">
                                            <h6>Product Name: <?= $order['prod_name'] ?></h6>
                                            <p>Order Quantity: <?= $order['quantity'] ?></p>
                                            <p>Product Size: <?= $order['size'] ?></p>
                                            <p>Product Price: ₱<?= number_format($order['total_amount'], 2) ?></p>
                                            <a href="/editOrder/<?= $order['order_id'] ?>" class="edit-order-btn">Edit Order</a>
                                        </li>
                                    <?php endforeach; ?>

                                    <!-- Total Price -->
                                    <li class="list-group-item total-price">
                                        Total Price: ₱<?= number_format($SumTotal['SumTotalPrice'], 2) ?>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripts -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

            <!-- AJAX Script for viewing orders -->
            <script>
                $(document).ready(function() {
                    $('.view_data').click(function(e) {
                        e.preventDefault();

                        var barcode = $(this).closest('tr').find('.barcode').text();

                        $.ajax({
                            method: "POST",
                            url: "/viewOrders",
                            data: {
                                'click_view_btn': true,
                                'barcode': barcode
                            },
                            success: function(response) {
                                console.log(response);
                                $('.view_order_data').html(response);
                                $('#vieworderdata').modal('show');
                            }
                        });
                    });
                });
            </script>
        </div>
    </body>
</html>
