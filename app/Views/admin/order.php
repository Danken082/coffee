<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container-custom {
            max-width: 1200px; /* Adjust the maximum width as needed */
            width: 100%;
            
        }
    </style>
</head>
<body>

                

<div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
        
        <main id="view-panel" class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            </nav>

            <div class="container">
               <br>


                <div class="d-flex justify-content-center">
    <div class="container-custom">
        <div class="container-fluid">
            <div class="row">
                
                <main id="view-panel"  class="col-lg-9">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                    </nav>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                                        <div class="container-fluid py-1 px-3">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                                                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order</li>
                                                </ol>
                                                <h6 class="font-weight-bolder mb-0">Order</h6>
                                            </nav>
                                            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                                    <div class="input-group input-group-outline"></div>
                                                </div>
                                                </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav><br>
                                    
                                    <div class="container-fluid py-4">
                                        <div class="col-12">
                                            <form class="row g-3" action="../connections/save_generate.php" method="POST" id="receipt-form" onsubmit="printAndSubmit(event)">
                                                <div class="card my-1">
                                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3 d-flex align-items-center">
                                                            <h6 class="text-white text-capitalize ps-3">Receipt</h6>
                                                            <button type="button" class="btn btn-danger btn-sm ms-auto" style="margin-right: 20px;" onclick="confirmVoid()">Void</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class=" card-body px-4 pb-3" id="receipt-table">
                                                        <h5>Receipt Details</h5>
                                                            <!-- Query to get the last transaction number -->
                                                            <!-- Extract the last transaction number and increment it by 1 -->
                                                            <!-- Store the new transaction number in a session variable -->
                                                            <!-- Echo the new transaction number -->
                                                        <p>Cashier:
                                                            <!-- username ng cashier or staff ata -->
                                                        </p>
                                                        <p>Date:
                                                            <!-- date kung kelan umorder -->
                                                        </p>
                                                        <table class="table">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                            <tbody>
                                                                <!-- Retrieve the order details from the Orders and Products tables -->
                                                                <!--Display the order details in the table -->
                                                                <!-- Calculate the total amount -->
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="3">Total</td>
                                                                    <td id="total-amount">₱
                                                                        <!-- nakalagay dito yung mga total amount -->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">Amount Paid</td>
                                                                    <td>
                                                                        <!-- nakalagay dito yung amount paid -->
                                                                        <input type="number" class="form-control" placeholder="Input payment amount here">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan=" 3">Change</td>
                                                                    <td id="change-amount"></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="input-group input-group-outline my-3 border-primary">
                                                    <button type="submit" class="btn btn-primary" id="save-generate-btn">Save and Generate</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
