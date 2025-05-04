<?php
		
	if(isset($_POST['addCart'])){

		if(isset($_SESSION['userID'])){

		$userID = $_SESSION['userID'];
		$productID = $_POST['productID'];
		$quantity = $_POST['addCartqn'];

		$selectp = "select * from products_tbl where productID = '$productID'";
		$querySelectp = mysqli_query($con,$selectp);
		if(mysqli_num_rows($querySelectp)> 0){
			while($prodDetail = mysqli_fetch_assoc($querySelectp)){

					$productType = $prodDetail['producttype'];
					$newQuantity = $prodDetail['productquantity'] - $quantity;
					$price = $prodDetail['productprice'] * $quantity;
					$date = date("d-m-Y");

				if($quantity <= $prodDetail['productquantity']){

				$insertOrder = "INSERT INTO orders_tbl VALUES(NULL,'$productID','$productType','$userID','$price','$quantity','none','none','cart','pending','$date')";
				$queryOrder = mysqli_query($con,$insertOrder);

				if($queryOrder == 1){

					$updatePro = "UPDATE products_tbl SET productquantity = '$newQuantity' WHERE productID ='$productID'";
					$queryPro = mysqli_query($con,$updatePro);

					if($queryPro == 1){

						$selectNor = "SELECT * FROM orders_tbl WHERE productID='$productID' AND userID = '$userID' AND productType='$productType' ORDER BY orderID DESC LIMIT 1";
						$queryNor = mysqli_query($con,$selectNor);
						if(mysqli_num_rows($queryNor)> 0){
							while($notification = mysqli_fetch_assoc($queryNor)){


								$orderID = $notification['orderID'];
								$insertTrack = "INSERT INTO track_tbl VALUES(NULL,'$orderID','$userID','$productID','pending')";
								$queryTrack = mysqli_query($con,$insertTrack);

								if($queryTrack == 1){

									echo"<script>alert('Cart Added');</script>";
									echo"<script>location.href = window.location.href;</script>";
								}
							}
						}

					}
				}

				}else{

					echo "<label style='color:red'>Stock Not Enough Product</label>";
				}
			}
		}

	}else{

		echo"<script>location.href = 'login.php?redirect=index.php?page=viewproduct&id=".$_GET['id']."&pagename=".$_GET['pagename']."';</script>";
	}
}

?>