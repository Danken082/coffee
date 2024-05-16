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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/adminhistory')?>" style="background-color: transparent; color:white; font-size: 1.5em;">> Back to Order History</a></li>
                    </ol>
                    <div class="card">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order ID</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Date</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Products</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Size</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Price</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Total Price</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Amount Paid</th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Change Amount</th>
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
                                                <p class="text-xs text-primary mb-0 font-weight-bold"></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"></p>
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
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><br><br>
                    <h4>Customer Name: </h4>
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