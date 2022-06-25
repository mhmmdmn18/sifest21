<?php
include "../../koneksi.php";
require "../function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>File Artikel</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $id_lombadaftar    = $_POST['id_lombadaftar'];
        $file = fileArtikel();

        $query = "UPDATE artikel SET 
                file = '$file' WHERE artikel.id_lombadaftar = '$id_lombadaftar' ";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'File berhasil diupload!', 'success').then(function(){
                        setTimeout(document.location.href = '../artikel.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'File gagal diupload!', 'error').then(function(){
                        setTimeout(document.location.href = '../artikel.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>