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
    </style>
    <body>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="modal fade" id="vieworderdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="view_order_data"></div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-bs-dismiss="modal">Close</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10"> <br><br><br>

                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Pending Reservation</h6>
                            <div class="d-flex justify-content-between">
                    <select id="paymentStatusFilter" class="form-control w-25">
                        <option value="all">All</option>
                        <option value="AcceptedOrder">Accepted order</option>
                        <option value="ForObservation">OnObservation</option>
                    </select>
                </div>
                        </div>
                        
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Reservation Date</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Reservation Code</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Reservation Date</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Payment Status</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($res as $res): ?>
                                        <tr class="reservation-row" data-status="<?= $res['paymentStatus'] ?>">
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold barcode"><?= date('F j, Y h:i A', strtotime($res['reservationDate'])); ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold barcode"><?= $res['TableCode']?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold barcode"><?=date('F j, Y h:i A', strtotime($res['appointmentDate'])); ?></p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $res['paymentStatus'] ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="<?= base_url('viewReservation/' .$res['TableCode'])?>" class="btn btn-info btn-sm">View Reservation</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
                    $('#paymentStatusFilter').change(function () {
                        var selectedStatus = $(this).val();
                        $('.reservation-row').each(function () {
                            var rowStatus = $(this).data('status');
                            if (selectedStatus === "all" || rowStatus === selectedStatus) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    });

                    $('.view_data').click(function (e){
                        e.preventDefault();
                        var barcode = $(this).closest('tr').find('.barcode').text();
                        $.ajax({
                            method: "POST",
                            url: "/viewOrders",
                            data: {
                                'click_view_btn': true,
                                'barcode': barcode,
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
    </body>
</html>
