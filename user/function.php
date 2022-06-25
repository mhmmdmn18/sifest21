<?php


$koneksi = mysqli_connect("localhost", "root", "", "sifest");


function data($data)
{
	global $koneksi;

	$email = $_SESSION['email'];
	$query  = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}
function datalombaartikel($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='artikel'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}


function datalombaposter($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='poster'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}


function datalombauiux($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='uiux'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}

function datalombaml($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='ml'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}

function datalombapubgm($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='pubgm'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}

function datalombavalorsolo($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='valorsolo'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}

function datalombavalortim($data)
{
	global $koneksi;

	$id = $_SESSION['id_user'];
	$query  = "SELECT * FROM lombadaftar WHERE id_user = '$id' AND lomba ='valortim'";
	$result = mysqli_query($koneksi, $query);
	return $result;
}

function bukti()
{
    $namaFile = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "no file uploaded";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileBukti/' . $namaFileBaru);

    return $namaFileBaru;
}

function ktm1()
{
    $namaFile = $_FILES['ktm1']['name'];
    $ukuranFile = $_FILES['ktm1']['size'];
    $error = $_FILES['ktm1']['error'];
    $tmpName = $_FILES['ktm1']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "no file uploaded";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function ktm2()
{
    $namaFile = $_FILES['ktm2']['name'];
    $ukuranFile = $_FILES['ktm2']['size'];
    $error = $_FILES['ktm2']['error'];
    $tmpName = $_FILES['ktm2']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function ktm3()
{
    $namaFile = $_FILES['ktm3']['name'];
    $ukuranFile = $_FILES['ktm3']['size'];
    $error = $_FILES['ktm3']['error'];
    $tmpName = $_FILES['ktm3']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function ktm4()
{
    $namaFile = $_FILES['ktm4']['name'];
    $ukuranFile = $_FILES['ktm4']['size'];
    $error = $_FILES['ktm4']['error'];
    $tmpName = $_FILES['ktm4']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function ktm5()
{
    $namaFile = $_FILES['ktm5']['name'];
    $ukuranFile = $_FILES['ktm5']['size'];
    $error = $_FILES['ktm5']['error'];
    $tmpName = $_FILES['ktm5']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function sel1()
{
    $namaFile = $_FILES['sel1']['name'];
    $ukuranFile = $_FILES['sel1']['size'];
    $error = $_FILES['sel1']['error'];
    $tmpName = $_FILES['sel1']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "no file uploaded";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function sel2()
{
    $namaFile = $_FILES['sel2']['name'];
    $ukuranFile = $_FILES['sel2']['size'];
    $error = $_FILES['sel2']['error'];
    $tmpName = $_FILES['sel2']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function sel3()
{
    $namaFile = $_FILES['sel3']['name'];
    $ukuranFile = $_FILES['sel3']['size'];
    $error = $_FILES['sel3']['error'];
    $tmpName = $_FILES['sel3']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function sel4()
{
    $namaFile = $_FILES['sel4']['name'];
    $ukuranFile = $_FILES['sel4']['size'];
    $error = $_FILES['sel4']['error'];
    $tmpName = $_FILES['sel4']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function sel5()
{
    $namaFile = $_FILES['sel5']['name'];
    $ukuranFile = $_FILES['sel5']['size'];
    $error = $_FILES['sel5']['error'];
    $tmpName = $_FILES['sel5']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $gambar = "";
        return $gambar;
    }

    //cek apakah gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            Swal.fire('Bukan gambar yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran gambar
    if ($ukuranFile > 2000000) { //2MB
        echo "<script>
        Swal.fire('Ukuran gambar terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../index.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../fileKTM/' . $namaFileBaru);

    return $namaFileBaru;
}

function fileArtikel()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    //cek apakah tidak ada file yang diupload
    if ($error === 4) {
        $file = "";
        return $file;
    }

    //cek apakah dokumen atau bukan
    $ekstensiFileValid = ['doc', 'docx'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
            Swal.fire('Bukan dokumen yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../artikel.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran file
    if ($ukuranFile > 5000000) { //5MB
        echo "<script>
        Swal.fire('Ukuran file terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../artikel.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, file siap diupload
    //generate nama file baru
    $namaFileBaru = uniqid() . "_" . $namaFile;

    move_uploaded_file($tmpName, '../fileArtikel/' . $namaFileBaru);

    return $namaFileBaru;
}

function filePoster()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    //cek apakah tidak ada file yang diupload
    if ($error === 4) {
        $file = "";
        return $file;
    }

    //cek apakah dokumen atau bukan
    $ekstensiFileValid = ['doc', 'docx'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
            Swal.fire('Bukan dokumen yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../poster.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran file
    if ($ukuranFile > 10000000) { //10MB
        echo "<script>
        Swal.fire('Ukuran file terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../poster.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, file siap diupload
    //generate nama file baru
    $namaFileBaru = uniqid() . "_" . $namaFile;

    move_uploaded_file($tmpName, '../filePoster/' . $namaFileBaru);

    return $namaFileBaru;
}

function fileUIUX()
{
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    //cek apakah tidak ada file yang diupload
    if ($error === 4) {
        $file = "";
        return $file;
    }

    //cek apakah dokumen atau bukan
    $ekstensiFileValid = ['doc', 'docx'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "<script>
            Swal.fire('Bukan dokumen yang diupload!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../uiux.php', 100);
            })
            </script>";
        die;
    }

    //cek ukuran file
    if ($ukuranFile > 10000000) { //10MB
        echo "<script>
        Swal.fire('Ukuran file terlalu besar!', '.', 'error').then(function(){
            setTimeout(document.location.href = '../uiux.php', 100);
            })
            </script>";
        die;
    }

    //lolos pengecekan,, file siap diupload
    //generate nama file baru
    $namaFileBaru = uniqid() . "_" . $namaFile;

    move_uploaded_file($tmpName, '../fileUIUX/' . $namaFileBaru);

    return $namaFileBaru;
}

function crc16($string) {
  $crc = 0xFFFF;
  for ($x = 0; $x < strlen ($string); $x++) {
    $crc = $crc ^ ord($string[$x]);
    for ($y = 0; $y < 8; $y++) {
      if (($crc & 0x001) == 0x001) {
        $crc = (($crc >> 1) ^ 0xA01);
      } else { $crc = $crc >> 1; }
    }
  }

  $jum = strlen($crc);
  if($jum < 4) {
    $crc = sprintf("%04d", $crc);
  }

  return $crc;
}

// function crc16($string) {
//   $crc = 0xFFFF;
//   for ($x = 0; $x < strlen ($string); $x++) {
//     $crc = $crc ^ ord($string[$x]);
//     for ($y = 0; $y < 8; $y++) {
//       if (($crc & 0x0001) == 0x0001) {
//         $crc = (($crc >> 1) ^ 0xA001);
//       } else { $crc = $crc >> 1; }
//     }
//   }
//   return $crc;
// }
