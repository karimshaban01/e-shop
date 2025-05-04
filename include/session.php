<?php
	session_start();
	
	if (!isset($_SESSION['userID'])) {
		
		header("location:preview.php?page=index&pagename=Lyuba Shop | Home");
	}
?>

<?php 
	
	if((!isset($_GET['pagename']))OR(!isset($_GET['page']))){

		header("location:index.php?page=index&pagename=Lyuba Shop | Home");

	}else if(($_GET['pagename'] == "") OR($_GET['page'] == "")){

		header("location:index.php?page=index&pagename=Lyuba Shop | Home");

	}

?>