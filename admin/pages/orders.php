<div class=ordersDiv>
	<strong>Orders</strong><hr>
	<table class="styled-table">
		<thead>
			<tr>
				<td>NO</td>
				<td>Product Type</td>
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
				$selectOrders = "select * from orders_tbl where status = 'ordered' order by orderID DESC";
				$queryOrders = mysqli_query($con,$selectOrders);
				if(mysqli_num_rows($queryOrders)> 0){
					while($orderData = mysqli_fetch_assoc($queryOrders)){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $orderData['productType'];?></td>
							<td>Tsh <?php echo number_format($orderData['price']);?>/=</td>
							<td><?php echo $orderData['quantity'];?></td>
							<td><?php echo $orderData['locationArrived'];?></td>
							<td><?php echo $orderData['phonenumber'];?></td>
							<td><?php echo $orderData['action'];?></td>
							<td>
								<a href="?page=viewOrderDetail&oid=<?php echo $orderData['orderID']?>"><label class="viewprofile">View Order</label></a>
							</td>
						</tr>
						<?php
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
	background-color: green;
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