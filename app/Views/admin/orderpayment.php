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
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4">
    <div class="row">
        <?php include('sidebar.php'); ?>
        <div class="col-lg-10">
            <br><br><br>
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Order Payment List</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="orderTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Order Code</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bold opacity-7 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php if(!empty($order)): ?>
                                <?php foreach($order as $orP): ?>
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs text-primary mb-0 font-weight-bold barcode"><?= $orP['barcode']?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="<?= base_url('theorders/' .$orP['barcode'])?>" class="btn btn-info btn-sm view_data">View Order</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php else:?>
                                <p>No Data</p>
                                
                            <?php endif;?>
                            </tbody>

                        </table>
                    </div>

                    <nav>
                        <ul class="pagination" id="paginationControls"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            const rowsPerPage = 7;
            const rows = $('#orderTable tbody tr');
            const rowsCount = rows.length;
            const pageCount = Math.ceil(rowsCount / rowsPerPage);

            // Append pagination controls
            for (let i = 1; i <= pageCount; i++) {
                $('#paginationControls').append(`<li class="page-item"><a href="#" class="page-link">${i}</a></li>`);
            }

            // Show the first page of rows
            displayPage(1);

            // Click event for pagination controls
            $('#paginationControls').on('click', '.page-link', function (e) {
                e.preventDefault();
                const page = parseInt($(this).text());
                displayPage(page);
            });

            function displayPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                rows.hide();
                rows.slice(start, end).show();

                $('#paginationControls .page-item').removeClass('active');
                $(`#paginationControls .page-item:eq(${page - 1})`).addClass('active');
            }

          
        });
    </script>
</body>
</html>
