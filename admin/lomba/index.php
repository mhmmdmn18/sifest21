<?php
session_start();
include "../../koneksi.php";

if(!isset($_SESSION["admin1"])){
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Lomba SI FEST 2021</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/vendor/iconly/bold.css">

    <link rel="stylesheet" href="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">

            <?php include 'includes/header.php'; ?>

            <!-- main -->
            <div class="content-wrapper container">
                <div class="page-heading">
                    <h3>Welcome, Admin Lomba</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- line1 -->
                                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-3 col-lg-2 col-md-3 col-sm-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldTick-Square"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-lg-10 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Total Peserta Lomba</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhpeserta = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_peserta FROM `lombadaftar` WHERE verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpeserta);
                                                            echo $row['jml_peserta'];
                                                        }
                                                    ?>
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhpendaftar = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_pendaftar FROM `lombadaftar` ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpendaftar);
                                                            echo $row['jml_pendaftar'];
                                                        }
                                                    ?>
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 33px;">
                                            <div class="row">
                                                <div class="col-3 col-lg-2 col-md-3 col-sm-4">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldDanger"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-lg-10 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Perlu Diverifikasi</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 OR verif > 1")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                            echo $row['jml_noverif'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- line2 -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body px-5 pt-4 pb-2" style="text-align: center;">
                                            <h3>LOMBA</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldDocument"></i>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">Artikel</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhartikel = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_artikel FROM `lombadaftar` WHERE lomba ='artikel' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhartikel);
                                                            echo $row['jml_artikel'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhartikelr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_artikelr FROM `lombadaftar` WHERE lomba ='artikel' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhartikelr);
                                                            echo $row['jml_artikelr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldImage"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">Poster</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhposter = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_poster FROM `lombadaftar` WHERE lomba ='poster' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhposter);
                                                            echo $row['jml_poster'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhposterr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_posterr FROM `lombadaftar` WHERE lomba ='poster' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhposterr);
                                                            echo $row['jml_posterr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">UI/UX</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhuiux = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_uiux FROM `lombadaftar` WHERE lomba ='uiux' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhuiux);
                                                            echo $row['jml_uiux'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhuiuxr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_uiuxr FROM `lombadaftar` WHERE lomba ='uiux' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhuiuxr);
                                                            echo $row['jml_uiuxr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- line3 -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body px-5 pt-3 pb-1" style="text-align: center;">
                                            <h4>E-Sport</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="card mt-0">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">ML</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhml = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_ml FROM `lombadaftar` WHERE lomba ='ml' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhml);
                                                            echo $row['jml_ml'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhmlr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_mlr FROM `lombadaftar` WHERE lomba ='ml' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhmlr);
                                                            echo $row['jml_mlr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">PUBGM</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhpubgm = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_pubgm FROM `lombadaftar` WHERE lomba ='pubgm' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpubgm);
                                                            echo $row['jml_pubgm'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhpubgmr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_pubgmr FROM `lombadaftar` WHERE lomba ='pubgm' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpubgmr);
                                                            echo $row['jml_pubgmr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">Valorant (Solo)</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhvalorsolo = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_valorsolo FROM `lombadaftar` WHERE lomba ='valorsolo' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhvalorsolo);
                                                            echo $row['jml_valorsolo'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhvalorsolor = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_valorsolor FROM `lombadaftar` WHERE lomba ='valorsolo' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhvalorsolor);
                                                            echo $row['jml_valorsolor'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 class="text-muted">Valorant (Tim)</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhvalortim = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_valortim FROM `lombadaftar` WHERE lomba ='valortim' AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhvalortim);
                                                            echo $row['jml_valortim'];
                                                        }
                                                    ?> 
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhvalortimr = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_valortimr FROM `lombadaftar` WHERE lomba ='valortim' ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhvalortimr);
                                                            echo $row['jml_valortimr'];
                                                        }
                                                    ?> 
                                                    </b> pendaftar</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <?php include 'includes/footer.php'; ?>

        </div>
    </div>

    <script src="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/vendor/apexcharts/apexcharts.js"></script>
    <script src="../../assets/js/pages/dashboard.js"></script>

    <script src="../../assets/js/pages/horizontal-layout.js"></script>
</body>

</html>