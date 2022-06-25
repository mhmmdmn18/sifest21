<?php
include "../../koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Pass</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php

    $id    = $_GET['id_user'];
    $pass  = $_GET['password'];
    $query = "UPDATE user SET 
			 password='$pass' 
			 WHERE id_user = '$id'";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        echo "
            <script>
                Swal.fire('Berhasil', 'Password berhasil diubah!', 'success').then(function(){
                    setTimeout(document.location.href = 'forgotpass.php', 100);
                    })
            </script>";
    } else {
        echo "
            <script>
                Swal.fire('Gagal', 'Password gagal diubah!', 'error').then(function(){
                    setTimeout(document.location.href = 'forgotpass.php', 100);
                    })
            </script>";
    }
    $koneksi->close();

    ?>
</body>

</html>