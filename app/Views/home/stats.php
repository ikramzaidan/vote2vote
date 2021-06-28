<?php
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    $toTlusr = $builder->countAll();
    $builder->where('section', 2);
    $toTlvte = $builder->countAllResults();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-Vote - Home</title>
        <link href="<?=base_url($bootstrap)?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url($vendor)?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url($css)?>/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
            <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?=base_url()?>">E-Vote</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <?php if($log==1){?>
                <li class="nav-item dropdown">
                    <a class="btn bttn-secondary form-control" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$usrn?></a>
                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=base_url()?>/home/profile">Profil</a>
                        <a class="dropdown-item <?php if($section!=2){echo "text-danger";}else{echo "text-success";}?>"><?php if($section!=2){echo "Belum Memilih";}else{echo "Sudah Memilih";}?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
                    </div>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="btn bttn-primary form-control" href="<?php base_url()?>/login">Masuk</a>
                </li>
                <?php } ?>
                </ul>
            </div>
            </div>
        </nav>

        <header class="bg-primary text-white">
            <div class="container">
            <h1>Pemilwa FF UMS 2020</h1>
            <p class="lead">Selamat datang di Pemilihan Wakil Fakultas Farmasi Universitas Muhammadiyah Surakarta Tahun 2020</p>
            <a href="<?=base_url()?>/vote" class="btn bttn-active">VOTING SEKARANG</a>
            </div>
        </header>

        <?php if($section==2){ ?>
        <section id="stat-1">
            <div class="container">
                <h2 class="text-center">Quick-Real Count</h2>
                <div class="row">
                    <div class="col-md-8 col-sm-12 mx-auto">
                        <!-- Pie Chart -->
                        <div class="chart-pie">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="stat-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mx-auto">
                        <!-- Pie Chart -->
                        <div class="chart-pie">
                            <canvas id="myPieChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">E-Vote Result</h6>
                            </div>
                            <div class="card-body">
                                <?php
                                    $data = $db->table('candidates')->getWhere(['type'=>1]);

                                    foreach($data->getResult() as $item)
                                    {
                                        
                                ?>
                                <h4 class="small font-weight-bold"><?=$item->name_1;echo" & $item->name_2";?><span class="float-right"><?=$item->voter?></span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width:<?= round($item->voter/$toTlusr*100, 1); ?>%"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <?php

                                        $data = $db->table('candidates')->getWhere(['type'=>2]);

                                        foreach($data->getResult() as $item)
                                        {
                                ?>
                                <h4 class="small font-weight-bold"><?=$item->name_1?><span class="float-right"><?=$item->voter?></span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width:<?= round($item->voter/$toTlusr*100, 1); ?>%"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
            </div>
        </section>
        <?php }else{} ?>
        
        <!-- Footer -->
        <footer class="py-3 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">&copy; 2020 E-Vote. Powered by E-Vote for E-Veryone</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mau keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Keluar" jika kamu yakin untuk mengakhiri sesi.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="<?=base_url()?>/logout">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?=base_url($vendor)?>/jquery/jquery.min.js"></script>
        <script src="<?=base_url($vendor)?>/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?=base_url($vendor)?>/jquery-easing/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Chart JS-->
        <script src="<?=base_url($vendor)?>/chart.js/Chart.min.js"></script>
        <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [<?php 
                        $db = \Config\Database::connect();
                        $data = $db->table('candidates')->getWhere(['type'=>1]);
                        foreach($data->getResult() as $item){
                            echo "'$item->name_1',";
                        }
                    ?>'Belum Memilih'],
            datasets: [{
            data: [<?php 
                        $data = $db->table('candidates')->getWhere(['type'=>1]);
                        $builder = $db->table('users');
                        $TLusrs = $builder->countAll();
                        foreach($data->getResult() as $item){
                            $vlue=round($item->voter/$TLusrs*100,1);
                            echo "$vlue,";
                        }
                        $builder->where('section', 0);
                        $NYusrs=$builder->countAllResults();echo round($NYusrs/$TLusrs*100, 1);
                    ?>],
            backgroundColor: ['#4e73df', '#1cc88a', '#f11421'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#b20000'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },options: {
            maintainAspectRatio: true,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: true
            },
            cutoutPercentage: 40,
        },
        });
        
        // Pie Chart Example
        var ctx = document.getElementById("myPieChart2");
        var myPieChart2 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [<?php 
                        $db = \Config\Database::connect();
                        $data = $db->table('candidates')->getWhere(['type'=>2]);
                        foreach($data->getResult() as $item){
                            echo "'$item->name_1',";
                        }
                    ?>'Belum Memilih'],
            datasets: [{
            data: [<?php 
                        $data = $db->table('candidates')->getWhere(['type'=>2]);
                        $builder = $db->table('users');
                        $TLusrs = $builder->countAll();
                        foreach($data->getResult() as $item){
                            $vlue=round($item->voter/$TLusrs*100,1);
                            echo "$vlue,";
                        }
                        $builder->where('section', 0);
                        $NYusrs=$builder->countAllResults();echo round($NYusrs/$TLusrs*100, 1);
                    ?>],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#f11421'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#b20000'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },options: {
            maintainAspectRatio: true,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: true
            },
            cutoutPercentage: 40,
        },
        });
        </script>
    </body>

</html>