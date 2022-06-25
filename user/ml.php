<?php
session_start();
include "../koneksi.php";
require "function.php";

if (!isset($_SESSION["email"])) {
    header("Location: ../login.php");
    exit;
}

$data = mysqli_fetch_array(data($_GET));
$datalomba = mysqli_fetch_assoc(datalombaml($_GET));
if (!$datalomba) {
    header("Location: index.php");
    exit;
}

$idlombadaftar =  $datalomba['id_lombadaftar'];
$query  = "SELECT * FROM ml WHERE id_lombadaftar = $idlombadaftar";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Legends | SI FEST 2021</title>

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
                                <h3>Mobile Legends</h3>
                                <?php
                                if ($datalomba['verif'] == 1) {
                                    echo "<p class='text-subtitle text-muted'>Pengiriman Data Players</p>";
                                } 
                                else {
                                    echo "<p class='text-subtitle text-muted'>Konfirmasi Pembayaran & Verifikasi Peserta</p>";
                                }
                                ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Mobile Legends</li>
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
                                            <h4 class="card-title" style="display:inline">Status Pendaftaran Lomba: </h4>
                                            <?php
                                            if ($datalomba['verif'] == 1) {
                                                echo "<h4 class='card-title' style='display:inline'>Terverifikasi</h4>";
                                            ?>
                                            <form action="lomba-info/infoml.php" class="form form-vertical" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <h4 class="card-title mt-4">Pengiriman Data Players</h4>
                                                        <div class="form-group">
                                                            <label for="namatim">Nama Tim</label>
                                                            <input type="text" id="namatim"
                                                                class="form-control mb-2" name="namatim"
                                                                placeholder="Nama Tim" value="<?= $row['nama_tim'] ?>" disabled required>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingOne">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerOne" aria-expanded="false" aria-controls="playerOne">Player 1</a>
                                                            </h5>
                                                            <div id="playerOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama1">Nama Lengkap</label>
                                                                        <input type="text" id="nama1"
                                                                            class="form-control mb-2" name="nama1"
                                                                            placeholder="Nama Lengkap" value="<?= $row['nama1'] ?>" disabled required>
                                                                        <label for="id1">ID</label>
                                                                        <input type="text" id="id1"
                                                                            class="form-control mb-2" name="id1"
                                                                            placeholder="ID" value="<?= $row['id1'] ?>" required>
                                                                        <label for="server1">Server</label>
                                                                        <input type="text" id="server1"
                                                                            class="form-control mb-2" name="server1"
                                                                            placeholder="Server" value="<?= $row['server1'] ?>" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingTwo">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerTwo" aria-expanded="false" aria-controls="playerTwo">Player 2</a>
                                                            </h5>
                                                            <div id="playerTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama2">Nama Lengkap</label>
                                                                        <input type="text" id="nama2"
                                                                            class="form-control mb-2" name="nama2"
                                                                            placeholder="Nama Lengkap" value="<?= $row['nama2'] ?>" disabled required>
                                                                        <label for="id2">ID</label>
                                                                        <input type="text" id="id2"
                                                                            class="form-control mb-2" name="id2"
                                                                            placeholder="ID" value="<?= $row['id2'] ?>" required>
                                                                        <label for="server2">Server</label>
                                                                        <input type="text" id="server2"
                                                                            class="form-control mb-2" name="server2"
                                                                            placeholder="Server" value="<?= $row['server2'] ?>" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingThree">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerThree" aria-expanded="false" aria-controls="playerThree">Player 3</a>
                                                            </h5>
                                                            <div id="playerThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama3">Nama Lengkap</label>
                                                                        <input type="text" id="nama3"
                                                                            class="form-control mb-2" name="nama3"
                                                                            placeholder="Nama Lengkap" value="<?= $row['nama3'] ?>" disabled required>
                                                                        <label for="id3">ID</label>
                                                                        <input type="text" id="id3"
                                                                            class="form-control mb-2" name="id3"
                                                                            placeholder="ID" value="<?= $row['id3'] ?>" required>
                                                                        <label for="server3">Server</label>
                                                                        <input type="text" id="server3"
                                                                            class="form-control mb-2" name="server3"
                                                                            placeholder="Server" value="<?= $row['server3'] ?>" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingFour">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerFour" aria-expanded="false" aria-controls="playerFour">Player 4</a>
                                                            </h5>
                                                            <div id="playerFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama4">Nama Lengkap</label>
                                                                        <input type="text" id="nama4"
                                                                            class="form-control mb-2" name="nama4"
                                                                            placeholder="Nama Lengkap" value="<?= $row['nama4'] ?>" disabled required>
                                                                        <label for="id4">ID</label>
                                                                        <input type="text" id="id4"
                                                                            class="form-control mb-2" name="id4"
                                                                            placeholder="ID" value="<?= $row['id4'] ?>" required>
                                                                        <label for="server4">Server</label>
                                                                        <input type="text" id="server4"
                                                                            class="form-control mb-2" name="server4"
                                                                            placeholder="Server" value="<?= $row['server4'] ?>" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingFive">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerFive" aria-expanded="false" aria-controls="playerFive">Player 5</a>
                                                            </h5>
                                                            <div id="playerFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama5">Nama Lengkap</label>
                                                                        <input type="text" id="nama5"
                                                                            class="form-control mb-2" name="nama5"
                                                                            placeholder="Nama Lengkap" value="<?= $row['nama5'] ?>" disabled required>
                                                                        <label for="id5">ID</label>
                                                                        <input type="text" id="id5"
                                                                            class="form-control mb-2" name="id5"
                                                                            placeholder="ID" value="<?= $row['id5'] ?>" required>
                                                                        <label for="server5">Server</label>
                                                                        <input type="text" id="server5"
                                                                            class="form-control mb-2" name="server5"
                                                                            placeholder="Server" value="<?= $row['server5'] ?>" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>

                                                            <input type="hidden" name="id_lombadaftar" value="<?= $idlombadaftar ?>">
                                                          </div>

                                                        </div>

                                                        <div class="col-12 col-md-12 mt-3">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox1"
                                                                        class='form-check-input' required>
                                                                    <label for="checkbox1">Saya telah mengisi data dengan benar</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end col-md-12">
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1" name="submit">Kirim &raquo;</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                            } 
                                            else if (isset($datalomba['bukti']) && $datalomba['verif'] == 0) {
                                                echo "<h4 class='card-title' style='display:inline'>Bukti telah terkirim, mohon menunggu proses verifikasi</h4>";
                                            } 
                                            else if ($datalomba['bukti'] == NULL && $datalomba['verif'] == 0) {
                                                echo "<h4 class='card-title' style='display:inline'>Bukti belum dikirim</h4>";
                                            ?>
                                            <form action="lomba-verif/verifml.php" class="form form-vertical" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <span class="mt-3">Pembayaran <b>Rp30K</b> ke:</span>
                                                        <span>• BRI (<a href="#">060401040136502</a>) a.n. Mutiara Fajaria</span>
                                                        <span>• OVO/DANA/GoPay (<a href="#">085378505825</a>) a.n. Mutiara Fajaria</span>
                                                        <h4 class="card-title mt-4">Konfirmasi Pembayaran</h4>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="bukti">Upload bukti pembayaran (Max Size 2MB)</label>
                                                                <input type="file" id="bukti" class="form-control" name="bukti" required>
                                                                <input type="hidden" name="id_user" value="<?= $datalomba['id_user'] ?>">
                                                            </div>
                                                        </div>

                                                        <h4 class="card-title">Verifikasi Peserta</h4>
                                                        <div class="form-group">
                                                            <label for="namatim">Nama Tim</label>
                                                            <input type="text" id="namatim"
                                                                class="form-control mb-2" name="namatim"
                                                                placeholder="Nama Tim" value="<?= $row['nama_tim'] ?>" disabled required>
                                                        </div>
                                                        <div class="accordion" id="accordionExample">
                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingOne">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerOne" aria-expanded="false" aria-controls="playerOne">Player 1</a>
                                                            </h5>
                                                            <div id="playerOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama1">Nama Lengkap</label>
                                                                        <input type="text" id="nama1"
                                                                            class="form-control mb-2" name="nama1"
                                                                            placeholder="Nama Lengkap" value="<?= $data['nama'] ?>" disabled required>

                                                                        <label for="nim1">NIM</label>
                                                                        <input type="text" id="nim1"
                                                                            class="form-control mb-2" name="nim1"
                                                                            placeholder="NIM" pattern="[0-9]{14}" maxlength="14" required>
                                                                        
                                                                        <label for="ktm1">Foto Scan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="ktm1" class="form-control mb-2" name="ktm1" required>

                                                                        <label for="sel1">Foto Selfie dengan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="sel1" class="form-control" name="sel1" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingTwo">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerTwo" aria-expanded="false" aria-controls="playerTwo">Player 2</a>
                                                            </h5>
                                                            <div id="playerTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama2">Nama Lengkap</label>
                                                                        <input type="text" id="nama2"
                                                                            class="form-control mb-2" name="nama2"
                                                                            placeholder="Nama Lengkap" required>
                                                                        
                                                                        <label for="nim2">NIM</label>
                                                                        <input type="text" id="nim2"
                                                                            class="form-control mb-2" name="nim2"
                                                                            placeholder="NIM" pattern="[0-9]{14}" maxlength="14" required>
                                                                        
                                                                        <label for="ktm2">Foto Scan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="ktm2" class="form-control mb-2" name="ktm2" required>

                                                                        <label for="sel2">Foto Selfie dengan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="sel2" class="form-control" name="sel2" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingThree">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerThree" aria-expanded="false" aria-controls="playerThree">Player 3</a>
                                                            </h5>
                                                            <div id="playerThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama3">Nama Lengkap</label>
                                                                        <input type="text" id="nama3"
                                                                            class="form-control mb-2" name="nama3"
                                                                            placeholder="Nama Lengkap" required>
                                                                        
                                                                        <label for="nim3">NIM</label>
                                                                        <input type="text" id="nim3"
                                                                            class="form-control mb-2" name="nim3"
                                                                            placeholder="NIM" pattern="[0-9]{14}" maxlength="14" required>
                                                                        
                                                                        <label for="ktm3">Foto Scan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="ktm3" class="form-control mb-2" name="ktm3" required>

                                                                        <label for="sel3">Foto Selfie dengan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="sel3" class="form-control" name="sel3" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingFour">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerFour" aria-expanded="false" aria-controls="playerFour">Player 4</a>
                                                            </h5>
                                                            <div id="playerFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama4">Nama Lengkap</label>
                                                                        <input type="text" id="nama4"
                                                                            class="form-control mb-2" name="nama4"
                                                                            placeholder="Nama Lengkap" required>
                                                                        
                                                                        <label for="nim4">NIM</label>
                                                                        <input type="text" id="nim4"
                                                                            class="form-control mb-2" name="nim4"
                                                                            placeholder="NIM" pattern="[0-9]{14}" maxlength="14" required>
                                                                        
                                                                        <label for="ktm4">Foto Scan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="ktm4" class="form-control mb-2" name="ktm4" required>

                                                                        <label for="sel4">Foto Selfie dengan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="sel4" class="form-control" name="sel4" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item">
                                                            <h5 class="accordion-header" id="headingFive">
                                                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#playerFive" aria-expanded="false" aria-controls="playerFive">Player 5</a>
                                                            </h5>
                                                            <div id="playerFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                              <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="nama5">Nama Lengkap</label>
                                                                        <input type="text" id="nama5"
                                                                            class="form-control mb-2" name="nama5"
                                                                            placeholder="Nama Lengkap" required>
                                                                        
                                                                        <label for="nim5">NIM</label>
                                                                        <input type="text" id="nim5"
                                                                            class="form-control mb-2" name="nim5"
                                                                            placeholder="NIM" pattern="[0-9]{14}" maxlength="14" required>
                                                                        
                                                                        <label for="ktm5">Foto Scan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="ktm5" class="form-control mb-2" name="ktm5" required>

                                                                        <label for="sel5">Foto Selfie dengan KTM (Max Size 2MB)</label>
                                                                        <input type="file" id="sel5" class="form-control" name="sel5" required>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>

                                                        </div>

                                                        <div class="col-12 col-md-12 mt-3">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox1"
                                                                        class='form-check-input' required>
                                                                    <label for="checkbox1">Saya telah mengisi data dengan benar</label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox2"
                                                                        class='form-check-input' required>
                                                                    <label for="checkbox2">Kirim data di atas, admin akan mengecek apakah data valid atau tidak. Jika tampilan website tidak berubah dalam 1x24 jam, maka data tidak valid dan mohon untuk mengirim data yang valid</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end col-md-12">
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1" name="submit">Kirim &raquo;</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php } ?>

                                            <h6 class="mt-4">Contact Person:</h6>
                                            <span><i class="bi bi-whatsapp"></i><a href="https://wa.me/6281284820714" target="_blank"> +62 812-8482-0714</a> (Ihsan)</span><br>
                                            <span><i class="bi bi-whatsapp"></i><a href="https://wa.me/6282142428330" target="_blank"> +62 821-4242-8330</a> (Harun)</span>

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
</body>

</html>