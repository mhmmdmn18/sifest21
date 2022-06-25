<?php
session_start();  
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/sweetalert2.js"></script>

    <?php
    // menghubungkan dengan koneksi
    include 'koneksi.php';
    
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($koneksi, "SELECT email FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        // cek cookie dan username
        if ($key === hash('sha256', $row['email'])) {
            $_SESSION['login'] = true;
        }
    }

    if (isset($_SESSION["login"])) {
        header("Location: user/index.php");
        exit();
    }
    

    if (isset($_POST["login"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE
                            email = '$email'");
        // cek username 
        if (mysqli_num_rows($result) == 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {

                // set session 
                $_SESSION["login"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["id_user"] = $row['id_user'];
                // Cek remember
                
                echo "<script>
            Swal.fire('Berhasil', 'Berhasil Login!', 'success').then(function(){
                setTimeout(document.location.href = 'user/index.php', 100);
                })
                </script>";
            } else {
                echo "<script>
            Swal.fire('Gagal', 'Email/Password tidak sesuai!', 'error').then(function(){
                setTimeout(document.location.href = 'login.php', 100);
                })
                </script>";
            }
        }
        if (mysqli_num_rows($result) == 0) {
            echo "<script>
            Swal.fire('Gagal', 'Email belum terdaftar!', 'error').then(function(){
                setTimeout(document.location.href = 'login.php', 100);
                })
                </script>";
        }
        $error = true;
    }

    ?>
</body>

</html>