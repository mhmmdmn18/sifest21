<?php
session_start();
include "../../koneksi.php";

if(!isset($_SESSION["admin3"])){
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Admin PTI SI FEST 2021</title>

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
                            <h3>User</h3>
                            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User</li>
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
                                        <th>Email</th>
                                        <th>WA</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = mysqli_query($koneksi, "SELECT * from user ");
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['email']  ?></td>
                                            <td><a href="https://wa.me/<?= $data['wa'] ?>" target="_blank"><?= $data['wa'] ?></a></td>
                                            <td><?= $data['password']  ?></td>
                                            <td><!-- Button untuk modal -->
                                                <a href="#" class="btn btn-warning text-dark" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $data['id_user']; ?>">Edit</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade text-left" id="myModal<?php echo $data['id_user']; ?>" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Verifikasi Artikel</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form role="form" action="editpass.php" method="get">
                                                        <div class="modal-body">
                                                            <?php
                                                            $id = $data['id_user'];
                                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
                                                            //$result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($query_edit)) {
                                                            ?>
                                                                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">

                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="text" name="password" class="form-control">
                                                                </div>

                                                            <?php
                                                            }
                                                            //mysql_close($host);
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                <span class="d-sm-block">Cancel</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1" name="submit">
                                                                Update &raquo;
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <p>Default Password (12345678):<br>$2y$10$kdBIdrLNIbgDYCKJrX1ANuPo1MRB6hW14O7XJifC.85PWg0FmFFGW</p>
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