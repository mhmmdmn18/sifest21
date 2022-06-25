<?php
session_start();
include "../../koneksi.php";
require "../function.php";

$data = mysqli_fetch_array(data($_GET));
$id = $_SESSION['id_user'];
$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='ml'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$idlombadaftar = $row['id_lombadaftar'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi ML</title>
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

        $nim1  = htmlspecialchars($_POST['nim1']);
        $nim2  = htmlspecialchars($_POST['nim2']);
        $nim3  = htmlspecialchars($_POST['nim3']);
        $nim4  = htmlspecialchars($_POST['nim4']);
        $nim5  = htmlspecialchars($_POST['nim5']);

        $id    = $_POST['id_user'];
        $bukti = bukti();
        $ktm1  = ktm1();
        $ktm2  = ktm2();
        $ktm3  = ktm3();
        $ktm4  = ktm4();
        $ktm5  = ktm5();

        $sel1  = sel1();
        $sel2  = sel2();
        $sel3  = sel3();
        $sel4  = sel4();
        $sel5  = sel5();

        $query = "UPDATE lombadaftar SET bukti='$bukti',
                nim1 = '$nim1', nim2 = '$nim2', nim3 = '$nim3', nim4 = '$nim4', nim5 = '$nim5',
                ktm1 = '$ktm1', ktm2 = '$ktm2', ktm3 = '$ktm3', ktm4 = '$ktm4', ktm5 = '$ktm5',
                sel1 = '$sel1', sel2 = '$sel2', sel3 = '$sel3', sel4 = '$sel4', sel5 = '$sel5'
                WHERE id_user = '$id' AND lomba='ml'";

        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            $query = "UPDATE ml SET 
                    nama1 = '$nama1', nama2 = '$nama2', nama3 = '$nama3', nama4 = '$nama4', nama5 = '$nama5'
                    WHERE id_lombadaftar = '$idlombadaftar'";
            $hasil2 = mysqli_query($koneksi, $query);

            if ($hasil2) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Bukti berhasil diupload!', 'success').then(function(){
                        setTimeout(document.location.href = '../ml.php', 100);
                        })
                </script>";
            }
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Bukti gagal diupload!', 'error').then(function(){
                        setTimeout(document.location.href = '../ml.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>