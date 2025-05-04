<?php
	
	include 'conn.php';

	$id = $_GET['Oid'];
	$quantity = $_GET['qns'];
	$productID = $_GET['pid'];

	$delete = "DELETE FROM orders_tbl WHERE orderID = '$id'";
	$query = mysqli_query($con,$delete);

	if($query == 1){

		$update = "UPDATE products_tbl SET productquantity = '$quantity' WHERE productID = '$productID'";
		$result = mysqli_query($con,$update);
		if($result == 1){

			header("location:".$_SERVER['HTTP_REFERER']);
		}
	}

?>