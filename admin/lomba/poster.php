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
    <title>Poster | Admin Lomba SI FEST 2021</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/vendor/iconly/bold.css">
    <link rel="stylesheet" href="../../assets/vendor/simple-datatables/style.css">

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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Poster</h3>
                            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Poster</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <br>
                <section class="section">
                    <div class="card">
                        <!-- <div class="card-header">
                            Simple Datatable
                        </div> -->
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Instansi</th>
                                        <th>WA</th>
                                        <th>IG</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = mysqli_query($koneksi, "SELECT * from lombadaftar inner join user on lombadaftar.id_user = user.id_user inner join poster on lombadaftar.id_lombadaftar = poster.id_lombadaftar WHERE verif=1 ");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama']  ?></td>
                                            <td><?= $data['univ']  ?></td>
                                            <td><a href="https://wa.me/<?= $data['wa'] ?>" target="_blank"><?= $data['wa'] ?></a></td>
                                            <td><a href="https://instagram.com/<?= $data['ig'] ?>" target="_blank"><?= $data['ig'] ?></a></td>
                                            <td><a href="../../user/filePoster/<?php echo $data['file']; ?>" target="_blank"><?php echo $data['file']; ?></a></td>
   
                                        </tr>

                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <?php include 'includes/footer.php'; ?>

        </div>
    </div>

    <script src="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/vendor/apexcharts/apexcharts.js"></script>
    <script src="../../assets/js/pages/dashboard.js"></script>

    <script src="../../assets/js/pages/horizontal-layout.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="../../assets/js/main.js"></script>
</body>

</html>