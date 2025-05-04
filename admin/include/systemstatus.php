<?php
	
	include 'conn.php';
	if($_GET['status'] =="off"){

		$update = "update system_db set status='on'";
		$query = mysqli_query($con,$update);

		if($query == 1){

			header("location:".$_SERVER['HTTP_REFERER']);
		}


	}else if($_GET['status']=="on"){

		$update = "update system_db set status='off'";
		$query = mysqli_query($con,$update);

		if($query == 1){

			header("location:".$_SERVER['HTTP_REFERER']);
		}

	}
?>