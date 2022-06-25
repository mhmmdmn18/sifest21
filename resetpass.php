<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reset Pass</title>
</head>

<body>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert2.js"></script>
    <?php

    $email  = $_GET['email'];
    $sql    = "SELECT email FROM user WHERE email LIKE '%$email%'";
    $proses = mysqli_query ($koneksi, $sql);
    $num    = mysqli_num_rows($proses);

    if ($num == 1) {
        echo "
        <script>
            Swal.fire('Email Terkirim!', 'Proses ke WhatsApp admin...', 'success').then(function(){
                setTimeout(document.location.href = 'https://api.whatsapp.com/send?phone=6287748110213&text=Halo%20admin,%20$email%20mau%20reset%20password%20nih', 100);
                })
        </script>";
    }
    else {
        echo "
        <script>
            Swal.fire('Gagal', 'Email yang dimasukkan salah atau belum terdaftar!', 'error').then(function(){
                setTimeout(document.location.href = 'forgotpass.php', 100);
                })
        </script>";
    }
    $koneksi->close();

    ?>
</body>

</html>