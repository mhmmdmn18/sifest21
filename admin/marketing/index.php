<?php
session_start();
include "../../koneksi.php";

if(!isset($_SESSION["admin5"])){
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Marketing SI FEST 2021</title>

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
                    <h3>Welcome, Admin Marketing</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="row">

                                <!-- line1 -->
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 33px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldUser1"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Total User</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhuser = mysqli_query($koneksi, "SELECT count(`id_user`) AS jml_user FROM `user` ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhuser);
                                                            echo $row['jml_user'];
                                                        }
                                                    ?>    
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldTick-Square"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Peserta Lomba (referral)</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhreferral = mysqli_query($koneksi,
                                                            "SELECT count(user.id_user) AS jml_referral_lomba FROM user 
                                                            INNER JOIN lombadaftar ON user.id_user=lombadaftar.id_user 
                                                            where user.referral not in ('','-') and lombadaftar.verif=1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhreferral);
                                                            echo $row['jml_referral_lomba'];
                                                        }
                                                    ?>   
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhpeserta = mysqli_query($koneksi, 
                                                            "SELECT count(user.id_user) AS jml_peserta_lomba FROM user 
                                                            INNER JOIN lombadaftar ON user.id_user=lombadaftar.id_user 
                                                            where lombadaftar.verif=1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpeserta);
                                                            echo $row['jml_peserta_lomba'];
                                                        }
                                                    ?>  
                                                    </b> peserta lomba</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-2">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldTicket-Star"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Peserta Webinar (referral)</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhreferral = mysqli_query($koneksi, 
                                                            "SELECT count(`id_user`) AS jml_referral_webinar FROM `user` WHERE referral not in ('','-') ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhreferral);
                                                            echo $row['jml_referral_webinar'];
                                                        }
                                                    ?>   
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhpeserta = mysqli_query($koneksi, 
                                                            "SELECT count(`id_user`) AS jml_peserta_webinar FROM `user` ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhpeserta);
                                                            echo $row['jml_peserta_webinar'];
                                                        }
                                                    ?>  
                                                    </b> peserta webinar</h6>
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