<?php
	
	include 'conn.php';
	$id = $_POST['id'];

	$update = "UPDATE notification_tbl SET action = 'read' WHERE notification_id = '$id'";
	$query = mysqli_query($con,$update);

?>