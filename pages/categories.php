<?php
	
	$page = $_GET['pagename'];

	if(isset($page)){
	
	$selectProduct = "select * from products_tbl where producttype = '$page' order by rand()";
	$queryProduct = mysqli_query($con,$selectProduct);
	if(mysqli_num_rows($queryProduct)> 0){
		while($product = mysqli_fetch_assoc($queryProduct)){
			?>
			<div class="cover">
				<a href="?page=viewproduct&id=<?php echo $product['productID'];?>&pagename=<?php echo $product['productname'];?>">
					<div class="previewProduct">
						<img src="./admin/imageProducts/<?php echo $product['productimage'];?>"><br>
						<div class="price">Tsh <?php echo number_format($product['productprice'])?></div>
						<div class="namePd">
							<?php echo ucfirst($product['productname']);?>
							<label class="addCart"><i class="bi bi-cart-plus-fill"></i></label>
						</div>
					</div>
				</a>
			</div>
			<?php	
		}

	}else{

		echo "<center>No Product Added at th Moment</center>";
	}

	}else if($page == ""){

		header("location:".$_SERVER['HTTP_REFERER']);

	}else if(!isset($page)){

		header("location:".$_SERVER['HTTP_REFERER']);
	}

?>