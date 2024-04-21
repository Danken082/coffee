<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe POS System</title>
    <link rel="stylesheet" href="/assets/css/pos.css">
</head>
<body>
    
<div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
            <div class="container">
                <h1>Cafe POS System</h1>
                <div class="menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><span class="item-name">Coffee</span> - $2.50</li>
                        <li><span class="item-name">Tea</span> - $2.00</li>
                        <!-- Add more items here -->
                    </ul>
                </div>
                <div class="order">
                    <h2>Order</h2>
                    <ul id="order-list">
                        <!-- Display ordered items here -->
                    </ul>
                    <h3>Total: $<span id="total">0.00</span></h3>
                    <button onclick="checkout()">Checkout</button>
                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Status</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </th>
                                <th> Client Name </th>
                                <th> Order No </th>
                                <th> Product Cost </th>
                                <th> Project </th>
                                <th> Payment Mode </th>
                                <th> Start Date </th>
                                <th> Payment Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="assets/images/faces/face1.jpg" alt="image" />
                                <span class="pl-2">Henry Klein</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Dashboard </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="assets/images/faces/face2.jpg" alt="image" />
                                <span class="pl-2">Estella Bryan</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Cash on delivered </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-warning">Pending</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="assets/images/faces/face5.jpg" alt="image" />
                                <span class="pl-2">Lucy Abbott</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> App design </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-danger">Rejected</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="assets/images/faces/face3.jpg" alt="image" />
                                <span class="pl-2">Peter Gill</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Development </td>
                                <td> Online Payment </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                                </td>
                                <td>
                                <img src="assets/images/faces/face4.jpg" alt="image" />
                                <span class="pl-2">Sallie Reyes</span>
                                </td>
                                <td> 02312 </td>
                                <td> $14,500 </td>
                                <td> Website </td>
                                <td> Credit card </td>
                                <td> 04 Dec 2019 </td>
                                <td>
                                <div class="badge badge-outline-success">Approved</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/assets/js/script.js"></script>
</body>
</html>
