<?php
session_start();
include "../../koneksi.php";
require "../function.php";

$data = mysqli_fetch_array(data($_GET));
$id = $_SESSION['id_user'];
$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='valortim'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$idlombadaftar = $row['id_lombadaftar'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi ValorTim</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $nama1 = $data['nama'];
        $nama2 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama2']));
        $nama3 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama3']));
        $nama4 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama4']));
        $nama5 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama5']));

        $id    = $_POST['id_user'];
        $bukti = bukti();
        $ktm1  = ktm1();
        $ktm2  = ktm2();
        $ktm3  = ktm3();
        $ktm4  = ktm4();
        $ktm5  = ktm5();

        $query = "UPDATE lombadaftar SET 
                bukti='$bukti',ktm1='$ktm1',ktm2='$ktm2',ktm3='$ktm3',ktm4='$ktm4',ktm5='$ktm5'
                WHERE id_user = '$id' AND lomba='valortim'";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            $query = "UPDATE valortim SET 
                    nama1='$nama1',nama2='$nama2',nama3='$nama3',nama4='$nama4',nama5='$nama5'
                    WHERE id_lombadaftar = '$idlombadaftar'";
            $hasil2 = mysqli_query($koneksi, $query);

            if ($hasil2) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Bukti berhasil diupload!', 'success').then(function(){
                        setTimeout(document.location.href = '../valortim.php', 100);
                        })
                </script>";
            }
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Bukti gagal diupload!', 'error').then(function(){
                        setTimeout(document.location.href = '../valortim.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>