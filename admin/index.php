<?php
setcookie('id','',time()- 3600);
setcookie('key','', time()-3600);

    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin | SI FEST 2021</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/login-admin.css">
</head>
<body>

<form action="login-proses.php" method="post"> 
	<div class="sijpg">
		<div class="login">
  			<h2>Semangat Guys!</h2>
  			<div class="group12">
  				<input type="text" name="username" required>
  				<span>Username</span>
  			</div>
  			<div class="group12">
  				<input type="password" name="password" required>
  				<span>Password</span>
  			</div>
  			<div class="group12">
  				<input type="submit" name="login" value="Login">
  			</div>
		</div>
	</div>
</form>


</body>
</html>