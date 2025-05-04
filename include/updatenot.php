<?php
	
	include 'conn.php';
	$id = $_GET['id'];

	$update = "UPDATE notification_tbl SET action = 'read' WHERE notification_id = '$id'";
	$query = mysqli_query($con,$update);

	if($query == 1){

		header("location:".$_SERVER['HTTP_REFERER']);
	}
?>