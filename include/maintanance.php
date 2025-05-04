<?php
	include 'conn.php';
	$selectSystemStatus = "select * from system_db";
	$querySystemStatus = mysqli_query($con,$selectSystemStatus);
	if(mysqli_num_rows($querySystemStatus)> 0){
		while($systemStatus = mysqli_fetch_assoc($querySystemStatus)){

			if($systemStatus['status']== "on"){

				header("location:http://".$_SERVER['SERVER_NAME']."/lyubashop/");
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="text/css" href="./assets/img/logo.jpeg">
	<title>System Maintanance</title>
	<style type="text/css">
		body{
			padding: 0px;
			margin: 0px;
			background-color: whitesmoke;
		}
		.maintanaceDivMessage{
			background-color: white;
			width: 80%;
			padding: 12px;
			border-radius: 4px;
			margin-top: 70px;
		}
	</style>
</head>
<body>
	<center>
		<div class="maintanaceDivMessage">
			<h1>
				Oops!! system busy Developer Continue with maintanance
			</h1>
		</div>
	</center>
</body>
</html>