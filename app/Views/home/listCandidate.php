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

        <section id="candidate-1">
            <div class="container">
                <h2 class="text-center">Calon Kandidat Gubernur dan Wakil Gubernur</h2>
                <div class="justify-content-center">
                    <div class="row mt-5 justify-content-center">
                        <?php
                            $db = \Config\Database::connect();

                            $data = $db->table('candidates')->getWhere(['type' => '1']);

                            foreach($data->getResult() as $item)
                            {
                            
                        ?>
                        <div class="col-xl-4 col-lg-4 col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="<?php echo base_url()."/uploads/photoCandidate/".$item->image; ?>" class="img-thumbnail">
                                    <h4><?php echo $item->name_1; ?></h4>
                                    <h4><?php echo $item->name_2; ?></h4>
                                    <a href="<?=base_url()?>/home/candidate?id=<?=$item->id.'&type='.$item->type; ?>" class="btn btn-primary">Lihat Informasi</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="candidate-2">
            <div class="container">
                <h2 class="text-center">Calon Kandidat Anggota DPM</h2>
                <div class="justify-content-center">
                    <div class="row mt-5 justify-content-center">
                        <?php
                            $db = \Config\Database::connect();

                            $data = $db->table('candidates')->getWhere(['type' => '2']);

                            foreach($data->getResult() as $item)
                            {
                            
                        ?>
                        <div class="col-xl-4 col-lg-4 col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="<?php echo base_url()."/uploads/photoCandidate/".$item->image; ?>" class="img-thumbnail" style="width:220px; height:300px;">
                                    <h4><?php echo $item->name_1; ?></h4>
                                    <h4><?php echo $item->name_2; ?></h4>
                                    <a href="<?=base_url()?>/home/candidate?id=<?=$item->id.'&type='.$item->type; ?>" class="btn btn-primary">Lihat Informasi</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
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
            $('#recipeCarousel').carousel({
            interval: 10000
            })

            $('.carousel .carousel-item').each(function(){
                var minPerSlide = 3;
                var next = $(this).next();
                if (!next.length) {
                next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
                
                for (var i=0;i<minPerSlide;i++) {
                    next=next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    
                    next.children(':first-child').clone().appendTo($(this));
                }
            });
        </script>
    </body>

</html>