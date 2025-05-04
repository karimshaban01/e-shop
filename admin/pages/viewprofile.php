<?php if($user_id == $_GET['userid']){ echo"<script>location.href='?page=profile';</script>"; } ?>
<div class="viewUserProfile">
	<?php

		$userID = $_GET['userid'];
		$selectProfile = "select * from users_tbl where userID = '$userID'";
		$queryProfile = mysqli_query($con,$selectProfile);
		if(mysqli_num_rows($queryProfile)> 0){
			while($userDetails = mysqli_fetch_assoc($queryProfile)){

				$userRole = $userDetails['role'];
				?>
				<strong>Personal Details</strong><hr>
				<div class="imgProfileDetail">
					<table width="100%">
						<tr>
							<td><img src="./upload/<?php echo $userDetails['profilepicture']; ?>"></td>
							<td>
								<strong>Name : </strong><?php echo $userDetails['username']; ?><br><br>
								<strong>Phonenumber : </strong><?php echo $userDetails['phonenumber']; ?><br><br>
								<strong>Role : </strong><?php echo $userDetails['role']; ?><br><br>
								<strong>Status : </strong><?php echo $userDetails['status']; ?>
							</td>
							<td>
								<a href="include/action.php?action=delete&pg=users&u=<?php echo $userDetails['userID']?>"><label class="deletebtn">Delete</label></a><br><br>
								<?php

									if($userDetails['status']=="active"){

										?>
										<a href="include/action.php?action=deactivate&pg=users&u=<?php echo $userDetails['userID']?>"><label class="deactivate">Deactivate</label></a>
										<?php
									}else{

										?>
										<a href="include/action.php?action=activate&pg=users&u=<?php echo $userDetails['userID']?>"><label class="activate">Activate</label></a>
										<?php
									}
								?>
								<?php

									if ($userRole == "user") {
										?>
											<br><br><a href="?page=Notify&userID=<?php echo $userDetails['userID']?>"><label class="notificationLb">Send Notification</label></a>
										<?php
									}
								?>
							</td>
						</tr>
					</table>
				</div>
				<?php
			}
		}else{

			echo"<script>location.href='?page=users';</script>"; 
		}

	?>
</div>
<br>
<?php 
	if($userRole == "user"){
		?>
<div class="viewUserProfile">
	<strong>Orders Details</strong><hr>
	<table width="100%" class="orderDetails">
		<tr>
			<td>
				<?php

					$selectAll = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID'";
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

					$selectcart = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='cart' and action='pending'";
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

					$selectpending = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='ordered' and action='pending'";
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

					$selectacept = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='ordered' and action='accept'";
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

					$selectdeclined = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='ordered' and action='declined'";
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

					$selectoutgoing = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='ordered' and action='outgoing'";
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

					$selectcompleted = "select count(orderID),sum(price), sum(quantity) from orders_tbl where userID='$userID' and status='ordered' and action='completed'";
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
		<?php
	}
?>
<style type="text/css">
	.deactivate{

	padding: 4px;
	background-color: orange;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.deletebtn{
	padding: 4px;
	background-color: red;
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
.notificationLb{
	padding: 4px;
	background-color: seagreen;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}
.orderDetails{
	font-size: 13px;
}
a{
	text-decoration: none;
	color: white;
}
</style>