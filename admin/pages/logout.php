<?php
	
	session_start();
	session_unset();
	session_destroy();

	header("location:http://".$_SERVER['SERVER_NAME']."/lyubashop/login.php");
?>