<?php
	
	include 'include/conn.php';

	session_start();
	$userID = $_SESSION['userID'];
	$time = date("H:i:a, d-m-Y");
	$title = "A new user has registered on your system";
	$body = "hello mr admin a new user has registered in your system, now you are increasing the number of customers in the system";
	$insertadd = "INSERT INTO notification_tbl VALUES(NULL,'admin','$title','$body','$userID','viewprofile','Not-Read','$time')";
	$resultadd = mysqli_query($con,$insertadd);

	if($resultadd == 1){

		header("location:index.php?page=index&pagename=Lyuba Shop | Home");
	}

?>