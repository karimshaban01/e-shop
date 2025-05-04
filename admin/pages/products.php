<div class="productsDiv">
	<div class="productTop">
		<strong>Products List</strong>
		<a href="?page=addproduct"><label class="addpdbtn">Add Product</label></a>
	</div><br><hr>
	<div class="productsDivResult">
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
					$selectProduct = "select * from products_tbl order by productname asc";
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
					}else{
						?>
						<tr>
							<td colspan="7"><center>No Products Added</center></td>
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
