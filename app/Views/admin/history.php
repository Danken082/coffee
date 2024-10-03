<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin History</title>
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
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php include('sidebar.php'); ?>
            <div class="col-lg-10"> <br><br><br>
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                     
                            <h6 class="text-white text-capitalize ps-3">Order History</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form id="filterForm">
                            <div class="row justify-content-center mb-4">
                                <div class="col-lg-4">
                                    <label for="selectedDate" class="form-label">Date History:</label>
                                    <input type="date" id="selectedDate" name="selectedDate" class="form-control">
                                </div>
                                <div class="col-lg-2 d-flex align-items-end">
                                    <button type="button" id="filterButton" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Date</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Code</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Total Amount</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Amount Paid</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Change Amount</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="historyBody">
                                <?php if (empty($history)): ?>
        <tr><td colspan="6" class="text-center">No orders found for the selected date.</td></tr>
    <?php else: ?>
        <?= isset($responseHtml) && $responseHtml ? $responseHtml : '<tr><td colspan="6" class="text-center">No orders found for the selected date.</td></tr>'; ?>
    <?php endif; ?>            
                                </tbody>
                            </table>
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
`        <script>
        $(document).ready(function() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); 
    const day = String(today.getDate()).padStart(2, '0');
    const currentDate = `${year}-${month}-${day}`; 
    $('#selectedDate').val(currentDate); 


    fetchOrderHistory(currentDate);

    $('#filterButton').click(function() {
        const selectedDate = $('#selectedDate').val();
        if (!selectedDate) {
            alert('Please select a valid date');
            return;
        }
        fetchOrderHistory(selectedDate);
    });

    function fetchOrderHistory(selectedDate) {
        $.ajax({
            url: "<?= base_url('/filterDate') ?>",  // Ensure this route is correctly defined in your routes file
            type: "GET",
            data: { selectedDate: selectedDate },
            success: function(response) {
                if (response.trim() === '') {
                    $('#historyBody').html('<tr><td colspan="6" class="text-center">No orders found for the selected date.</td></tr>');
                } else {
                    $('#historyBody').html(response);
                }
                console.log(response);
            },
            error: function() {
                alert('An error occurred while fetching order history');
            }
        });
    }
});
        </script>

</body>
</html>
