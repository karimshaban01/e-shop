<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lyuba shop | Disabled Account</title>
	<style type="text/css">
		body{
			padding: 0px;
			margin: 0px;
			background-color: whitesmoke;
			font-family: 'Trebuchet MS', sans-serif;
		}
		.divNom{
			padding: 12px;
			margin-top: 100px;
			border-radius: 4px;
			width: 45%;
			font-size: 20px;
			transition: 0.4s;
			background-color: white;
			box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
		}
		.divNom a{
			text-decoration: none;
			color: white;
		}
		.divNom label{
			padding: 12px;
			background-color: #ea5051;
			color: white;
			border-radius: 4px;
			cursor: pointer;
		}
		@media (max-width: 800px){

			.divNom{
				width: 90%;
				font-size: 10px;
				margin-top: 20px;
			}
		}
	</style>
</head>
<body>
	<center>
		<div class="divNom">
			<h1>
				Your account has been disabled, please contact the admin to open your account<br><br>
				<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/lyubashop/admin/?page=logout"><label>Logout</label></a>
			</h1>
		</div>
	</center>
</body>
</html>