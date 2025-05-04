<div class="cartListDiv">
	<strong>Your Cart</strong><hr>
	<div class="tableDiv">
	<table class="styled-table">
		<thead>
			<tr>
				<td>NO</td>
				<td>Product Image</td>
				<td>Product Name</td>
				<td>Product Type</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$id = 1;
				$selectOrder = "SELECT * FROM orders_tbl WHERE userID = '$userID' AND status='cart' ORDER BY orderID DESC";
				$queryOrder = mysqli_query($con,$selectOrder);
				if(mysqli_num_rows($queryOrder)> 0){
					while($orders = mysqli_fetch_assoc($queryOrder)){

						$productID = $orders['productID'];
					$selectProductOrder = "SELECT * FROM products_tbl WHERE productID = '$productID'";
					$queryProductOrder = mysqli_query($con,$selectProductOrder);
					if(mysqli_num_rows($queryProductOrder)> 0){
						while($product = mysqli_fetch_assoc($queryProductOrder)){

							$newQn = $orders['quantity'] + $product['productquantity'];
							$orderid = $orders['orderID'];
							$qnorder = $orders['quantity'];
							$newsq = $product['productquantity'];
							$productname = $product['productname'];
							?>
							<tr>
								<td><?php echo $id++; ?></td>
								<td>
									<a href="admin/imageProducts/<?php echo $product['productimage'];?>"><img src="admin/imageProducts/<?php echo $product['productimage'];?>"></a>
								</td>
								<td><?php echo $product['productname'];?></td>
								<td><?php echo $product['producttype'];?></td>
								<td>
									 <b>Tsh <?php echo number_format($orders['price']);?></b>
								</td>
								<td><?php echo $orders['quantity']?></td>
								<td>
									<a href="include/delete.php?Oid=<?php echo $orders['orderID']?>&pid=<?php echo $product['productID'];?>&qns=<?php echo $newQn;?>"><label class="remove">Remove</label></a>
								</td>
							</tr>
							<?php

							$utwa = "zipo";
						}
					}
					}
				}else{

					echo "<tr><td colspan='7'><center>No Cart Added</center></td></tr>";
					$utwa = "hazipo";
				}
			?>
			<tr>
				<td colspan="4"><center><b>Total</b></center></td>
				<td colspan="3">
					<?php

						$selecttotal = "select sum(price) from orders_tbl where userID = '$userID' AND status='cart'";
						$querytotal = mysqli_query($con,$selecttotal);
						if(mysqli_num_rows($querytotal)> 0){
							while($total = mysqli_fetch_assoc($querytotal)){

								echo"Tsh ". number_format($total['sum(price)'])."/=";
							}
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php 
	
	if($utwa == "zipo"){
		?>
		<br>
		Fill Information Bellow To Complete Order
		<br><br>
		<form method="POST">
			<?php include'include/makeorder.php';?>
			<input type="text" name="location" placeholder="Enter location product arrived" required><label class="sp"><br></label>
			<input type="number" name="phonenumber" value="<?php echo $phonenumber;?>" placeholder="Enter Emergence Phonenumber" required><label class="sp"><br></label>
			<input type="submit" name="CompleteOrder" value="Set Order">
		</form>
		<?php
	}
?>
</div>

<style type="text/css">
	.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    
  }
  .styled-table thead tr {
      background-color: teal;
      color: #ffffff;
      text-align: left;
  }
  .styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.cartListDiv img{
	width: 50px;
	height: 50px;
}
.remove{
	padding: 10px;
	background-color: darkred;
	border-radius: 4px;
	cursor: pointer;
}
.styled-table a{
	color: white;
	text-decoration: none;
	cursor: pointer;
}
.cartListDiv input[type=text],input[type=number]{
	padding: 10px;
	border-radius: 4px;
	border: 1px solid lightgray;
	outline: none;
}
.cartListDiv input[type=submit]{
	padding: 10px;
	cursor: pointer;
	border-radius: 4px;
	border: 0px;
	outline: none;
	background-color: royalblue;
	color: white;
}
.sp{
	display: none;
}
@media (max-width:800px){

	.styled-table{
		width: 100%;
		overflow-x: auto;
	}
	.cartListDiv{
		width: 89%;
	}
	.tableDiv{
		overflow-x: auto;
	}
	.cartListDiv input[type=text],input[type=number]{
		width: 90%;
	}
	.cartListDiv input[type=submit]{
		width: 97%;
	}
	.sp{
		display: block;
	}
}
</style>