<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Order Payment</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
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
            margin-bottom: 10px; /* Adjust spacing between list items */
        }

        li ul {
            list-style-type: none;
            padding-left: 20px; /* Adjust the indentation of nested lists */
        }

        li ul li {
            margin-bottom: 5px; /* Adjust spacing between nested list items */
            font-size: 14px; /* Adjust font size */
        }

        li ul li:first-child {
            font-weight: bold; /* Make the first item in nested list bold */
        }

    </style>
    <body>
    <div class="container-fluid mt-4">
        <div class="row">
        <?php include('sidebar.php'); ?>
            <div class="col-lg-9"> <br><br><br>
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
                            <li><?= $single['FirstName'] ?></li>
                            <input type="hidden" name="FirstName" value="<?= $single['FirstName']?>">
                            <li><?= $single['ContactNo'] ?></li>
                            <input type="hidden" name="ContatNo" value="<?= $single['ContactNo']?>">
                            <li><?= $single['address'] ?></li>
                            <input type="hidden" name="address" value="<?= $single['address']?>">
                            <li><?= $single['barcode'] ?></li>
                            <input type="hidden" name="barcode" value="<?= $single['barcode']?>">
                            <li>Order ni <?= $single['FirstName'] ?></li>
                            <?php foreach ($barcode as $order): ?>
                                <li>
                                    <ul>
                                        <li>Product Name: <?= $order['prod_name'] ?></li>
                                        <li>Order Quantity: <?= $order['quantity'] ?></li>
                                        <li>Product Size: <?= $order['size'] ?></li>
                                        <li>Total: <?= $order['total'] ?></li>
                                    </ul>
                                </li>
                                <input type="hidden" name="orderID[]" value="<?= $order['orderID']?>">
                                <input type="hidden" name="prod_name[]" value="<?= $order['prod_name']?>">
                                <input type="hidden" name="quantity[]" value="<?= $order['quantity']?>">
                                <input type="hidden" name="size[]" value="<?= $order['size']?>">
                                <input type="hidden" name="total[]" value="<?= $order['total']?>">
                            <?php endforeach; ?>
                            <li>Buong total: <?= $total['sum'] ?></li>
                            <input type="hidden" name = "sum" value="<?= $total['sum']?>">
                            <button type="submit">Accept</button>
                            
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
             $(document).ready(function (){
                $('.view_data').click(function (e){
                    e.preventDefault();
                   

                   var barcode = $(this).closest('tr').find('.barcode').text();
                        
                   $.ajax({
                    method: "POST",
                    url:"/viewOrders",
                    data:{
                        'click_view_btn': true,
                        'barcode': barcode,
                    },
                    success: function(response)
                    {
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
