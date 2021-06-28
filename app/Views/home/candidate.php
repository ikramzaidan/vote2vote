<?php
$idc  = $_GET['id'];
$db   = \Config\Database::connect();
$data = $db->table('candidates')->getWhere(['id' => $idc]);
foreach ($data->getResult() as $row)
{
        $name_1 = $row->name_1;
}
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

        <section id="column">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 col-md-4">
                                <img src="<?php echo base_url()."/uploads/photoCandidate/".$row->image; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <h4 class="text-center"><?=$row->name_1.' & '.$row->name_2;?></h4>
                                </div>
                                <div class="form-group">
                                    <label>Visi:</label>
                                    <div class="container"><?=$row->desc_1?></div>
                                </div>
                                <div class="form-group">
                                    <label>Misi:</label>
                                    <div class="container"><?=$row->desc_2?></div>
                                </div>
                            </div> 
                        </div>
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
    </body>

</html>