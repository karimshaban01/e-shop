<?php
	
	session_start();

	if(!isset($_SESSION['adminID'])){

		header("location:./?page=logout");

	}else if(!isset($_GET['page'])){

		header('location:./?page=index');
	}
?>