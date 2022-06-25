<?php
include "../../koneksi.php";
require "../function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data PUBGM</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $id1   = htmlspecialchars($_POST['id1']);
        $nick1 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nick1']));

        $id2   = htmlspecialchars($_POST['id2']);
        $nick2 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nick2']));

        $id3   = htmlspecialchars($_POST['id3']);
        $nick3 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nick3']));

        $id4   = htmlspecialchars($_POST['id4']);
        $nick4 = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nick4']));

        $id_lombadaftar    = $_POST['id_lombadaftar'];

        $query = "UPDATE pubgm SET 
                id1 = '$id1', nick1 = '$nick1', 
                id2 = '$id2', nick2 = '$nick2', 
                id3 = '$id3', nick3 = '$nick3', 
                id4 = '$id4', nick4 = '$nick4'
                WHERE pubgm.id_lombadaftar = '$id_lombadaftar' ";

        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Data berhasil dikirim!', 'success').then(function(){
                        setTimeout(document.location.href = '../pubgm.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Data gagal dikirim!', 'error').then(function(){
                        setTimeout(document.location.href = '../pubgm.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>