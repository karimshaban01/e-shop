<div class="ordersDiv">
	<strong>Orders</strong><hr>
	<div class="orderDiVmain">
	<table class="styled-table">
		<thead>
			<tr>
				<td>NO</td>
				<td>Product Image</td>
				<td>Product Name</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Location</td>
				<td>Phonenumber</td>
				<td>Status</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$selectOrders = "select * from orders_tbl where status = 'ordered' AND userID = '$userID' order by orderID DESC";
				$queryOrders = mysqli_query($con,$selectOrders);
				if(mysqli_num_rows($queryOrders)> 0){
					while($orderData = mysqli_fetch_assoc($queryOrders)){

						$productID = $orderData['productID'];
						$selectProduct = "select * from products_tbl where productID = '$productID'";
						$queryProduct = mysqli_query($con,$selectProduct);
						if(mysqli_num_rows($queryProduct)> 0){
							while($products = mysqli_fetch_assoc($queryProduct)){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td>
								<a href="admin/imageProducts/<?php echo $products['productimage'];?>">
									<img src="admin/imageProducts/<?php echo $products['productimage'];?>">
								</a>
							</td>
							<td><?php echo $products['productname'];?></td>
							<td>Tsh <?php echo number_format($orderData['price']);?>/=</td>
							<td><?php echo $orderData['quantity'];?></td>
							<td><?php echo $orderData['locationArrived'];?></td>
							<td><?php echo $orderData['phonenumber'];?></td>
							<td><?php echo $orderData['action'];?></td>
							<td>
								<a href="?page=trackOrder&pid=<?php echo $orderData['productID'];?>&oid=<?php echo $orderData['orderID']?>&pagename=Track Order"><label class="viewprofile">Track</label></a>
							</td>
						</tr>
						<?php
							}
						}
					}

				}else{
					?>
					<tr>
						<td colspan="10"><center>No Any Order At The Moment</center></td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</div>

<style type="text/css">
	.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
.styled-table a{
	color: white;
	text-decoration: none;
	cursor: pointer;
}
.deletebtn{
	padding: 4px;
	background-color: red;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.viewprofile{
	padding: 4px;
	background-color: #ea5050;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.deactivate{

	padding: 4px;
	background-color: orange;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.ordersDiv img{
	width: 60px;
	height: 60px;
}
.orderDiVmain{
	overflow-x: auto;
}
.activate{
	padding: 4px;
	background-color: royalblue;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.styled-table img{

	width: 50px;
	height: 50px;
}

  </style>
</div>