<?php
	
	$userID = $_SESSION['userID'];

	$selectUser = "SELECT * FROM users_tbl WHERE userID = '$userID'";
	$queryUser = mysqli_query($con,$selectUser);
	if(mysqli_num_rows($queryUser)> 0){
		while($userInfo = mysqli_fetch_assoc($queryUser)){

			$username = $userInfo['username'];
			$phonenumber = $userInfo['phonenumber'];
			$profile = $userInfo['profilepicture'];
			$role = $userInfo['role'];
			$status = $userInfo['status'];

			if($status == "inactive"){

				header("location:include/userdisabled.php");
			}

			$selectCart = "SELECT count(orderID) FROM orders_tbl WHERE userID ='$userID' AND status='cart'";
			$queryCart = mysqli_query($con,$selectCart);
			if(mysqli_num_rows($queryCart)> 0){
				while($cartList = mysqli_fetch_assoc($queryCart)){

					$cart = $cartList['count(orderID)'];
				}

			}

			$selectNots = "select count(notification_id) from notification_tbl where userID ='$userID' AND action = 'Not-Read'";
			$queryNots = mysqli_query($con,$selectNots);
			if(mysqli_num_rows($queryNots)> 0){
				while($notify = mysqli_fetch_assoc($queryNots)){

					$notiTotal = $notify['count(notification_id)'];
				}
			}
		}
	}else{

		header("location:pages/logout.php");
	}

?>