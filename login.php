<?php
setcookie('id','',time()- 3600);
setcookie('key','', time()-3600);

    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | SI FEST 2021</title>
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
        <form action="login-proses.php" class="login100-form validate-form" method="post">
          <a href="index.php" class="back"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>

          <span class="login100-form-logo">
            <img src="assets/img/logo.png" alt="logo">
          </span>

          <span class="login100-form-title p-b-34 p-t-27">Login</span>

          <div class="wrap-input100 validate-input email fas" data-validate = "Enter valid email: ex@abc.xyz">
            <input class="input100" type="email" name="email" placeholder="Email" required>
            <span class="focus-input100 fas" data-placeholder="&#xf0e0;"></span>
          </div>

          <div class="wrap-input100 validate-input password2 fas" data-validate="Enter password">
            <input class="input100 pass" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100 fas" data-placeholder="&#xf023;"></span>
          </div>

          <div class="contact100-form-checkbox cb-down">
            <input class="btn-show-pass input-checkbox100" id="ckb1" type="checkbox" name="show-pass">
            <label class="label-checkbox100 fas" for="ckb1">
              Show password
            </label>

            <a class="txt1" href="forgotpass.php">
              Forgot password?
            </a>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="login">
              Log In
            </button>
          </div>

          <div class="text-center p-t-75">
            <a class="txt1" href="register.php">
              Don't have an Account? Register
              <i class="fas fa-long-arrow-alt-right m-l-5" aria-hidden="true"></i>
              <!-- Don't have Account? Register Now -->
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