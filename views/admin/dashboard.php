<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body class="nav-md">
    <?php $page='dashboard';
    include 'include/sidebar.php'; ?>
    <?php include 'include/menufooter.php'; ?>
    </div>
    </div>
    <?php include 'include/topnav.php'; ?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-dashboard"></i> Dashboard</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row">
                                <center>
                                    <div class="tile_count">
                                        <div class="col-md-3 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-folder"></i>
                                                Total Categories</span>
                                            <div class="count"><?php echo $categories; ?></div>
                                        </div>
                                        <div class="col-md-3 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-tags"></i>
                                                Total Tags</span>
                                            <div class="count"><?php echo $tags; ?></div>
                                        </div>
                                        <div class="col-md-3 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-file-text"></i> total archived articles </span>
                                            <div class="count"><?php echo $wikisarchives; ?></div>
                                        </div>

                                        <div class="col-md-3 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-file-text"></i>
                                                total unarchived articles</span>
                                            <div class="count"><?php echo $wikisnonarchives; ?></div>
                                        </div>

                                    </div>
                                </center>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Statistics</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="line-chart">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Top Items</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <tr>
                                                    <td>Biogesic</td>
                                                    <td>30</td>
                                                    <td>Php7.00</td>
                                                    <td>Php210.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Alaxan</td>
                                                    <td>20</td>
                                                    <td>Php10.00</td>
                                                    <td>Php200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Tuseran</td>
                                                    <td>50</td>
                                                    <td>Php8.00</td>
                                                    <td>Ph400.00</td>
                                                </tr>
                                                <tr>
                                                    <td>BioFlu</td>
                                                    <td>45</td>
                                                    <td>Php12.00</td>
                                                    <td>Php540.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Enervon</td>
                                                    <td>100</td>
                                                    <td>Php6.00</td>
                                                    <td>Php600.00</td>
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
    </div>
    </div>
    </div>

    <?php include 'include/footer.php'; ?>
    <script>
        $(document).ready(function() {
            var $lineChart = $('#line-chart');

            var lineChart = new Chart($lineChart, {
                type: 'line',
                data: {
                    labels: ['Categories', 'Tags', 'Archived', 'Unarchived'],
                    datasets: [{
                        data: [<?php echo $categories; ?>, <?php echo $tags; ?>, <?php echo $wikisarchives; ?>, <?php echo $wikisnonarchives; ?>],
                        backgroundColor: 'transparent',
                        borderColor: '#2d898b',
                        pointBorderColor: '#2d898b',
                        pointBackgroundColor: '#2d898b',
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>

</body>

</html>