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
        }

        .card:hover {
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
        }

        /* Custom CSS for list items */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li ul {
            list-style-type: none;
            padding-left: 20px;
        }

        li ul li {
            margin-bottom: 5px;
            font-size: 14px;
        }

        li ul li:first-child {
            font-weight: bold;
        }

        /* Flexbox container for text on the left and image on the right */
        .order-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .order-details .text-container {
            max-width: 70%;
            margin-right: 20px; /* Space between text and image */
        }

        .order-details .payment-image-container {
            text-align: center;
            max-width: 25%;
        }

        .order-details .payment-image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-height: 300px;
        }

        /* Button styling */
        .accept-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .accept-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="col-lg-9"> 
                <br><br><br>
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Order Payment List</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <ul>
                                <form action="<?= base_url('AcceptthisOrder')?>" method="post">
                                    <div class="order-details">
                                        <div class="text-container">
                                            <li><strong>Customer Name:</strong> <?= $single['FirstName'] ?></li>
                                            <input type="hidden" name="FirstName" value="<?= $single['FirstName']?>">
                                            
                                            <li><strong>Contact Number:</strong> <?= $single['ContactNo'] ?></li>
                                            <input type="hidden" name="ContatNo" value="<?= $single['ContactNo']?>">
                                            
                                            <li><strong>Address:</strong> <?= $single['address'] ?></li>
                                            <input type="hidden" name="address" value="<?= $single['address']?>">
                                            
                                            <li><strong>Order Code:</strong> <?= $single['barcode'] ?></li>
                                            
                                            <li><strong>Order Details:</strong></li>
                                            
                                            <?php foreach ($barcode as $order): ?>
                                                <li>
                                                    <ul>
                                                        <li><strong>Product Name:</strong> <?= $order['prod_name'] ?></li>
                                                        <li><strong>Order Quantity:</strong> <?= $order['quantity'] ?></li>
                                                        <li><strong>Product Size:</strong> <?= $order['size'] ?></li>
                                                        <li><strong>Total:</strong> <?= $order['total'] ?></li>
                                                    </ul>
                                                </li>
                                                <input type="hidden" name="orderID[]" value="<?= $order['orderID']?>">
                                                <input type="hidden" name="prodID[]" value="<?= $order['ProductID']?>">
                                                <input type="hidden" name="CustID[]" value="<?= $order['CustomerID']?>">
                                                <input type="hidden" name="prod_name[]" value="<?= $order['prod_name']?>">
                                                <input type="hidden" name="quantity[]" value="<?= $order['quantity']?>">
                                                <input type="hidden" name="size[]" value="<?= $order['size']?>">
                                                <input type="hidden" name="total[]" value="<?= $order['total']?>">
                                                <input type="hidden" name="barcode[]" value="<?= $single['barcode']?>">
                                            <?php endforeach; ?>

                                            <li><strong>Total Amount:</strong> <?= $total['sum'] ?></li>
                                            <input type="hidden" name="sum" value="<?= $total['sum']?>">
                                            <?php if($stat['orderStatus'] === 'CancelOrder'):?>
                                                <li><strong>Reason Cancellation: </strong><?= $stat['reason']?></li>
                                            <?php endif;?>
                                        </div>

                                        <div class="payment-image-container">
                                            <?php if($Image['ImagePayment'] != Null): ?>
                                                <img src="<?= base_url('assets/user/Epayment/' . $Image['ImagePayment'])?>" alt="Online Payment">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <?php if($stat['orderStatus'] === 'onProcess'):?>
                                        <button type="submit" class="accept-btn">Accept</button>
                                        <?php elseif($stat['orderStatus'] === 'CancelOrder'):?>
                                            <button type="submit" style="background-color:grey;" disabled class="accept-btn">THIS IS A CANCELLED ORDER</button>
                                        <?php endif;?>

                                    </div>
                                </form>
                            </ul>
                        </div>
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
