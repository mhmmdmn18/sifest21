<?php
include "../../koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Verif</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php

    $id    = $_GET['id_lombadaftar'];
    $verif = $_GET['verif'];
    $lomba = $_GET['lomba'];
    $query = "UPDATE lombadaftar SET 
			 verif='$verif' 
			 WHERE id_lombadaftar = '$id'";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        echo "
            <script>
                Swal.fire('Berhasil', 'Verif berhasil diubah!', 'success').then(function(){
                    setTimeout(document.location.href = 'verif$lomba.php', 100);
                    })
            </script>";
    } else {
        echo "
            <script>
                Swal.fire('Gagal', 'Verif gagal diubah!', 'error').then(function(){
                    setTimeout(document.location.href = 'verif$lomba.php', 100);
                    })
            </script>";
    }
    $koneksi->close();

    ?>
</body>

</html>