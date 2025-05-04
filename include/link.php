
<?php
	
	if(isset($_SESSION['userID'])){
		?>
		<div style="background-image: url('admin/upload/<?php echo $profile;?>'); background-size: cover; padding: 12px; filter: brightness(50%); ">
			<br><br><br><br><br><br><br><br><br><br>
		</div>
		<div style="margin-top: -150px;">
			<center style="color: white; font-size: 16px; font-weight: bold;filter: brightness(100%);">
				<?php echo $username;?><br>
				<?php echo $phonenumber; ?><br><br>
				<a style="text-decoration: none;" href="?page=logout"><label class="logoutBtn">Logout</label></a>
			</center>
		</div>
		<?php
		echo"<br><br><br><br>";

	}else{
		?>
		<div class="register-login-Link">
			<div class="name-In-link"><center><strong>Lyuba Shop Online</strong></center></div><hr>
			<center>
				<a href="login.php"><div><i  class="bi bi-box-arrow-right"></i> | Login</div></a>
				<a href="register.php"><div><i class="bi bi-person-plus"></i> | Register</div></a>
			</center>
		</div>
		<?php
	}

?>

<div class="linkCatelist">
	<div class="cate-ty-link"><center>Categories</center></div>
	<?php

		$selectCategory = "select * from types_tbl order by typename asc";
		$queryCategory = mysqli_query($con,$selectCategory);
		if(mysqli_num_rows($queryCategory)> 0){
			while($category = mysqli_fetch_assoc($queryCategory)){
				?>
				<a href="?page=categories&pagename=<?php echo $category['typename']; ?>"><div class="categoryList"><?php echo ucfirst($category['typename']); ?></div></a>
				<?php
			}
		}else{
			echo"No category";
		}
	?>
	<br><br><br>
</div>