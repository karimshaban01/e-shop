<?php
	
	if(isset($_POST['CompleteOrder'])){

		$location = $_POST['location'];
		$phonenumber = $_POST['phonenumber'];
		$time = date("H:i:a, d-m-Y");


		$updateAdd = "UPDATE orders_tbl SET locationArrived = '$location', phonenumber = '$phonenumber', status = 'ordered' WHERE userID = '$userID' AND status='cart'";
		$queryAdd = mysqli_query($con,$updateAdd);

		if($queryAdd == 1){

			$title = "Congratulations, you have received a new product order";
			$body = "you have received a new product order ".$productname." from a customer ".$username." with the number of products ".$qnorder." to be delivered ".$location." and his contact is click to view more";
			$insertNot = "INSERT INTO notification_tbl VALUES(NULL,'admin','$title','$body','$orderid','viewOrderDetail','Not-Read','$time')";
			$resultNot = mysqli_query($con,$insertNot);

			if($resultNot == 1){

				if($newsq <= 5){

					$title = "Product remain ".$newsq;
					$body = "Hello Admin Product ".$productname." remain ".$newsq." please remove if no one in store or add if have";
					$insertadd = "INSERT INTO notification_tbl VALUES(NULL,'admin','$title','$body','$productID','productsDetails','Not-Read','$time')";
					$resultadd = mysqli_query($con,$insertadd);

				}
				echo"<script>alert('Order Added');</script>";
				echo"<script>location.href = window.location.href;</script>";
			}
		}
	}
?>