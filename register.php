<?php
	
	include 'include/checkuser.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/login.css">
	<link rel="shortcut icon" type="text/css" href="./assets/img/logo.jpeg">
	<title>Lyuba Shop | Register</title>
</head>
<body>
	<?php if(isset($_POST['register_btn'])){ echo "<div class='error-message'>".$message."</div>";}?>
	<center>
		<div class="form-container">
			<strong><img src="./assets/img/logo.jpeg"></strong><br><br>
			<?php
				if($_GET['step']=="first"){
					?>
					<form method="POST">
						<input type="text" name="username" placeholder="Enter Username" required><br><br>
						<input type="number" name="phonenumber" placeholder="Enter Phonenumber" required><br><br>
						<input type="password" name="password" placeholder="Enter Password" required><br><br>
						<input type="submit" name="register_btn" value="Register">
					</form>
					<br><br>
					<a href="login.php">Already Registered</a>
					<?php
				}else if($_GET['step']=="second"){
					if(isset($_SESSION['userID'])){
						?>
						<form method="POST" enctype="multipart/form-data">
							<input type="file" name="image"><br><br>
							<input type="submit" name="upload" value="Upload Profile" accept="image/*"><br><br>
							<div class="skip"><a href="notiuser.php">Skip</a></div>
						</form>
						<?php
					}else{
						header("location:register.php?step=first");
					}

				}else if(!isset($_GET['step'])){
					header("location:register.php?step=first");
				}
			?>
		</div>
	</center>
</body>
</html>