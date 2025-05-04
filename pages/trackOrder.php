<div class="ordersDiv">
	<strong>Track Order</strong><hr>
	<div class="trackOrders">
		<?php
		
		$oid = $_GET['oid'];
		$productID = $_GET['pid'];
		$selectcont = "SELECT * FROM track_tbl WHERE orderID = '$oid' AND userID = '$userID' AND productID = '$productID' AND action = 'declined'";
		$queryOrder = mysqli_query($con,$selectcont);
		if(mysqli_num_rows($queryOrder)> 0){
			while($track = mysqli_fetch_assoc($queryOrder)){
				?>
				<div class="div_pending">
					Pending--------->  &nbsp;&nbsp;<label style="color:red">Declined</label>
				</div>
				<?php
			}
		}else{
		?>
		<?php
		$selectOrder = "SELECT * FROM track_tbl WHERE orderID = '$oid' AND userID = '$userID' AND productID = '$productID' AND action = 'pending'";
		$queryOrder = mysqli_query($con,$selectOrder);
		if(mysqli_num_rows($queryOrder)> 0){
			while($track = mysqli_fetch_assoc($queryOrder)){
				?>
				<div class="div_<?php echo $track['action'];?>">
					Pending--------->
				</div>
				<?php
				}

			}else{
				?>
				<div>
					Pending--------->
				</div>
				<?php
			}

		?>
	</div>
	<div class="trackOrders">
		<?php

		$selectOrder = "SELECT * FROM track_tbl WHERE orderID = '$oid' AND userID = '$userID' AND productID = '$productID' AND action = 'accept'";
		$queryOrder = mysqli_query($con,$selectOrder);
		if(mysqli_num_rows($queryOrder)> 0){
			while($track = mysqli_fetch_assoc($queryOrder)){
				?>
				<div class="div_<?php echo $track['action'];?>">
					Accepted--------->
				</div>
				<?php
				}

			}else{
				?>
				<div>
					Accepted--------->
				</div>
				<?php
			}

		?>
	</div>
	<div class="trackOrders">
		<?php

		$selectOrder = "SELECT * FROM track_tbl WHERE orderID = '$oid' AND userID = '$userID' AND productID = '$productID' AND action = 'outgoing'";
		$queryOrder = mysqli_query($con,$selectOrder);
		if(mysqli_num_rows($queryOrder)> 0){
			while($track = mysqli_fetch_assoc($queryOrder)){
				?>
				<div class="div_<?php echo $track['action'];?>">
					Start Deliver--------->
				</div>
				<?php
				}

			}else{
				?>
				<div>
					Start Deliver--------->
				</div>
				<?php
			}

		?>
	</div>
	<div class="trackOrders">
		<?php

		$selectOrder = "SELECT * FROM track_tbl WHERE orderID = '$oid' AND userID = '$userID' AND productID = '$productID' AND action = 'completed'";
		$queryOrder = mysqli_query($con,$selectOrder);
		if(mysqli_num_rows($queryOrder)> 0){
			while($track = mysqli_fetch_assoc($queryOrder)){
				?>
				<div class="div_<?php echo $track['action'];?>">
					Completed
				</div>
				<?php
				}

			}else{
				?>
				<div>
					Completed
				</div>
				<?php
			}
}
		?>
	</div>
</div>

<style type="text/css">
	.div_pending{
		color: green;
		display: inline-block;
	}
	.div_accept{
		color: green;
		display: inline-block;
	}
	.div_outgoing{
		color: green;
		display: inline-block;
	}
	.div_completed{
		color: green;
		display: inline-block;
	}
</style>