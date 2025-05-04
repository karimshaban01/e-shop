<div class="productsDiv">
	<strong>Add Product</strong><hr>

	<form method="POST" enctype="multipart/form-data">
		<table width="100%" class="addProduct">
			<tr>
				<td class="tdAdd">
					<label>Product Name:</label><br>
					<input type="text" name="productname" placeholder="ProductName" required>
				</td>
				<td class="tdAdd">
					<label>Product Price:</label><br>
					<input type="number" name="productprice" placeholder="ProductPrice" min="1000" required>
				</td>
			</tr>
			<tr>
				<td class="tdAdd">
					<label>Product Quantity:</label><br>
					<input type="number" name="productquantity" placeholder="ProductQuantity" min="1" required>
				</td>
				<td class="tdAdd">
					<label>Product Type:</label><br>
					<select name="producttype" required>
						<option value="">Select Type</option>
						<?php

							$selectType = "select * from types_tbl order by typename asc";
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
				<td class="tdAdd">
					<label>Product Description:</label><br>
					<textarea name="productdescription" placeholder="Product Description"></textarea>
				</td>
				<td class="tdAdd">
					<label>Product Image:</label><br>
					<input type="file" name="image" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center><input style="width:20%" type="submit" name="addproduct" value="Add Product"></center>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php
	
	if(isset($_POST['addproduct'])){

		$productName = $_POST['productname'];
		$productPrice = $_POST['productprice'];
		$productQuantity = $_POST['productquantity'];
		$productType = $_POST['producttype'];
		$productDescription = $_POST['productdescription'];
		$date = date('d-m-Y');

		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$size = getimagesize($_FILES['image']['tmp_name']);

		move_uploaded_file($_FILES['image']['tmp_name'], "./imageProducts/".$_FILES['image']['name']);
		$imageName = $_FILES['image']['name'];

		$insert = "insert into products_tbl values(null,'$productName','$imageName','$productType','$productQuantity','$productPrice','$productDescription','$date')";
		$query = mysqli_query($con,$insert);

		if($query == 1){

			echo'<script>alert("product added successful");</script>';
		}
	}
?>