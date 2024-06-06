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
        body {
            display: flex;
            min-height: 100vh;
        }

        .container-fluid {
            flex: 1;
            padding-left: 250px;
        }
        .month
        {   
            width: 21rem;
        }
        .yearly
        {   
            width: 23rem;
        }
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
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">

                                    <div id="dailySalesChart" style="height: 400px; width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0">Day by Day Sales by </h6>
                                <?php foreach($byMonth as $theMonth):?>
                                <input type="text" disabled name="MonthlySales[]" class="month" value="Total Sales In Month of <?= date('F', mktime(0, 0, 0, $month, 1))?> : ₱ <?= $theMonth->total_sales?>">
                            <?php endforeach;?>
                            <form action="<?= base_url('trialForexpense')?>" method="post">

                            <input type="hidden" name="month"value="<?=  date('F', mktime(0, 0, 0, $month, 1))?>">
                            <input type="hidden" name="year"value="<?= $year?>">
                            <?php foreach($products as $prod):?>
                                <input type="hidden" name="days[]" value="<?= $prod['day']?>">
                                <input type="hidden" name="total_sales[]" value="<?= $prod['sell']?>">

                            <?php endforeach;?>

                            <?php foreach($byMonth as $theMonth):?>
                                <input type="hidden" name="MonthlySales[]" value="<?= $theMonth->total_sales?>">
                            <?php endforeach;?>
                            <input type="submit" value="View to Export">
                            </form>
                            <form id="filterForm">     
                            <select name="month" id="month" class="form-control" style="color: white;">
                                    <?php   $currentMonth = date('n'); for($m=1; $m <= 12; $m++):?>
                                        <option value="<?= $m ?>" <?= ($m == $month) ? 'selected' : '' ?>><?= date('F', mktime(0, 0, 0, $m, 1))?></option>
                                        <?php endfor;?>
                            </select>
                            <select name="year" id="year" class="form-control" style="color: white;">
                            <?php  $currentYear = date('Y'); for($m=2015; $m <= $currentYear; $m++):?>
                                        <option value="<?= $m ?>" <?= ($m == $year) ? 'selected' : '' ?>><?= $m?></option>
                                        <?php endfor;?>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt-4 mb-10">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="monthlySalesChart" style="height: 400px; width: 100%"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0">Monthly Sales</h6>
                            <?php foreach($totalsalesinyear as $totalsales):?>
                                <input type="text" class="yearly"disabled  value="Total Sales In The Year <?= $monthlySalesReports?>: ₱ <?= $totalsales['total_amount']?>">
                            <?php endforeach;?>
                            <form action="<?= base_url("/ViewMonthlyReport")?>" method="post">
                                <?php foreach($salesByMonth as $monthly):?>
                                    <input type="hidden" name="MonthlyTotalsales[]" value="<?= $monthly->total_sales?>">
                                    <input type="hidden" name="MonthName[]" value="<?= $monthly->month?>">
                                <?php endforeach;?>
                                <?php foreach($totalsalesinyear as $totalsales):?>
                                <input type="hidden" class="yearly" name="totalInYears[]" value="<?= $totalsales['total_amount']?>">
                            <?php endforeach;?>
                            <input type="hidden" name="year" value="<?= $monthlySalesReports ?>">
                                <input type="submit" value="View Report">
                            </form> 
                            <form id="filterMonth">
                            <select name="monthlySalesReports" id="monthlySalesReports" class="form-control" style="color: white;">
                            <?php  $currentYear = date('Y'); for($m=2015; $m <= $currentYear; $m++):?>
                                        <option value="<?= $m ?>" <?= ($m == $monthlySalesReports) ? 'selected' : '' ?>><?= $m?></option>
                                        <?php endfor;?>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="row mt-4">
                <div class="col-lg-6 col-md-6 mt-4 mb-10">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div style="background-color: white;">
                                <div class="chart">
                                    <canvas id="yearlySalesChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('reportsYear')?>">Export Report</a>
                            <h6 class="mb-0">Yearly Sales</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/js/linechart.js"></script>
        <script src="/assets/js/chart.min.js"></script>
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/chartjs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script type="text/javascript" src="<?php site_url()?>/assets/user/js/chart.js"></script>
        <script>
            google.charts.load('current', {
                'packages': ['corechart', 'bar']
            });
            google.charts.setOnLoadCallback(drawCharts);

            function drawCharts() {
                drawLineChart();
                drawBarChart();
            }

            function drawLineChart() {
                var lineChartData = google.visualization.arrayToDataTable([
                    ['Day', 'Sales Count'],
                    <?php 
                        foreach ($products as $row) {
                            echo "['" . $row['day'] . "', " . $row['sell'] . "],";
                        }
                    ?>
                ]);

                var lineChartOptions = {
                    title: 'Line chart product sell wise',
                    curveType: 'function',
                    legend: {
                        position: 'top'
                    }
                };

                var lineChart = new google.visualization.LineChart(document.getElementById('dailySalesChart'));
                lineChart.draw(lineChartData, lineChartOptions);
            }


            var currentMonth = $('#month').val();
            var currentYear = $('#year').val();
            fetchChartData(currentMonth, currentYear);

            $('#filterForm').on('submit', function(event) {
                event.preventDefault();
                var selectedMonth = $('#month').val();
                var selectedYear = $('#year').val();
                fetchChartData(selectedMonth, selectedYear);
            });




        </script>
        <script>
            const salesData = <?php echo json_encode($salesByMonth); ?>;
            const labels = salesData.map(item => item.month);
            const sales = salesData.map(item => item.total_sales); 

            const colors = [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)', 
                'rgba(255, 205, 86, 0.8)', 
                'rgba(75, 192, 192, 0.8)', 
                'rgba(153, 102, 255, 0.8)', 
            ];

            const backgroundColors = colors.slice(0, labels.length);

            const ctx = document.getElementById('monthlySalesChart').getContext('2d');

            const monthlySalesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Monthly Sales',
                        data: sales,
                        backgroundColor: backgroundColors,
                        borderColor: 'rgba(148, 255, 251, 0.8)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        <script>
            const salesByYear = <?php echo json_encode($salesByYear); ?>;
            const labelsYear = salesByYear.map(item => item.year);
            const salesYear = salesByYear.map(item => item.total_amount);

            const colorss= [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
            ];
            const backgroundColorss = colorss.slice(0, labelsYear.length);

            const ctxYear = document.getElementById('yearlySalesChart').getContext('2d');

            const yearlySalesChart = new Chart(ctxYear, {
                type: 'pie',
                data: {
                    labels: labelsYear,
                    datasets: [{
                        label: 'Yearly Sales',
                        data: salesYear,
                        backgroundColor: backgroundColors,
                        borderColor: 'rgba(95, 0, 113, 0.8)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
</body>
</html>