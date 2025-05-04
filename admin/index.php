<?php 
	
	include 'include/conn.php';
	include'include/session.php';
	include'include/userData.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/lyubashop/assets/css/adminIndex.css">
	<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/lyubashop/assets/java/min.js"></script>
	<link rel="shortcut icon" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/lyubashop/assets/img/logo.jpeg">
	<title>E-CART Shop | Admin Dashboard</title>
</head>
<body>
	<div class="header">
		<table width="100%">
			<tr>
				<td><strong>E-CART Shop</strong></td>
				<td>
					<form method="POST">
						<input type="text" name="searchBox" placeholder="Search" required>
						<input type="submit" name="searchBtn" style="display: none;">
					</form>
				</td>
				<td>
					<table class="td-Profile">
						<tr>
							<td><?php echo $username;?></td>
							<td><img src="./upload/<?php echo $profile; ?>"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div class="container-body">
		<div class="link">
			<br><br>
			<ul>
				<a href="?page=index"><li class="index">Dashboard</li></a>
				<a href="?page=products"><li class="products">Products</li></a>
				<a href="?page=orders"><li class="orders">Orders</li></a>
				<a href="?page=users"><li class="users">Users</li></a>
				<a href="?page=notification"><li class="notification">Notification <?php if($notiTotal >0){echo"<label><center>".$notiTotal."</center></label>";}?></li></a>
				<a href="?page=profile"><li class="profile">Profile</li></a>
				<a href="?page=setting"><li class="setting">Setting</li></a>
				<a href="?page=logout"><li>Logout</li></a>
			</ul>
		</div>
		<div class="result-Container">
			
			<?php

				include "pages/".$_GET['page'].".php";
			?>
		</div>
	</div>
</body>
</html>

<?php
		
		if(isset($_POST['searchBtn'])){

			$searchBox = $_POST['searchBox'];

			echo "<script>location.href='?page=search&engine=product&q=".$searchBox."';</script>";

		}

?>
<style type="text/css">
	.<?php echo $_GET['page'];?>{
	background-color: #ea5050;
	color: white;	
	transition: 0.3s;
	}
</style>