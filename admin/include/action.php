<?php
	
	include 'conn.php';

	if($_GET['pg'] == "users"){

		$userId = $_GET['u'];

		if($_GET['action'] =="deactivate"){

			$update = "update users_tbl set status = 'inactive' where userID = '$userId'";
			$query = mysqli_query($con,$update);

			if($query == 1){

				header("location:".$_SERVER['HTTP_REFERER']);
			}

		}else if($_GET['action'] == "activate"){

			$update = "update users_tbl set status = 'active' where userID = '$userId'";
			$query = mysqli_query($con,$update);

			if($query == 1){

				header("location:".$_SERVER['HTTP_REFERER']);
			}

		}else if($_GET['action'] == "delete"){

			$delete = "delete from users_tbl where userID = '$userId'";
			$query = mysqli_query($con,$delete);

			if($query == 1){

				header("location:".$_SERVER['HTTP_REFERER']);
			}

		}
	}elseif ($_GET['pg'] == "type") {
			
			$tid = $_GET['u'];
			$delete = "delete from types_tbl where typeId = '$tid'";
			$query = mysqli_query($con,$delete);

			if($query == 1){

				header("location:".$_SERVER['HTTP_REFERER']);
			}
	}else if($_GET['pg'] == "product"){

			$pid = $_GET['u'];
			$delete = "delete from products_tbl where productID = '$pid'";
			$query = mysqli_query($con,$delete);

			if($query == 1){

				header("location:".$_SERVER['HTTP_REFERER']);
			}

	}

?>