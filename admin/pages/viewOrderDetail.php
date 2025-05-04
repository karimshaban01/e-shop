<?php
	
	$orderID = $_GET['oid'];

	$selectOrder = "select * from orders_tbl where orderID = '$orderID'";
	$queryOrder = mysqli_query($con,$selectOrder);
	if(mysqli_num_rows($queryOrder)> 0){
		while($orders = mysqli_fetch_assoc($queryOrder)){

			$productID = $orders['productID'];
			$uID = $orders['userID'];

			$selectProduct = "select * from products_tbl where productID = '$productID'";
			$queryProduct = mysqli_query($con,$selectProduct);
			if(mysqli_num_rows($queryProduct)> 0){
				while($product = mysqli_fetch_assoc($queryProduct)){

					$selectUsers = "select * from users_tbl where userID = '$uID'";
					$queryUsers = mysqli_query($con,$selectUsers);
					if(mysqli_num_rows($queryUsers)> 0){
						while($users = mysqli_fetch_assoc($queryUsers)){
							?>
<div class="ordersDiv">
	<strong>Order Details</strong><hr>
	<table width="100%" class="tblOrder">
		<tr>
			<td>
				<img src="imageProducts/<?php echo $product['productimage']?>"><br>
				<?php echo $product['productname'];?>
			</td>
			<td>
				<strong>Product Type: </strong><?php echo $product['producttype']; ?><br><br>
				<strong>Quantity Ordered: </strong><?php echo $orders['quantity']; ?><br><br>
				<strong>Amount Cost: </strong> Tsh<?php echo number_format($orders['price']); ?>
			</td>
			<td>
				<strong>Location Arrived: </strong><?php echo $orders['locationArrived']; ?><br><br>
				<strong>Phonenumber Calling: </strong><?php echo $orders['phonenumber']; ?><br><br>
				<strong>Status: </strong><?php echo $orders['action']; ?>
			</td>
			<td>
				<strong>Date Ordered: </strong><?php echo $orders['dateAded']; ?><br><br>
				<?php
					if($orders['action'] =="pending"){
						?>
						<a href="include/desion.php?action=accept&oid=<?php echo $orders['orderID']?>&uid=<?php echo $users['userID']?>&pid=<?php echo $product['productID']?>"><label class="acceptOrder">Accept</label></a><br><br><br>
						<a href="include/desion.php?action=declined&oid=<?php echo $orders['orderID']?>&uid=<?php echo $users['userID']?>&pid=<?php echo $product['productID']?>"><label class="declineOrder">Decline</label></a>
						<?php
					}else if($orders['action'] == "accept"){
						?>
						<a href="include/desion.php?action=outgoing&oid=<?php echo $orders['orderID']?>&uid=<?php echo $users['userID']?>&pid=<?php echo $product['productID']?>"><label class="deliverP">Start Deliver</label></a>
						<?php
					}else if($orders['action'] == "declined"){
						?>
						<p style="color:red">This Order Was Declined</p>
						<?php
					}else if($orders['action'] == "outgoing"){
						?>
						<a href="include/desion.php?action=completed&oid=<?php echo $orders['orderID']?>&uid=<?php echo $users['userID']?>&pid=<?php echo $product['productID']?>"><label class="completeBtn">Complete Order</label></a>
						<?php
					}else if($orders['action'] == "completed"){
						?>
						<p style="color:green;">This Order Is completed</p>
						<?php
					}
				?>
			</td>
		</tr>
	</table>
</div><br><br>
<div class="ordersDiv">
	<strong>User Details</strong><hr>
	<table width="100%" class="tblUser">
		<tr>
			<td>
				<img src="upload/<?php echo $users['profilepicture'];?>">
			</td>
			<td>
				<strong>Username: </strong><?php echo $users['username'];?><br><br>
				<strong>Phonenumber: </strong><?php echo $users['phonenumber'];?><br><br>
				<strong>Status: </strong><?php echo $users['status'];?>
			</td>
			<td>
				<a href="?page=viewprofile&userid=<?php echo $users['userID'];?>"><label class="viewUserProfiles">Visit Profile</label></a>
			</td>
		</tr>
	</table>
</div><br><br>
<div class="ordersDiv">
	<strong>Produuct Details (<?php echo $product['productname'];?>)</strong><hr>

	<table width="100%">
		<tr>
			<td width="35%">
				<div class="imgProductDetails">
					<img src="./imageProducts/<?php echo $product['productimage'];?>">
				</div>
			</td>
			<td>
				<strong>Product Name :</strong> <?php echo $product['productname'];?><br>
				<strong>Product Type :</strong> <?php echo $product['producttype'];?><br>
				<strong>Product Quantity :</strong> <?php echo $product['productquantity'];?><br>
				<strong>Product Price :</strong> Tsh <?php echo number_format($product['productprice']);?>/=<br>
				<strong>Product Uploaded Date :</strong> <?php echo $product['uploadeddate'];?><br><br>
				<strong>Product Description :</strong> 
			</td>
			<td>
				<a style="text-decoration: none;" href="?page=productsDetails&pid=<?php echo $product['productID']?>"><label class="viewProductDt">View Product</label></a>
			</td>
		</tr>
	</table>
		
</div>
							<?php
						}
					}
				}
			}
		}
	}else{

		echo"<center>This Order Not found</center>";
	}

?>

<script>
	function opendesc() {
		document.getElementById('previewDesc').style.height = "60vh"; 
		document.getElementById('previewDesc').style.padding = "12px";
		document.getElementById('previewDesc').style.overflow = "auto";
	}

	function closedesc(){

		document.getElementById('previewDesc').style.height = "0vh"; 
		document.getElementById('previewDesc').style.padding = "0px";
		document.getElementById('previewDesc').style.overflow = "none";
	
	}
</script>