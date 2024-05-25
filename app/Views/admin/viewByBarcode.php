<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Order Payment</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="/assets/css/viewbybarcode.css" rel="stylesheet" />
    </head>
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
                                    <li>Customer Name: <?= $single['FirstName'] ?></li>
                                    <li>Contact Number: <?= $single['ContactNo'] ?></li>
                                    <li>Address: <?= $single['address'] ?></li>
                                    <li>Barcode: <?= $single['barcode'] ?></li><br>
                                    <li>Order by <?= $single['FirstName'] ?></li>
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
                                    <?php endforeach; ?>
                                    <li>Total Price: <?= $total['sum'] ?></li>
                                    <button type="submit">Accept</button>
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
