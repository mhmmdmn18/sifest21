<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register | SI FEST 2021</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="assets/img/logo.png"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link href="assets/vendor/font-awesome/css/all.min.css" rel="stylesheet">
<!--===============================================================================================-->
  <!-- <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css"> -->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('assets/img/background/loreg-bg.jpg');">
      <div class="wrap-login100">
        <form action="regis-proses.php" class="login100-form validate-form" method="post">
          <a href="index.php" class="back"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>

          <span class="login100-form-logo">
            <img src="assets/img/logo.png" alt="logo">
          </span>

          <span class="login100-form-title p-b-34 p-t-27">Register</span>

          <div class="wrap-input100 validate-input nama fas" data-validate = "Enter full name">
            <input class="input100" type="text" name="nama" placeholder="Nama Lengkap" required>
            <span class="focus-input100 fas" data-placeholder="&#xf007;"></span>
          </div>

          <div class="wrap-input100 validate-input email fas" data-validate = "Enter valid email: ex@abc.xyz">
            <input class="input100" type="email" name="email" placeholder="Email" required>
            <span class="focus-input100 fas" data-placeholder="&#xf0e0;"></span>
          </div>

          <div class="wrap-input100 validate-input instansi fas" data-validate = "Enter instance origin">
            <input class="input100" type="text" name="univ" placeholder="Asal Universitas/Sekolah/Lainnya" required>
            <span class="focus-input100 fas" data-placeholder="&#xf19c;"></span>
          </div>

          <div class="strip"><span>Isi dengan tanda strip (-) jika tidak ada</span></div>
          <br>

          <div class="wrap-input100 validate-input no-wa fas" data-validate = "Enter valid WhatsApp number: 628xxx">
            <input class="input100" type="telp" name="wa" placeholder="Nomor WhatsApp (ex: 628xxx)" maxlength="14" required>
            <span class="focus-input100 fab" data-placeholder="&#xf232;"></span>
          </div>

          <div class="wrap-input100 password">  
            <div class="wrap-input50 validate-input fas" data-validate="Enter password">
              <input class="input100 pass" type="password" name="password" placeholder="Password" minlength="8" required>
              <span class="focus-input100 fas" data-placeholder="&#xf023;"></span>
            </div>
            <span class="line-pass"></span>
            <div class="wrap-input50 validate-input fas" data-validate="Enter password again">
              <input class="input100 pass" id="cm-pass" type="password" name="password2" placeholder="Konfirmasi Password" required>
              <span class="focus-input100"></span>
            </div>
          </div>

          <div class="contact100-form-checkbox">
            <input class="btn-show-pass input-checkbox100" id="ckb1" type="checkbox" name="show-pass">
            <label class="label-checkbox100 fas" for="ckb1">
              Show password
            </label>
          </div>
          <br>
          <div class="wrap-input100 referral fas">
            <input class="input100" type="text" name="referral" placeholder="Kode Referral (isi jika ada)">
            <span class="focus-input100 fas" data-placeholder="&#xe068;"></span>
          </div>
          
          <div class="contact100-form-checkbox mt-3" data-validate="Check the box">
            <input class="input-checkbox100" id="ckb2" type="checkbox" name="validate-data" required>
            <label class="label-checkbox100 fas" for="ckb2">
              Saya telah mengisi data dengan benar
            </label>
          </div>

          <div class="contact100-form-checkbox cb-down" data-validate="Check the box">
            <input class="input-checkbox100" id="ckb3" type="checkbox" name="auto-webinar" required>
            <label class="label-checkbox100 fas" for="ckb3">
              Dengan mendaftar akun, saya akan terdaftar sebagai peserta Webinar SI FEST 2021 (FREE HTM !!!)
            </label>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="submit">
              Register
            </button>
          </div>

          <div class="text-center p-t-75">
            <a class="txt1" href="login.php">
              Already have an Account? Login
              <i class="fas fa-long-arrow-alt-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/js/login.js"></script>

</body>
</html>