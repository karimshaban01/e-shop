<?php
	

	if(isset($_SESSION['userID'])){

		header("location:index.php?page=index&pagename=Lyuba Shop | Home");

	}else if(isset($_SESSION['adminID'])){

		header('location:admin/?page=index');
	}
?>