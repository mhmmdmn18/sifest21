<?php
include "../../koneksi.php";
require "../function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Valorant (Solo)</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $id = htmlspecialchars($_POST['id']);
        $nick = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nick']));
        $pangkat = htmlspecialchars($_POST['pangkat']);
        
        $id_lombadaftar = $_POST['id_lombadaftar'];

        $query = "UPDATE valorsolo SET 
                id = '$id', nick = '$nick', pangkat = '$pangkat'
                WHERE valorsolo.id_lombadaftar = '$id_lombadaftar' ";

        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Data berhasil dikirim!', 'success').then(function(){
                        setTimeout(document.location.href = '../valorsolo.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Data gagal dikirim!', 'error').then(function(){
                        setTimeout(document.location.href = '../valorsolo.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>