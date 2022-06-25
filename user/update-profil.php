<?php
include "../koneksi.php";
require "function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Profil</title>
</head>

<body>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["ubah-data"])) {
        $id         = $_POST['id_user'];
        $nama       = $_POST['nama1'];
        $univ       = $_POST['univ'];
        $wa         = $_POST['wa'];

        $query = "UPDATE user SET 
                    nama    ='$nama',
                    univ    ='$univ',
                    wa      ='$wa'
                    WHERE id_user = '$id'";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Data berhasil diubah!', 'success').then(function(){
                        setTimeout(document.location.href = 'ubah-profil.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Data gagal diubah!', 'error').then(function(){
                        setTimeout(document.location.href = 'ubah-profil.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    } 

    if (isset($_POST["ubah-pass"])) {
        $id         = $_POST['id_user'];
        $password   = $_POST['password'];

        // enkripsi password 
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET 
                    password='$password'
                    WHERE id_user = '$id'";
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Password berhasil diubah!', 'success').then(function(){
                        setTimeout(document.location.href = 'ubah-profil.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Password gagal diubah!', 'error').then(function(){
                        setTimeout(document.location.href = 'ubah-profil.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    } 

    ?>
</body>

</html>