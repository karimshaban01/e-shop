<?php
	
	$pid = $_GET['pid'];
	$selectProduct = "select * from products_tbl where productID = '$pid'";
	$queryProduct = mysqli_query($con,$selectProduct);
	if(mysqli_num_rows($queryProduct)> 0){
		while($productData = mysqli_fetch_assoc($queryProduct)){

			$currentimage = $productData['productimage']; 
			?>
	<div class="productsDiv">
	<strong>Edit Product(<?php echo $productData['productname']; ?>)</strong><hr>

	<form method="POST" enctype="multipart/form-data">
		<table width="100%" class="addProduct">
			<tr>
				<td>
					<label>Product Name:</label><br>
					<input type="text" name="productname" value="<?php echo $productData['productname']; ?>" placeholder="ProductName" required>
				</td>
				<td>
					<label>Product Price:</label><br>
					<input type="number" name="productprice" value="<?php echo $productData['productprice']; ?>" placeholder="ProductPrice" min="1000" required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Product Quantity:</label><br>
					<input type="number" name="productquantity" value="<?php echo $productData['productquantity']; ?>" placeholder="ProductQuantity" min="1" required>
				</td>
				<td>
					<label>Product Type:</label><br>
					<select name="producttype" required>
						<option value="<?php echo $productData['producttype']; ?>"><?php echo $productData['producttype']; ?></option>
						<?php
							$type = $productData['producttype'];
							$selectType = "select * from types_tbl where typename <> '$type' order by typename asc";
							$queryType = mysqli_query($con,$selectType);
							if(mysqli_num_rows($queryType)> 0){
								while($types = mysqli_fetch_assoc($queryType)){
									?>
									<option><?php echo $types['typename'];?></option>
									<?php
								}
							}else{
								echo"ks";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="float: left; width: 90%;">
					<label>Product Description:</label><br>
					<textarea name="productdescription" placeholder="Product Description" required><?php echo $productData['productdescription']; ?></textarea>
				</td>
				<td>
					<label>Product Image:</label><br>
					<input type="file" name="image" value="" required><br>
					<a href="./imageProducts/<?php echo $productData['productimage']; ?>">
						<img src="./imageProducts/<?php echo $productData['productimage']; ?>" style="max-width: 100px;">
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center><input style="width:20%" type="submit" name="editproduct" value="Edit Product"></center>
				</td>
			</tr>
		</table>
	</form>
</div>
			<?php
		}
	}
?>


<?php
	
	if(isset($_POST['editproduct'])){

		$productName = $_POST['productname'];
		$productPrice = $_POST['productprice'];
		$productQuantity = $_POST['productquantity'];
		$productType = $_POST['producttype'];
		$productDescription = $_POST['productdescription'];

		
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$size = getimagesize($_FILES['image']['tmp_name']);

		move_uploaded_file($_FILES['image']['tmp_name'], "./imageProducts/".$_FILES['image']['name']);
		

		$imageName = $_FILES['image']['name'];

		$update = "UPDATE products_tbl SET productname = '$productName', productimage = '$imageName', producttype = '$productType',productquantity = '$productQuantity', productprice = '$productPrice', productdescription = '$productDescription' WHERE productID = '$pid'";

		$query = mysqli_query($con,$update);

		if($query == 1){

			echo'<script>alert("Product was Updated");</script>';
			echo'<script>location.href = "?page=editproduct&pid='.$pid.'";</script>';
		}
	}
?>