<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crossroad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <link rel="stylesheet" href="/assets/css/preloader.css">
    <link rel="stylesheet" href="/assets/css/vieworder.css">
    <!-- Include Bootstrap CSS for modal -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Owl Carousel CSS if needed -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>
<body>
    <?php include('mainheader.php'); ?>

    <div id="preloader"></div>
    
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(/assets/images/bgimg.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">My Orders</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="order-list">
                        <?php if(session()->get('msg')): ?>
                            <div class="alert alert-warning"><?= htmlspecialchars(session()->get('msg'), ENT_QUOTES, 'UTF-8') ?></div>
                        <?php endif; ?>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Reservation Order Code</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($getCode as $Code): ?>
                                    <tr>
                                        <td class="price"><?= htmlspecialchars($Code['TableCode'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <h4><?= htmlspecialchars($Code['paymentStatus'], ENT_QUOTES, 'UTF-8') ?></h4>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($Code['paymentStatus'] === 'AcceptOrder'): ?>
                                                <a href="#" class="getAcceptReservation" 
                                                   data-toggle="modal" 
                                                   data-target="#acceptReservationModal" 
                                                   data-reservation='<?= htmlspecialchars(json_encode($Code, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP), ENT_QUOTES, 'UTF-8') ?>'>
                                                   View My Reservation
                                                </a>
                                            <?php else: ?>
                                                <a href="#" class="getPendingReservation" 
                                                   data-toggle="modal" 
                                                   data-target="#pendingReservationModal" 
                                                   data-reservation='<?= htmlspecialchars(json_encode($Code, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP), ENT_QUOTES, 'UTF-8') ?>'>
                                                   View This Pending Reservation
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="acceptReservationModal" tabindex="-1" role="dialog" aria-labelledby="acceptReservationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Accepted Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content populated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Pending Reservation -->
    <div class="modal fade" id="pendingReservationModal" tabindex="-1" role="dialog" aria-labelledby="pendingReservationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pending Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content populated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Include jQuery (full version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Owl Carousel JS if needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Include Preloader JS -->
    <script src="/assets/js/preloader.js"></script>
    <!-- Custom Script to Handle Modals -->
    <script>
        $(document).ready(function(){

			
            $('.getAcceptReservation').on('click', function(){
                var reservation = $(this).data('reservation');
                // Assuming reservation is already an object
                if (typeof reservation === 'string') {
                    try {
                        reservation = JSON.parse(reservation);
                    } catch (e) {
                        console.error('Invalid JSON:', e);
                        reservation = {};
                    }
                }
                // Populate the modal with reservation details
                $('#acceptReservationModal .modal-body').html(`
                    <p>Your reservation has been accepted. Here are the details:</p>
                    <p><strong>Table Code:</strong> ${reservation.TableCode}</p>
                    <p><strong>Appointment Date:</strong> ${reservation.appointmentDate}</p>
                    <p><strong>Total Price:</strong> $${reservation.totalPrice}</p>
                    <p><strong>Payment Status:</strong> ${reservation.paymentStatus}</p>
                    <p><strong>Message:</strong> ${reservation.Message || 'N/A'}</p>
                    <!-- Add more details as needed -->
                `);
            });

            // Handle Pending Reservation Modal
            $('.getPendingReservation').on('click', function(){
                var reservation = $(this).data('reservation');
                // Assuming reservation is already an object
                if (typeof reservation === 'string') {
                    try {
                        reservation = JSON.parse(reservation);
                    } catch (e) {
                        console.error('Invalid JSON:', e);
                        reservation = {};
                    }
                }
                // Populate the modal with reservation details
                $('#pendingReservationModal .modal-body').html(`
                    <p>Your reservation is still pending. Please wait for confirmation...</p>
                    <p><strong>Table Code:</strong> ${reservation.TableCode}</p>
                    <p><strong>Appointment Date:</strong> ${reservation.appointmentDate}</p>
                    <p><strong>Total Price:</strong> $${reservation.totalPrice}</p>
                    <p><strong>Payment Status:</strong> ${reservation.paymentStatus}</p>
                    <p><strong>Message:</strong> ${reservation.Message || 'N/A'}</p>
                    <form action="<?= base_url('cancelreservation/')?>${reservation.TableCode}" method="post">
                    <button type="submit" name="cancel" value="">Cancel order</button>
                    </form>
                `);
            });

            // Initialize Owl Carousel if used
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                items: 1
            });

            // Preloader functionality
            $('#preloader').fadeOut('slow', function() { $(this).remove(); });
        });
    </script>
</body>
</html>
