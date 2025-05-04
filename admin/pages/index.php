<?php
	
	$selectData1 = "select count(productID),sum(productquantity),sum(productprice) from products_tbl";
	$queryData1 = mysqli_query($con,$selectData1);
	if(mysqli_num_rows($queryData1)> 0){
		while($datas = mysqli_fetch_assoc($queryData1)){

			$totalProduct = $datas['count(productID)'];
			$totalQuantity = $datas['sum(productquantity)'];
			$totalPrice = $datas['sum(productprice)'];
		}
	}

	$selectData2 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered'";
	$queryData2 = mysqli_query($con,$selectData2);
	if(mysqli_num_rows($queryData2)> 0){
		while($data2 = mysqli_fetch_assoc($queryData2)){

			$totalOrder = $data2['count(orderID)'];
			$totalQuantityOrder = $data2['sum(quantity)'];
			$totalPriceOrder = $data2['sum(price)'];
		}
	}

	$selectData6 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered' and action = 'pending'";
	$queryData6 = mysqli_query($con,$selectData6);
	if(mysqli_num_rows($queryData6)> 0){
		while($data6 = mysqli_fetch_assoc($queryData6)){

			$totalOrderPending = $data6['count(orderID)'];
			$totalQuantityOrderPending = $data6['sum(quantity)'];
			$totalPriceOrderPending = $data6['sum(price)'];
		}
	}

	$selectData7 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered' and action = 'accept'";
	$queryData7 = mysqli_query($con,$selectData7);
	if(mysqli_num_rows($queryData7)> 0){
		while($data7 = mysqli_fetch_assoc($queryData7)){

			$totalOrderAccept = $data7['count(orderID)'];
			$totalQuantityOrderAccept = $data7['sum(quantity)'];
			$totalPriceOrderAccept = $data7['sum(price)'];
		}
	}

	$selectData8 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered' and action = 'outgoing'";
	$queryData8 = mysqli_query($con,$selectData8);
	if(mysqli_num_rows($queryData8)> 0){
		while($data8 = mysqli_fetch_assoc($queryData8)){

			$totalOrderOut = $data8['count(orderID)'];
			$totalQuantityOrderOut = $data8['sum(quantity)'];
			$totalPriceOrderOut = $data8['sum(price)'];
		}
	}

	$selectData9 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered' and action = 'completed'";
	$queryData9 = mysqli_query($con,$selectData9);
	if(mysqli_num_rows($queryData9)> 0){
		while($data9 = mysqli_fetch_assoc($queryData9)){

			$totalOrderCompl = $data9['count(orderID)'];
			$totalQuantityOrderCompl = $data9['sum(quantity)'];
			$totalPriceOrderCompl = $data9['sum(price)'];
		}
	}

	$selectData10 = "select count(orderID),sum(quantity),sum(price) from orders_tbl where status ='ordered' and action = 'declined'";
	$queryData10 = mysqli_query($con,$selectData10);
	if(mysqli_num_rows($queryData10)> 0){
		while($data10 = mysqli_fetch_assoc($queryData10)){

			$totalOrderDecl = $data10['count(orderID)'];
			$totalQuantityOrderDecl = $data10['sum(quantity)'];
			$totalPriceOrderDecl = $data10['sum(price)'];
		}
	}

	$selectData3 = "select count(typeId) from types_tbl";
	$queryData3 = mysqli_query($con,$selectData3);
	if(mysqli_num_rows($queryData3)> 0){
		while($data3 = mysqli_fetch_assoc($queryData3)){

			$totalType = $data3['count(typeId)'];
			
		}
	}

	$selectData4 = "select count(userID) from users_tbl";
	$queryData4 = mysqli_query($con,$selectData4);
	if(mysqli_num_rows($queryData4)> 0){
		while($data4 = mysqli_fetch_assoc($queryData4)){

			$totalUser = $data4['count(userID)'];
			
		}
	}

	$selectData5 = "select count(userID) from users_tbl where status ='active'";
	$queryData5 = mysqli_query($con,$selectData5);
	if(mysqli_num_rows($queryData5)> 0){
		while($data5 = mysqli_fetch_assoc($queryData5)){

			$totalUserActive = $data5['count(userID)'];
			
		}
	}

	$selectData6 = "select count(userID) from users_tbl where status ='inactive'";
	$queryData6 = mysqli_query($con,$selectData6);
	if(mysqli_num_rows($queryData6)> 0){
		while($data6 = mysqli_fetch_assoc($queryData6)){

			$totalUserInactive = $data6['count(userID)'];
			
		}
	}
?>

<div class="mainDashboardDiv">
	<strong>Welcome <?php echo $username;?></strong><br><br>
	<div class="homedivTo">
		<strong>Product Details</strong><hr>
		<div class="matheDetail">
			<div class="cover">
				<div class="dataLink">
					<center>
						Total Products<br> <?php echo $totalProduct; ?>
					</center>
				</div>
			</div>
			<div class="cover">
				<div class="dataLink">
					<center>
						Total Products Quantity<br> <?php echo number_format($totalQuantity); ?>
					</center>
				</div>
			</div>
			<div class="cover">
				<div class="dataLink">
					<center>
						Total Products Values<br> Tsh <?php echo number_format($totalPrice); ?>
					</center>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="homedivTo">
		<strong>Order Details</strong><hr>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders<br> <?php echo $totalOrder; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders<br> <?php echo number_format($totalQuantityOrder); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Income<br> Tsh <?php echo number_format($totalPriceOrder); ?>
				</center>
			</div>
		</div>
		<input type="hidden" id="noshow" value="no">
		<br><br>
		<center>
			<label onclick="shawHide()" class="btnShow" id="btnShow">Show All</label>
		</center>
	</div>
	<br><br>
	<div id="hideshow">
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Pending<br> <?php echo $totalOrderPending; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders Pending<br> <?php echo number_format($totalQuantityOrderPending); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Pending Orders Income<br> Tsh <?php echo number_format($totalPriceOrderPending); ?>
				</center>
			</div>
		</div>
	</div>
	<br><br>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Declined<br> <?php echo $totalOrderDecl; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders Declined<br> <?php echo number_format($totalQuantityOrderDecl); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Declined Orders Loss<br> Tsh <?php echo number_format($totalPriceOrderDecl); ?>
				</center>
			</div>
		</div>
	</div>
	<br><br>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Accepted<br> <?php echo $totalOrderAccept; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders Accepted<br> <?php echo number_format($totalQuantityOrderAccept); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Accepted Orders Income<br> Tsh <?php echo number_format($totalPriceOrderAccept); ?>
				</center>
			</div>
		</div>
	</div>
	<br><br>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Outgoing<br> <?php echo $totalOrderOut; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders Outgoing<br> <?php echo number_format($totalQuantityOrderOut); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Outgoing Orders Income<br> Tsh <?php echo number_format($totalPriceOrderOut); ?>
				</center>
			</div>
		</div>
	</div>
	<br><br>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Orders Completed<br> <?php echo $totalOrderCompl; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Quantity Orders Completed<br> <?php echo number_format($totalQuantityOrderCompl); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Completed Orders Income<br> Tsh <?php echo number_format($totalPriceOrderCompl); ?>
				</center>
			</div>
		</div>
	</div>
	</div>
	</div>
	<br><br>
	<div class="homedivTo">
		<strong>Users Details</strong><hr>
	<div class="matheDetail">
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Users <br> <?php echo $totalUser; ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Users Active<br> <?php echo number_format($totalUserActive); ?>
				</center>
			</div>
		</div>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Users  Inactive<br><?php echo number_format($totalUserInactive); ?>
				</center>
			</div>
		</div>
	</div>
	</div>
	<br><br>
	<div class="homedivTo">
		<strong>Types Details</strong><hr>
		<div class="cover">
			<div class="dataLink">
				<center>
					Total Product Type<br> <?php echo number_format($totalType); ?>
				</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function shawHide() {
		
		var btn = document.getElementById('noshow').value;

		if(btn == "no"){

			document.getElementById("hideshow").style.display = "block";
			document.getElementById('btnShow').innerHTML = "Hide";
			document.getElementById('noshow').value = "yes";

		}else if(btn == "yes"){

			document.getElementById("hideshow").style.display = "none";
			document.getElementById('btnShow').innerHTML = "Show All";
			document.getElementById('noshow').value = "no";
		}
	}
</script>