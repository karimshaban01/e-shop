<?php
	
	if(!isset($_GET['pid']) OR ($_GET['pid'] =="")){

		header("location:?page=products");
	}
?>

<div class="productDetailsView">
	<?php

		$pid = $_GET['pid'];

		$selectProduct = "select * from products_tbl where productID = '$pid'";
		$queryProduct = mysqli_query($con,$selectProduct);
		if(mysqli_num_rows($queryProduct)> 0){
			while($productDetails = mysqli_fetch_assoc($queryProduct)){
				?>
				<strong>View Product(<?php echo $productDetails['productname'];?>)</strong><hr>
				<table width="100%">
					<tr>
						<td width="35%">
							<div class="imgProductDetails">
								<img src="./imageProducts/<?php echo $productDetails['productimage'];?>">
							</div>
						</td>
						<td>
							<strong>Product Name :</strong> <?php echo $productDetails['productname'];?><br>
							<strong>Product Type :</strong> <?php echo $productDetails['producttype'];?><br>
							<strong>Product Quantity :</strong> <?php echo $productDetails['productquantity'];?><br>
							<strong>Product Price :</strong> Tsh <?php echo number_format($productDetails['productprice']);?>/=<br>
							<strong>Product Uploaded Date :</strong> <?php echo $productDetails['uploadeddate'];?><br><br>
							<strong>Product Description :</strong> <label onclick="opendesc()" class="descpro">View</label><br>
							<div class="previewDesc" id="previewDesc">
								<strong>Description <label class="close" onclick="closedesc()">Close</label></strong><hr>
								<?php echo $productDetails['productdescription'];?>
							</div>
						</td>
						<td>
							<a href="?page=editproduct&pid=<?php echo $productDetails['productID'];?>"><label class="activate">Edit</label></a><br><br>
							<a href="include/action.php?&pg=product&u=<?php echo $productDetails['productID'];?>"><label class="deletebtn">Delete</label></a>
						</td>
					</tr>
				</table>
				<?php
			}
		}else{

			header("location:?page=products");
		}
	?>
</div><br>
<div class="viewUserProfile">
	<strong>Orders Details</strong><hr>
	<table width="100%" class="orderDetails">
		<tr>
			<td>
				<?php

					$selectAll = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid'";
					$queryAll = mysqli_query($con,$selectAll);
					if(mysqli_num_rows($queryAll)> 0){
						while($orderall = mysqli_fetch_assoc($queryAll)){
							?>
							All Orders -><?php echo $orderall['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($orderall['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $orderall['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectcart = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='cart' and action='pending'";
					$querycart = mysqli_query($con,$selectcart);
					if(mysqli_num_rows($querycart)> 0){
						while($ordercart = mysqli_fetch_assoc($querycart)){
							?>
							Cart Orders -><?php echo $ordercart['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($ordercart['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $ordercart['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectpending = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='ordered' and action='pending'";
					$querypending = mysqli_query($con,$selectpending);
					if(mysqli_num_rows($querypending)> 0){
						while($orderpending = mysqli_fetch_assoc($querypending)){
							?>
							Pending Orders -><?php echo $orderpending['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($orderpending['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $orderpending['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectacept = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='ordered' and action='accept'";
					$queryacept = mysqli_query($con,$selectacept);
					if(mysqli_num_rows($queryacept)> 0){
						while($orderacept = mysqli_fetch_assoc($queryacept)){
							?>
							Accepted Orders -><?php echo $orderacept['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($orderacept['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $orderacept['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectdeclined = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='ordered' and action='declined'";
					$querydeclined = mysqli_query($con,$selectdeclined);
					if(mysqli_num_rows($querydeclined)> 0){
						while($orderdeclined = mysqli_fetch_assoc($querydeclined)){
							?>
							Declined Orders -><?php echo $orderdeclined['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($orderdeclined['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $orderdeclined['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectoutgoing = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='ordered' and action='outgoing'";
					$queryoutgoing = mysqli_query($con,$selectoutgoing);
					if(mysqli_num_rows($queryoutgoing)> 0){
						while($orderoutgoing = mysqli_fetch_assoc($queryoutgoing)){
							?>
							Outgoing Orders -><?php echo $orderoutgoing['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($orderoutgoing['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $orderoutgoing['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
			<td>
				<?php

					$selectcompleted = "select count(orderID),sum(price), sum(quantity) from orders_tbl where productID='$pid' and status='ordered' and action='completed'";
					$querycompleted = mysqli_query($con,$selectcompleted);
					if(mysqli_num_rows($querycompleted)> 0){
						while($ordercompleted = mysqli_fetch_assoc($querycompleted)){
							?>
							Completed Orders -><?php echo $ordercompleted['count(orderID)']; ?><br>
							Value -> Tsh<?php echo number_format($ordercompleted['sum(price)']); ?>/=<br>
							Quantity -> <?php echo $ordercompleted['sum(quantity)']; ?>
							<?php
						}
					}
				?>
			</td>
		</tr>
	</table>
</div>
<style type="text/css">
	.activate{
	padding: 7px;
	background-color: royalblue;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.deletebtn{
	padding: 7px;
	background-color: red;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.close{
	float: right;
	background-color: red;
	padding: 2px;
	border-radius: 4px;
	color: white;
	cursor: pointer;
}
.orderDetails{
	font-size: 13px;
}
.productDetailsView a{
	text-decoration: none;
	color: white;
}
</style>

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