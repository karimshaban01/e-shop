<div class="previewProductDetails">
	<?php
	
	$id = $_GET['id'];
	$selectProduct = "select * from products_tbl where productID = '$id'";
	$queryProduct = mysqli_query($con,$selectProduct);
	if(mysqli_num_rows($queryProduct)> 0){
		while($product = mysqli_fetch_assoc($queryProduct)){
			$description  = $product['productdescription'];
			$category = $product['producttype'];
			?>
			<div class="imgDivDisplay">
				<img src="./admin/imageProducts/<?php echo $product['productimage'];?>">
			</div>
			<div class="resultProductDisplayDetails">
				<div class="catNameDis"><?php echo $product['producttype'];?></div><br>
				<label class="prodNamedis"><?php echo ucfirst($product['productname']);?></label><hr>
				<div class="quntDis"><strong>Available</strong> : <?php echo $product['productquantity'];?></div>
				<label class="moneyDis">Tsh <?php echo number_format($product['productprice']);?></label>
				<br><br>
					<?php include'include/addCart.php';?>
				<br><br>
				<form class="Myform" method="POST">
					<input type="hidden" name="productID" value="<?php echo $product['productID'];?>">
					<input type="number" name="addCartqn" placeholder="Enter Quantity" required><br><br>
					<div>
						<input class="btnAddCart" type="submit" name="addCart" value="Add Cart">
					</div>
				</form>
			</div>
			<?php	
		}

	}else{

		echo "<center>Product Not Found</center>";
	}

?>
</div><br><br>
<div class="previewProductDetails">
	<strong>Product Description</strong><hr>
	<div class="preDivDesc">
		<?php echo $description; ?>
	</div><br>
</div><br><br>
<div class="related">
	<strong>Products Related</strong><br><br>
	<?php
	$selectProductRela = "select * from products_tbl where producttype ='$category' and productID <> '$id' order by rand()";
	$queryProductRela = mysqli_query($con,$selectProductRela);
	if(mysqli_num_rows($queryProductRela)> 0){
		while($productRela = mysqli_fetch_assoc($queryProductRela)){
			?>
			
			<div class="cover">
				<a href="?page=viewproduct&id=<?php echo $productRela['productID'];?>&pagename=<?php echo $productRela['productname'];?>">
					<div class="previewProduct">
						<img src="./admin/imageProducts/<?php echo $productRela['productimage'];?>"><br>
						<div class="price">Tsh <?php echo number_format($productRela['productprice'])?></div>
						<div class="namePd">
							<?php echo ucfirst($productRela['productname']);?>
						</div>
					</div>
				</a>
			</div>
			<?php	
		}

	}else{

		echo "<center>No related Products</center>";
	}

?>
</div>
<?php
	
	if($id == ""){

		header("location:".$_SERVER['HTTP_REFERER']);

	}else if(!isset($id)){

		header("location:".$_SERVER['HTTP_REFERER']);
	}
?>