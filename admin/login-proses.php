<?php
session_start();
    
?>
 
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Page</title>
</head>
<body>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/sweetalert2.js"></script>

    <?php
    // menghubungkan dengan koneksi
    include "../koneksi.php";
  
    if ($_POST["username"] == "adminlomba" and $_POST["password"] == "adminlomba123") {
        $_SESSION["admin1"] = true;
        echo "<script>
		Swal.fire('Berhasil', 'Semangat Guys!', 'success').then(function(){
			setTimeout(document.location.href = 'lomba/index.php', 100);
			})
			</script>";
    }
    else if ($_POST["username"] == "adminseminar" and $_POST["password"] == "adminseminar123") {
        $_SESSION["admin2"] = true;
        echo "<script>
        Swal.fire('Berhasil', 'Semangat Guys!', 'success').then(function(){
            setTimeout(document.location.href = 'seminar/index.php', 100);
            })
            </script>";
    }
    else if ($_POST["username"] == "adminpti" and $_POST["password"] == "adminpti123") {
        $_SESSION["admin3"] = true;
        echo "<script>
        Swal.fire('Berhasil', 'Semangat Guys!', 'success').then(function(){
            setTimeout(document.location.href = 'pti/index.php', 100);
            })
            </script>";
    }
    else if ($_POST["username"] == "admininti" and $_POST["password"] == "admininti123") {
        $_SESSION["admin4"] = true;
        echo "<script>
        Swal.fire('Berhasil', 'Semangat Guys!', 'success').then(function(){
            setTimeout(document.location.href = 'inti/index.php', 100);
            })
            </script>";
    }
    else if ($_POST["username"] == "adminmarketing" and $_POST["password"] == "adminmarketing123") {
        $_SESSION["admin5"] = true;
        echo "<script>
        Swal.fire('Berhasil', 'Semangat Guys!', 'success').then(function(){
            setTimeout(document.location.href = 'marketing/index.php', 100);
            })
            </script>";
    }
    else {
        echo "<script>
        Swal.fire('Gagal', 'Username/Password tidak sesuai!', 'error').then(function(){
            setTimeout(document.location.href = 'index.php', 100);
            })
            </script>";
    }
    $error = true;
    ?>
</body>

</html>