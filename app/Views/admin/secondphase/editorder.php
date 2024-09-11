<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order Payment</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Custom card design */
        .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
        }

        .card:hover {
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
        }

        /* Custom input design */
        .custom-input {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 8px 12px;
            font-size: 14px;
            width: 100%;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }

        .custom-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        /* Custom label styling */
        .custom-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* List styling */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li ul {
            padding-left: 20px;
        }

        li ul li {
            margin-bottom: 5px;
            font-size: 14px;
        }

        li ul li:first-child {
            font-weight: bold;
        }

        /* Button styling */
        .submit-btn {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include('sidebar.php'); ?>
        <div class="col-lg-9"><br><br><br>
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Order Payment List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <ul>
                            <form action="<?= base_url('editOrder' )?>" method="post">
                                <?php foreach ($barcode as $order): ?>
                                    <li>
                                        <ul>
                                            <li>Product Name: <?= $order['prod_name'] ?></li>
                                            <li>Order Quantity: <?= $order['quantity'] ?></li>
                                            <li>Product Size: <?= $order['size'] ?></li>

                                        </ul>
                                    </li>

                                    <!-- Custom styled input fields -->
                                    <div class="form-group px-3">
                                        <label for="quantity_<?= $order['order_id'] ?>" class="custom-label">Quantity:</label>
                                        <input type="text" id="quantity_<?= $order['order_id'] ?>" name="quantity" class="custom-input" value="<?= $order['quantity'] ?>">
                                    </div>

                                    <div class="form-group px-3">
                                        <label for="size_<?= $order['order_id'] ?>" class="custom-label">Size:</label>
                                        <input type="text" id="size_<?= $order['order_id'] ?>" name="size" class="custom-input" value="<?= $order['size'] ?>">

                                        <?php if($order['prod_lprice'] != 0.00):?>
                                        <select name="" id=""><option value="Regular">Regular</option>
                                            <option value="Large">Large</option>
                                        </select>

                                        <?php endif;?>
                                    </div>
                                <?php endforeach; ?>
                                
                                <!-- Submit Button -->
                                <div class="form-group px-3">
                                    <button type="submit" class="submit-btn">Submit Order</button>
                                </div>
                            </form>
                        </ul>
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
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('.view_data').click(function (e) {
                    e.preventDefault();

                    var barcode = $(this).closest('tr').find('.barcode').text();

                    $.ajax({
                        method: "POST",
                        url: "/viewOrders",
                        data: {
                            'click_view_btn': true,
                            'barcode': barcode,
                        },
                        success: function (response) {
                            console.log(response);
                            $('.view_order_data').html(response);
                            $('#vieworderdata').modal('show');
                        }
                    });
                });
            });
        </script>

</body>
</html>
