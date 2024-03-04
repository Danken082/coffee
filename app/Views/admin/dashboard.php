<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="/assets/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<style>
        /* Add any additional styles as needed */
        body {
            display: flex;
            min-height: 100vh;
        }

        .container-fluid {
            flex: 1;
            padding-left: 250px; /* Adjust this value based on your sidebar width */
        }

        /* You might need to add more styles for proper alignment */
    </style>

<body>

    <?php include('sidebar.php'); ?>

    <div class="container-fluid">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline"></div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-10">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Day by Day Sales</h6>
                        <p class="text-sm">Sales</p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-10">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Day by Day Sales</h6>
                        <p class="text-sm">Sales</p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-10">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars4" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Top Products</h6>
                        <p class="text-sm">Best Sellers</p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-10">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars5" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Stocks</h6>
                        <p class="text-sm">See Stocks</p>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="/assets/js/chart.min.js"></script>
        <script src="/assets/js/jquery.min.js"></script>

        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/chartjs.min.js"></script>

        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
        <script type="text/javascript" src="<?php site_url()?>/assets/user/js/chart.js"></script>
        <script>
            google.charts.load('current', {'packages':['corechart', 'bar']});
			google.charts.setOnLoadCallback(drawLineChart);
			google.charts.setOnLoadCallback(drawBarChart);
            // Line Chart
			function drawLineChart() {
				var data = google.visualization.arrayToDataTable([
					['Day', 'Sales Count'],
						<?php 
							foreach ($products as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'Line chart product sell wise',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				};
				var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
				chart.draw(data, options);
			}
			
        </script>
    </body>
</html>