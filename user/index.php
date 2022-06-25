<?php 
session_start(); 
include "../koneksi.php";
require "function.php";


if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit;
}

$data = mysqli_fetch_array(data($_GET));

$dataiduser = $data['id_user']; 
// $dataiduser = isset($data['id_user']) ? data['id_user'] : ''; 

$querylomba = "SELECT * FROM lombadaftar WHERE id_user = $dataiduser";
$resultlomba = mysqli_query($koneksi, $querylomba);
// $rowlomba = mysqli_fetch_assoc($resultlomba);
$listlomba = array();
while ($rowlomba = mysqli_fetch_assoc($resultlomba)) {
    array_push($listlomba, $rowlomba['lomba']);
}
// print_r($listlomba);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SI FEST 2021</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">

            <?php include 'includes/header.php'; ?>

            <!-- main -->
            <div class="content-wrapper container">
                <div class="page-heading">
                    <h3>Welcome, <?= $data['nama'] ?></h3>
                </div>
                <div class="card">
                    <div class="card-body p-2"> 
                        <div class="row d-flex align-items-center">
                            <div class="col-3 col-lg-1 col-md-1 col-sm-2 mx-3 py-1">
                                <div class="avatar avatar-xl bg-primary me-3">
                                    <img src="../assets/img/maskot.png" alt="Face 1">
                                </div>    
                            </div>
                            
                            <div class="col-7 col-lg-4 col-md-5 col-sm-9 name pt-2">
                                <h5 class="font-bold"><?= $data['nama'] ?></h5>
                                <h6 class="text-muted mb-2"><?= $data['univ'] ?></h6>
                            </div>
                            
                            <div class="col-12 col-lg-5 col-md-4 col-sm-12 name pl-4 py-3" style="margin: 0 2.5%;">
                                <h6 class="text-muted mb-2"><i class="bi bi-envelope"></i> <?= $data['email'] ?></h6>
                                <h6 class="text-muted mb-0"><i class="bi bi-whatsapp"></i> <?= $data['wa'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- line1 -->
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4 pb-3">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldTick-Square"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Lomba Terverifikasi</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                    <?php
                                                        if ($resultjmlhverif = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_verif FROM `lombadaftar` WHERE id_user = $dataiduser AND verif = 1 ")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhverif);
                                                            echo $row['jml_verif'];
                                                        }
                                                    ?>    
                                                    </h6>
                                                    <h6 class="text-muted font-semibold">dari <b>
                                                    <?php
                                                        if ($resultjmlhlomba = mysqli_query($koneksi, "SELECT count(`id_lombadaftar`) AS jml_lomba FROM `lombadaftar` WHERE id_user = $dataiduser")) {
                                                            $row =  mysqli_fetch_assoc($resultjmlhlomba);
                                                            echo $row['jml_lomba'];
                                                        }
                                                    ?>  
                                                    </b> lomba yang diikuti</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 31px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldPaper-Download"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Guidebook Lomba</h6>
                                                    <a href="https://bit.ly/GuideBookSIFEST21" target="_blank" class="btn btn-danger btn-sm">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 31px;"> <!-- style="padding-bottom: 31px;" style="padding-bottom: 41.57px;"--> 
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldTicket-Star"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Webinar</h6>
                                                    <div class="pb-0" style="display: inline-flex;">             
                                                        <h6 class="font-extrabold mb-0 me-2 mt-2">Terdaftar <i class="bi bi-check-circle"></i></h6>
                                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#webinar">Join Grup</a> 
                                                    </div> 
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

                                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldDocument"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Artikel</h6>
                                                    <?php if (in_array("artikel", $listlomba)) { ?>
                                                    <a href="artikel.php" class="btn btn-primary btn-sm">View Artikel</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#artikel">Daftar Artikel</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldImage"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Poster</h6>
                                                    <?php if (in_array("poster", $listlomba)) { ?>
                                                    <a href="poster.php" class="btn btn-info btn-sm">View Poster</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#poster">Daftar Poster</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-4">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon green">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">UI/UX</h6>
                                                    <?php if (in_array("uiux", $listlomba)) { ?>
                                                    <a href="uiux.php" class="btn btn-success btn-sm">View UI/UX</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#uiux">Daftar UI/UX</a>
                                                    <?php } ?>
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

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card mt-0">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon blue">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-9">
                                                    <h6 class="text-muted">Mobile Legends</h6>
                                                    <?php if (in_array("ml", $listlomba)) { ?>
                                                    <a href="ml.php" class="btn btn-info btn-sm">View ML</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#ml">Daftar ML</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-9">
                                                    <h6 class="text-muted">PUBG Mobile</h6>
                                                    <?php if (in_array("pubgm", $listlomba)) { ?>
                                                    <a href="pubgm.php" class="btn btn-primary btn-sm">View PUBGM</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#pubgm">Daftar PUBGM</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body px-3 pt-4" style="padding-bottom: 14px;">
                                            <div class="row">
                                                <div class="col-3 col-md-3 col-sm-4">
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldGame"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-md-9 col-sm-12">
                                                    <h6 class="text-muted">Valorant</h6>
                                                    <?php if (in_array("valorsolo", $listlomba)) { ?>
                                                    <a href="valorsolo.php" class="btn btn-danger btn-sm">View Solo</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-danger btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#valorsolo">Daftar Solo</a>
                                                    <?php } ?>

                                                    <?php if (in_array("valortim", $listlomba)) { ?>
                                                    <a href="valortim.php" class="btn btn-danger btn-sm">View Tim</a> 
                                                    <?php } else { ?>
                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#valortim">Daftar Tim</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Basic Modal -->
                                <!-- Info Webinar -->
                                <div class="modal fade text-left" id="webinar" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Info Webinar</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Webinar SI FEST hadir kembali di tahun 2021 dengan tema 
                                                "Youth Enthusiasm for Technology to Survive in the Pandemic Era".</p>
                                                <p>No. Tiket Anda : <b><?= $data['no_tiket'] ?></b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <span class="d-sm-block">Close</span>
                                                </button>
                                                <a href="https://chat.whatsapp.com/G2pwSU64vMu6zFvDrafMKi" target="_blank"><button type="button" class="btn btn-primary ml-1">
                                                    Join Grup &raquo;
                                                </button></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Artikel -->
                                <div class="modal fade text-left" id="artikel" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar Artikel</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarartikel.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba Artikel merupakan lomba dimana peserta akan membuat sebuah artikel dengan tujuan tertentu sesuai tema. Peserta adalah kalangan <b>Mahasiswa/Pelajar</b>, dibuktikan dengan KTM/Kartu Pelajar.</p>
                                                    <p>FEE: <b>Rp30K</b></p>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-artikel" required>
                                                            <label for="cb-artikel">Saya yakin ingin mendaftar lomba Artikel SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Poster -->
                                <div class="modal fade text-left" id="poster" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar Poster</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarposter.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba Poster Design merupakan lomba dimana peserta akan membuat/mendesain sebuah poster dengan tujuan tertentu sesuai tema. Peserta adalah kalangan <b>Umum</b>.</p>
                                                    <p>FEE: <b>Rp35K</b></p>
                                                    <label>Username Instagram: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="tanpa '@', contoh: sifest.unsri"
                                                            class="form-control" name="ig" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="validate1" required>
                                                            <label for="validate1">Saya telah mengisi data dengan benar</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-poster" required>
                                                            <label for="cb-poster">Saya yakin ingin mendaftar lomba Poster Design SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar UI/UX -->
                                <div class="modal fade text-left" id="uiux" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar UI/UX</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftaruiux.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba UI/UX Design merupakan lomba dimana peserta akan merancang UI/UX berbasis Mobile/Web dengan tujuan tertentu sesuai tema. Peserta adalah kalangan <b>Mahasiswa/Pelajar</b>, dibuktikan dengan KTM/Kartu Pelajar.</p>
                                                    <p>FEE: <b>Rp65K</b></p>
                                                    <label>Nama Tim: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama Tim"
                                                            class="form-control" name="namatim" required>
                                                            <p>Isi dengan tanda strip (-) jika individu</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="validate2" required>
                                                            <label for="validate2">Saya telah mengisi data dengan benar</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-uiux" required>
                                                            <label for="cb-uiux">Saya yakin ingin mendaftar lomba UI/UX Design SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar ML -->
                                <div class="modal fade text-left" id="ml" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar ML</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarml.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba E-Sport Mobile Legends merupakan lomba dimana peserta akan saling bertanding Mobile Legends antar tim. Peserta adalah kalangan <b>Mahasiswa Universitas Sriwijaya</b>, dibuktikan dengan KTM.</p>
                                                    <p>FEE: <b>Rp30K</b></p>
                                                    <label>Nama Tim: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama Tim"
                                                            class="form-control" name="namatim" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="validate3" required>
                                                            <label for="validate3">Saya telah mengisi data dengan benar</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-ml" required>
                                                            <label for="cb-ml">Saya yakin ingin mendaftar lomba E-Sport ML SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar PUBGM -->
                                <div class="modal fade text-left" id="pubgm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar PUBG Mobile</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarpubgm.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba E-Sport PUBG Mobile merupakan lomba dimana peserta akan saling bertanding PUBG Mobile antar tim. Peserta adalah kalangan <b>Mahasiswa/Pelajar</b>, dibuktikan dengan KTM/Kartu Pelajar.</p>
                                                    <p>FEE: <b>Rp40K</b></p>
                                                    <label>Nama Tim: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama Tim"
                                                            class="form-control" name="namatim" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="validate4" required>
                                                            <label for="validate4">Saya telah mengisi data dengan benar</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-pubgm" required>
                                                            <label for="cb-pubgm">Saya yakin ingin mendaftar lomba E-Sport PUBGM SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Valorant (Solo) -->
                                <div class="modal fade text-left" id="valorsolo" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar Valorant (Solo)</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarvalorsolo.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba E-Sport Valorant (Solo) merupakan lomba dimana peserta akan saling bertanding Valorant antar individu. Peserta adalah kalangan <b>Mahasiswa/Pelajar</b>, dibuktikan dengan KTM/Kartu Pelajar.</p>
                                                    <p>FEE: <b>Rp15K</b></p>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-valorsolo" required>
                                                            <label for="cb-valorsolo">Saya yakin ingin mendaftar lomba E-Sport Valorant (Solo) SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Valorant (Tim) -->
                                <div class="modal fade text-left" id="valortim" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Daftar Valorant (Tim)</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="lomba-daftar/daftarvalortim.php" method="post">
                                                <div class="modal-body">
                                                    <p>Lomba E-Sport Valorant (Tim) merupakan lomba dimana peserta akan saling bertanding Valorant antar tim. Peserta adalah kalangan <b>Mahasiswa/Pelajar</b>, dibuktikan dengan KTM/Kartu Pelajar.</p>
                                                    <p>FEE: <b>Rp50K</b></p>
                                                    <label>Nama Tim: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama Tim"
                                                            class="form-control" name="namatim" required>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="validate5" required>
                                                            <label for="validate5">Saya telah mengisi data dengan benar</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <input type="checkbox" class="form-check-input" id="cb-valortim" required>
                                                            <label for="cb-valortim">Saya yakin ingin mendaftar lomba E-Sport Valorant (Tim) SI FEST 2021</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Cancel</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                        Daftar &raquo;
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- End Basic Modal -->

                            </div>
                        </div>

                    </section>
                </div>
            </div>

            <?php include 'includes/footer.php'; ?>

        </div>
    </div>

    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/pages/horizontal-layout.js"></script>
</body>

</html>