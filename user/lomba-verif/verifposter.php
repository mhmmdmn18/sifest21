<?php
include "../../koneksi.php";
require "../function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Poster</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $id    = $_POST['id_user'];
        $bukti = bukti();

        $query = "UPDATE lombadaftar SET 
                bukti='$bukti'
                WHERE id_user = '$id' AND lomba='poster'";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Bukti berhasil diupload!', 'success').then(function(){
                        setTimeout(document.location.href = '../poster.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Bukti gagal diupload!', 'error').then(function(){
                        setTimeout(document.location.href = '../poster.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>