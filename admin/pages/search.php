<div  class="searchBar">
	<ul>
		<a href="?page=search&engine=product&q=<?php echo $_GET['q'];?>"><li><label class="productLink">Products</label></li></a>
		<a href="?page=search&engine=order&q=<?php echo $_GET['q'];?>"><li><label class="orderLink">Orders</label></li></a>
		<a href="?page=search&engine=user&q=<?php echo $_GET['q'];?>"><li><label class="userLink">Users</label></li></a>
		<a href="?page=search&engine=notification&q=<?php echo $_GET['q'];?>"><li><label class="notificationLink">Notification</label></li></a>
		<a href="?page=search&engine=type&q=<?php echo $_GET['q'];?>"><li><label class="typeLink">Types</label></li></a>
	</ul>
</div>

<div class="searhDivResult">
	<strong>Search Result For <?php echo strtoupper($_GET['engine']); ?></strong><hr>
	<?php
		$search = $_GET['q'];

		if($_GET['engine'] == "product"){
			?>
			<table width="100%" class="styled-table">
			<thead>
				<tr>
					<td>ID</td>
					<td>Product Name</td>
					<td>Product Image</td>
					<td>Product Type</td>
					<td>Product Quantity</td>
					<td>Product Price</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$selectProduct = "select * from products_tbl where productname like '%$search%' or producttype like '$search'";
					$queryProduct = mysqli_query($con,$selectProduct);
					if(mysqli_num_rows($queryProduct)> 0){
						while($productData = mysqli_fetch_assoc($queryProduct)){

							?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $productData['productname'];?></td>
								<td><img src="./imageProducts/<?php echo $productData['productimage'];?>"></td>
								<td><?php echo $productData['producttype'];?></td>
								<td><?php echo $productData['productquantity'];?></td>
								<td>Tsh <?php echo number_format($productData['productprice']);?>/=</td>
								<td>
									<a href="?page=editproduct&pid=<?php echo $productData['productID'];?>"><label class="activate">Edit</label></a>
									<a href="include/action.php?&pg=product&u=<?php echo $productData['productID'];?>"><label class="deletebtn">Delete</label></a>
									<a href="?page=productsDetails&pid=<?php echo $productData['productID'];?>"><label class="viewprofile">View Details</label></a>
								</td>
							</tr>
							<?php
						}
					}else {
						?>
						<tr>
							<td colspan="7"><center>No Result for Product <?php echo $search; ?></center></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
			<?php

			
		}else if($_GET['engine'] == "order"){
			?>
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
				$selectOrders = "select * from orders_tbl where productType like '%$search%' or locationArrived like '%$search%' AND status = 'ordered' order by orderID DESC";
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
						<td colspan="10"><center>No Result for Order <?php echo $search; ?></center></td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
			<?php

		}else if($_GET['engine'] == "user"){
			?>
			<table class="styled-table">
		<thead>
			<tr>
				<td>No</td>
				<td>Username</td>
				<td>Phonenumber</td>
				<td>Role</td>
				<td style="float: right;">Action</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$selectExistUser = "select * from users_tbl where username like '%$search%' order by username asc";
				$queryExistUser = mysqli_query($con,$selectExistUser);
				if(mysqli_num_rows($queryExistUser)> 0){
					while ($userData = mysqli_fetch_assoc($queryExistUser)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $userData['username']; ?></td>
							<td><?php echo $userData['phonenumber']; ?></td>
							<td><?php echo $userData['role']; ?></td>
							<td style="float: right;">
								<?php

									if($user_id == $userData['userID']){

									}else{

											?>
										<a href="include/action.php?action=delete&pg=users&u=<?php echo $userData['userID']?>"><label class="deletebtn">Delete</label></a>
								<?php

									if($userData['status']=="active"){

										?>
										<a href="include/action.php?action=deactivate&pg=users&u=<?php echo $userData['userID']?>"><label class="deactivate">Deactivate</label></a>
										<?php
									}else{

										?>
										<a href="include/action.php?action=activate&pg=users&u=<?php echo $userData['userID']?>"><label class="activate">Activate</label></a>
										<?php
									}
								?>
										<?php
									}
								?>
								<a href="?page=viewprofile&userid=<?php echo $userData['userID']?>"><label class="viewprofile">View Profile</label></a>
							</td>
						</tr>
						<?php
					}
				}else{

					?>
					<tr>
						<td colspan="5">
							<center>No user at The Moment</center>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
			<?php
		}else if($_GET['engine'] == "notification"){
			?>
			<?php
	
	$selectNot = "select * from notification_tbl where title like '%$search%' or notificationBody like '%$search%' AND userID = 'admin' order by notification_id desc";
	$queryNot = mysqli_query($con,$selectNot);
	if(mysqli_num_rows($queryNot)> 0){
		while($notification = mysqli_fetch_assoc($queryNot)){
			?>
			<a href="?page=<?php echo $notification['direct']?>&<?php 

				if($notification['direct'] == "viewprofile"){

					echo"userid";

				}else if($notification['direct'] == "viewOrderDetail"){

					echo"oid";

				} else if($notification['direct'] == "productsDetails"){

					echo"pid";
				}

		?>=<?php echo $notification['link']?>">
				<div onclick="updateNot('<?php echo $notification['notification_id'];?>')" class="notificationDiv" id="<?php echo $notification['action']?>">
					<b><?php  echo $notification['title']; ?></b><br><br>
					<i><?php echo $notification['notificationBody'] ?></i>
					<label class="times"><b><?php echo $notification['timeInter']; ?></b></label>
				</div>
			</a>
			<br>
			<?php
		}
	}else{
		echo"<center>No notification Result</center>";
	}
?>
<script type="text/javascript">
	function updateNot(notid){

		var id = notid;

		$.ajax({
			method:"POST",
			url:"include/updatenot.php",
			data:{
				id:id
			},
		})
	}
</script>
			<?php

		}else if($_GET['engine'] == "type"){
			?>
			<table width="100%" class="styled-table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Type Name</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$selectType = "select * from types_tbl where typename like '%$search%' order by typename asc";
						$queryType = mysqli_query($con,$selectType);
						if(mysqli_num_rows($queryType)> 0){
							while($types = mysqli_fetch_assoc($queryType)){
								?>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $types['typename'];?></td>
									<td>
										<a href="include/action.php?pg=type&u=<?php echo $types['typeId']?>"><label class="deletebtn">Delete</label></a>
									</td>
								</tr>
								<?php
							}
						}else{
							?>
							<tr>
								<td colspan="3"><center>No Type Added</center></td>
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
			<?php
		}else{

			echo"bad sign for search engine";
		}

	?>
</div>

<style type="text/css">
	.searchBar ul{
		display: inline-block;
		list-style: none;
	}
	.searchBar li{
		padding: 12px;
		display: inline-block;
	}
	.searchBar a{
		text-decoration: none;
		color: grey;
		cursor: pointer;
	}
	.<?php echo $_GET['engine']?>Link{

		padding: 12px;
		background-color: teal;
		border-radius: 3px;
		cursor: pointer;
		color: white;
	}
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