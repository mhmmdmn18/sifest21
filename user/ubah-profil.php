<?php
session_start();
include "../koneksi.php";
require "function.php";

if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit;
}

$data = mysqli_fetch_array(data($_GET));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Profil | SI FEST 2021</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

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
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Ubah Profil</h3>
                                <p class='text-subtitle text-muted'>Ubah Data dan Password</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ubah Profil</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Vertical form layout section start -->
                    <section id="basic-vertical-layouts">
                        <div class="row match-height">
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form action="update-profil.php" class="form form-vertical" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">

                                                        <h4 class="card-title">Ubah Data</h4>
                                                        <div class="form-group mt-2">
                                                            <label for="nama1">Nama Lengkap</label>
                                                            <input type="text" id="nama1"
                                                                class="form-control mb-3" name="nama1"
                                                                placeholder="Nama Lengkap" value="<?= $data['nama'] ?>" required>
                                                            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

                                                            <label for="univ">Asal Univeristas/Sekolah/Lainnya</label>
                                                            <input type="text" id="univ"
                                                                class="form-control mb-3" name="univ"
                                                                placeholder="Asal Univeristas/Sekolah/Lainnya" value="<?= $data['univ'] ?>" required>

                                                            <label for="wa">Nomor WhatsApp</label>
                                                            <input type="text" id="wa"
                                                                class="form-control mb-3" name="wa"
                                                                placeholder="Nomor WhatsApp" value="<?= $data['wa'] ?>" required>
                                                        </div>

                                                        <div class="col-12 col-md-12">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox1"
                                                                        class='form-check-input' required>
                                                                    <label for="checkbox1">Saya yakin ingin mengubah data</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end col-md-12">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1" name="ubah-data">Ubah Data</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="update-profil.php" class="form form-vertical" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">

                                                        <h4 class="card-title">Ubah Password</h4>
                                                        <div class="form-group mt-2">
                                                            <label for="password">Password</label>
                                                            <input type="text" id="password"
                                                                class="form-control mb-3" name="password" placeholder="Password" minlength="8" required>
                                                            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                                        </div>

                                                        <div class="col-12 col-md-12">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox2"
                                                                        class='form-check-input' required>
                                                                    <label for="checkbox2">Saya yakin ingin mengubah password</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end col-md-12">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1" name="ubah-pass">Ubah Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- // Basic Vertical form layout section end -->

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
    <script src="../assets/js/login.js"></script>
</body>

</html>