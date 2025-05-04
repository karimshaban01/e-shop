<?php
	
	$userID = $_SESSION['adminID'];
	$selectUser = "select * from users_tbl where userID = '$userID'";;
	$queryUser = mysqli_query($con,$selectUser);
	if(mysqli_num_rows($queryUser)> 0){
		while($rowUser = mysqli_fetch_assoc($queryUser)){

			$user_id = $rowUser['userID'];
			$username = $rowUser['username'];
			$phonenumber = $rowUser['phonenumber'];
			$profile = $rowUser['profilepicture'];
			$userStatus = $rowUser['status'];
			$role = $rowUser['role'];
			$passwordCurrent = $rowUser['password'];

			if($rowUser['status'] == "inactive"){

				header("location:include/disabled.php");
			}

			$selectNots = "select count(notification_id) from notification_tbl where userID ='admin' AND action = 'Not-Read'";
			$queryNots = mysqli_query($con,$selectNots);
			if(mysqli_num_rows($queryNots)> 0){
				while($notify = mysqli_fetch_assoc($queryNots)){

					$notiTotal = $notify['count(notification_id)'];
				}
			}
		}
	}
	
?>
<?php
	
	if(!isset($_GET['page'])){

		header("location:?page=index");

	}else if($_GET['page']==""){

		header("location:?page=index");
	}
?>
<?php 
	
	$selectStatus = "select * from system_db";
	$queryStatus = mysqli_query($con,$selectStatus);
	if(mysqli_num_rows($queryStatus)> 0){
		while($statusall = mysqli_fetch_assoc($queryStatus)){

			$systemStatus = $statusall['status'];
		}
	}

?>