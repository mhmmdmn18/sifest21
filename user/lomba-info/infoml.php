<?php
include "../../koneksi.php";
require "../function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data ML</title>
</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/sweetalert2.js"></script>
    <?php
    if (isset($_POST["submit"])) {
        $id1     = htmlspecialchars($_POST['id1']);
        $id2     = htmlspecialchars($_POST['id2']);
        $id3     = htmlspecialchars($_POST['id3']);
        $id4     = htmlspecialchars($_POST['id4']);
        $id5     = htmlspecialchars($_POST['id5']);

        $server1 = htmlspecialchars($_POST['server1']);
        $server2 = htmlspecialchars($_POST['server2']);
        $server3 = htmlspecialchars($_POST['server3']);
        $server4 = htmlspecialchars($_POST['server4']);
        $server5 = htmlspecialchars($_POST['server5']);

        $id_lombadaftar    = $_POST['id_lombadaftar'];

        $query = "UPDATE ml SET 
                id1 = '$id1', server1 = '$server1', 
                id2 = '$id2', server2 = '$server2', 
                id3 = '$id3', server3 = '$server3', 
                id4 = '$id4', server4 = '$server4', 
                id5 = '$id5', server5 = '$server5'
                WHERE ml.id_lombadaftar = '$id_lombadaftar' ";

        $hasil = mysqli_query($koneksi, $query);
        if ($hasil) {
            echo "
                <script>
                    Swal.fire('Berhasil', 'Data berhasil dikirim!', 'success').then(function(){
                        setTimeout(document.location.href = '../ml.php', 100);
                        })
                </script>";
        } else {
            echo "
                <script>
                    Swal.fire('Gagal', 'Data gagal dikirim!', 'error').then(function(){
                        setTimeout(document.location.href = '../ml.php', 100);
                        })
                </script>";
        }
        $koneksi->close();
    }
    ?>
</body>

</html>