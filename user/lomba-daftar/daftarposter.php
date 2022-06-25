<?php
session_start();
require "../function.php";
include "../../koneksi.php";
$data = mysqli_fetch_array(data($_GET));
$id = $data['id_user'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Daftar Poster</title>
</head>

<body>
	<link rel="stylesheet" href="../../assets/css/style.css">
	<script src="../../assets/js/sweetalert2.js"></script>
	<?php
	// $kode = crc32($data['email']);
	$ig = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['ig']));
	$sql = "INSERT INTO lombadaftar VALUES ('','$id','poster',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0)";
	$result = mysqli_query($koneksi, $sql);
	if ($result) {
		$querylomba = "SELECT * FROM lombadaftar WHERE id_user = $id AND lomba = 'poster'";
		$resultlomba = mysqli_query($koneksi, $querylomba);
		$rowlomba = mysqli_fetch_assoc($resultlomba);
		$idlombadaftar = $rowlomba['id_lombadaftar'];
		$sql2 = "INSERT INTO poster VALUES ('','$idlombadaftar','$ig','')";
		$result2 = mysqli_query($koneksi, $sql2);
		$_SESSION["id_user"] = $data['id_user'];
		if ($result2) {
			echo "<script>
			Swal.fire('Berhasil', 'Silakan upload bukti untuk proses verifikasi!', 'success').then(function(){
				setTimeout(document.location.href = '../poster.php', 100);
				})
				</script>";
		}
	} else {
		echo "<script>
			Swal.fire('Gagal', 'Silakan ulangi pendaftaran!', 'error').then(function(){
				setTimeout(document.location.href = '../index.php', 100);
				})
				</script>";
	}

	?>
</body>

</html>