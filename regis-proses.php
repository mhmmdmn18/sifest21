<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>

<body>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert2.js"></script>

    <?php

    include 'koneksi.php';
    require "user/function.php";

    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
    $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
    $univ = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['univ']));
    $wa = htmlspecialchars($_POST['wa']);
    date_default_timezone_set('Asia/Jakarta');
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $_POST["password2"]);
    $waktu = date('Y-m-d H:i:s');
    $kode = crc16(htmlspecialchars($_POST['email']));
    $referral = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['referral']));

    // cek username sudah ada atau belum
    $cekuser = mysqli_query($koneksi, "SELECT email FROM user WHERE email ='$email'");
    if (mysqli_fetch_assoc($cekuser)) {
        echo "
        <script>
            Swal.fire('Gagal', 'Email Sudah Terdaftar!', 'error').then(function(){
                setTimeout(document.location.href = 'register.php', 100);
                })
                </script>
        ";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "
        <script>
            Swal.fire('Gagal', 'Password Tidak Sama!', 'error').then(function(){
                setTimeout(document.location.href = 'register.php', 100);
                })
                </script>
        ";
        return false;
    }
    // enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user VALUES ('','$nama','$email','$univ','$password','$wa','$kode','$referral','$waktu')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>
			Swal.fire('Berhasil', 'Silakan Login!', 'success').then(function(){
				setTimeout(document.location.href = 'login.php', 100);
				})
				</script>";
    } else {
        echo "<script>
			Swal.fire('Gagal', 'Gagal Mendaftar!', 'error').then(function(){
				setTimeout(document.location.href = 'register.php', 100);
				})
				</script>";
    }

    ?>

</body>

</html>