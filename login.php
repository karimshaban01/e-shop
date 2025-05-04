<?php
	
	include 'include/checkuser.php';
	include'include/session_login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/login.css">
	<link rel="shortcut icon" type="text/css" href="./assets/img/logo.jpeg">
	<title>E-CART Shop | Login</title>
</head>
<body>
	<?php if(isset($_POST['login_btn'])){ echo "<div class='error-message'>".$message."</div>";}?>
	<center>
		<div class="form-container">
			<strong><img src="./assets/img/logo.jpeg"></strong><br><br>
			<form method="POST">
				<input type="text" name="username" placeholder="Enter Username" required><br><br>
				<input type="password" name="password" placeholder="Enter Password" required><br><br>
				<input type="submit" name="login_btn" value="Login">
			</form>
			<br><br>
			<a href="register.php?step=first">I Need To Register First</a>
		</div>
	</center>
</body>
</html>