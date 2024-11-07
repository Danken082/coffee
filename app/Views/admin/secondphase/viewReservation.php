<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

            .btn-action {
                padding: 8px 16px;
                font-size: 14px;
                border-radius: 5px;
                margin-right: 10px;
                transition: background-color 0.3s ease;
            }

            .btn-accept {
                background-color: #28a745;
                color: white;
            }

            .btn-accept:hover {
                background-color: #218838;
            }

            .btn-decline {
                background-color: #dc3545;
                color: white;
            }

            .btn-decline:hover {
                background-color: #c82333;
            }
            .image-container {
                max-width: 20rem; /* Adjust based on desired image width */
    
}

.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem; /* Optional: rounds image corners */

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
                                <form action="<?= base_url('AcceptReservation')?>" method="post">
                                    
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Customer Name: <?= htmlspecialchars($rsvData['FirstName'] . ' ' . $rsvData['LastName']) ?></h6>
                                        <p>Customer Message: <?= nl2br(htmlspecialchars($rsvData['Message'])) ?></p>
                                        <p>Count Of Persons: <?= (int)$rsvData['HCustomer'] ?> Customers</p>
                                        <?php foreach($prodData as $prod): ?>
                                            <input type="hidden" name="reservationID[]" value="<?= htmlspecialchars($prod['TableID']) ?>">
                                            <h6>Product Name: <?= htmlspecialchars($prod['prod_name']) ?></h6>
                                            <p>Order Quantity: <?= (int)$prod['quantity'] ?></p>
                                            <p>Product Size: <?= htmlspecialchars($prod['size']) ?></p>
                                            <p>Product Price: ₱<?= number_format((float)$prod['totalPrice'], 2) ?></p>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Image Section on the Right Side -->
                                    <div class="image-container">
                                        <img src="<?= base_url('assets/user/Epayment/') . $prodpic['Gpayment']?>" alt="PaymentCheck" class="img-fluid">
                                    </div>
                                </li>

                                    <li class="list-group-item">
                                        <?php if($rsvData['paymentStatus'] === 'ForObservation'): ?>
                                            <button type="submit" name="action" value="AcceptedOrder" class="btn-action btn-accept">Accept Reservation</button>
                                            <button type="submit" name="action" value="DeclineOrder" class="btn-action btn-decline">Decline Reservation</button>
                                        <?php elseif($rsvData['paymentStatus'] === 'AcceptedOrder'): ?>
                                            <button type="button" class="btn-action btn-accept" disabled>This Reservation is Accepted</button>
                                        <?php elseif($rsvData['paymentStatus'] === 'DeclineOrder'): ?>
                                            <button type="button" class="btn-action btn-decline" disabled> This Reservation is Declined</button>
                                        <?php else: ?>
                                            <p>Status Unknown</p>
                                        <?php endif; ?>
                                    </li>

                                    <!-- Total Price -->
                                    <li class="list-group-item total-price">
                                        Total Price: ₱<?= number_format((float)$sumTotalOrder['totalPrice'], 2) ?>
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
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        </div>
    </body>
</html>
