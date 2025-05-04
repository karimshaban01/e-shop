<?php
	
	include 'conn.php';
	$action = $_GET['action'];
	$oid = $_GET['oid'];
	$uid = $_GET['uid'];
	$pid = $_GET['pid'];
	$time = date("H:i:a, d-m-Y");

	$update = "UPDATE orders_tbl SET action = '$action' where orderID = '$oid'";
	$query = mysqli_query($con,$update);

	if($query == 1){

		if($action == "accept"){

			$title = "Congratulations, Your order was Accepted By Admin";
			$body = "we receive your order please waiting for deliver of your order up to your place. thank for choose us";

		}else if($action == "declined"){


			$title = "Sorry, Your order was Declined By Admin";
			$body = "we declined your order due the some issue . thank for choose us";

		}else if($action == "outgoing"){

			$title = "Congratulations, Your order was start to deliver in your location";
			$body = "Our team start to deliver your product in place you put please stay online we contact when arrived. thank for choose us";
			
		}else if($action == "completed"){

			$title = "Congratulations, Your Order Was Complete";
			$body = "Now your product is on your place thanks for choose us keep make more order with us ";
		}


			
			$insertNot = "INSERT INTO notification_tbl VALUES(NULL,'$uid','$title','$body','$oid','viewOrderDetail','Not-Read','$time')";
			$resultNot = mysqli_query($con,$insertNot);

			if($resultNot == 1){

				$insert = "INSERT INTO track_tbl VALUES(NULL,'$oid','$uid','$pid','$action')";
				$result = mysqli_query($con,$insert);

				if($result == 1){

					header("location:".$_SERVER['HTTP_REFERER']);
				}
			}
	}
?>