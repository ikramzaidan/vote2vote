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
                        <h2 class="text-center">Your Feedback Please</h2>
                        <hr>
                        <?php if(session()->getFlashdata('msg-1')){?>
                        <div class="alert alert-success"><?= session()->getFlashdata('msg-1') ?></div>
                        <?php }elseif(session()->getFlashdata('msg-0')){?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg-0') ?></div>
                        <?php } ?>

                        <?php if($feed==0){ ?>
                        <form class="user mt-4" action="/home/psFeedback" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="usrid" value="<?=$session->sess_id;?>">
                                    </div>
                                    <div class="form-group">
                                        <div id="namExample">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control form-control-user" value="<?=$name?>" readonly>
                                        </div>
                                        <input type="checkbox" id="checkA" name="anonym" value="1" onclick="myFunction()"> Kirim sebagai anonim
                                    </div>
                                    <div class="form-group">
                                        <label>Rating</label><br/>
                                        <span>1</span>
                                        <input type="radio" name="rate" value="1">
                                        <input type="radio" name="rate" value="1">
                                        <input type="radio" name="rate" value="1">
                                        <input type="radio" name="rate" value="1">
                                        <input type="radio" name="rate" value="1">
                                        <span>5</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Kritik</label>
                                        <textarea name="critic" class="form-control form-control-user" placeholder="Tulis kritik disini..." required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Saran</label>
                                        <textarea name="advise" class="form-control form-control-user" placeholder="Tulis masukan disini..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php }else{?>
                        <div class="alert alert-success py-5 text-center">Terimakasih karena telah bersedia mengirimkan masukan kepada kami. Masukan dari kamu sangatlah berarti bagi kami.</div>
                        <?php }?>
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

        <script>
        function myFunction() {
            var checkBox = document.getElementById("checkA");
            var nameForm = document.getElementById("namExample");
            if (checkBox.checked == true){
                nameForm.style.display = "none";
            } else {
                nameForm.style.display = "block";
            }
        }
        </script>
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