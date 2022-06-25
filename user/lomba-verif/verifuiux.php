<?php
session_start();
include "../../koneksi.php";
require "../function.php";

$data = mysqli_fetch_array(data($_GET));
$id = $_SESSION['id_user'];
$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='uiux'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$idlombadaftar = $row['id_lombadaftar'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi UI/UX</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $nama1 = $data['nama'];
        $nama2 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama2']));
        $nama3 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama3']));

        $id    = $_POST['id_user'];
        $bukti = bukti();
        $ktm1  = ktm1();
        $ktm2  = ktm2();
        $ktm3  = ktm3();

        $query = "UPDATE lombadaftar SET 
                bukti='$bukti',ktm1='$ktm1',ktm2='$ktm2',ktm3='$ktm3'
                WHERE id_user = '$id' AND lomba='uiux'";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            $query = "UPDATE uiux SET 
                    nama1='$nama1', nama2='$nama2', nama3='$nama3'
                    WHERE id_lombadaftar = '$idlombadaftar'";
            $hasil2 = mysqli_query($koneksi, $query);

            if ($hasil2) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Bukti berhasil diupload!', 'success').then(function(){
                        setTimeout(document.location.href = '../uiux.php', 100);
                        })
                </script>";
            }
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Bukti gagal diupload!', 'error').then(function(){
                        setTimeout(document.location.href = '../uiux.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>