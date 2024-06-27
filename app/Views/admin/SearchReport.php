<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="icon" type="image/png" href="/assets/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .cover{
            margin-top:50px;
            border-radius: 1rem;
        }
        .card {
            border: none;
            border-radius: 190rem;
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
        
        <div class="col-lg-10 cover">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="cover bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">&nbsp; Filter Report</h6>
                    </div>
                </div>
                <div class="card-body px-4 py-3 cover-card">
    <form action="<?= base_url('filteredreport')?>" method="get" class="px-3">
        <div class="form-group row mb-3">
            <label for="ToDate" class="col-sm-3 col-form-label">To Date:</label>
            <div class="col-sm-9">
                <input type="date" name="toDate" class="form-control">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="FromDate" class="col-sm-3 col-form-label">From Date:</label>
            <div class="col-sm-9">
                
                <input type="date" name="fromDate" class="form-control">
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-lg px-5">Search</button>
        </div>
    </form>
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

</body>
</html>
