<div class="addType">
	<?php

		if($_GET['step'] == "first"){

			?>
			<strong>Edit Profile(<?php echo $username;?>)</strong><hr>
			<form method="POST" enctype="multipart/form-data" class="editUserDetails">
				<center>
					<input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter Username" required><br><br>
					<input type="number" name="phonenumber" value="<?php echo $phonenumber;?>" placeholder="Enter Phonenumber"><br><br>
					<input type="hidden" name="fileallow"  id="fileallow" value="no">
					<span id="inputFiledp"></span><br>
					<label onclick="allowForm()" id="instuct">Edit and Profile Picture</label><br><br>
					<input type="submit" name="updateProfile" id="btnData" value="No Update Details Only">
				</center>
			</form>
			<?php
		}else if($_GET['step']=="password"){
			?>
			<strong>Change Password(<?php echo $username;?>)</strong><hr>
			<form method="POST" enctype="multipart/form-data" class="editUserDetails">
				<center>
					<input type="password" name="oldpass" placeholder="Enter Old Password" required><br><br>
					<input type="password" name="newPass"  placeholder="Enter New Password"><br><br>
					<input type="submit" name="updatepass"  value="Save Password">
				</center>
			</form>
			<?php
		}else if($_GET['step']==""){

			header("location:?page=profile&pagename=Profile");

		}else if(!isset($_GET['step'])){

			header("location:?page=profile&pagename=Profile");
		}
	?>
</div>
<script type="text/javascript">
	function allowForm(){
		
		var fileallow = document.getElementById('fileallow').value = "yes";
		document.getElementById('btnData').value = 'Save change';
		document.getElementById('instuct').style.display = "none";
		document.getElementById('inputFiledp').innerHTML = '<input type="file" name="image" id="myfile" accept="image/*" required>';

	}
</script>

<?php
	
	if (isset($_POST['updateProfile'])) {
		
		$username = $_POST['username'];
		$phonenumber = $_POST['phonenumber'];
		$allow = $_POST['fileallow'];

		if($allow == "yes"){

			$image = addslashes($_FILES['image']['tmp_name']);
			$name = addslashes($_FILES['image']['name']);
			$size = getimagesize($_FILES['image']['tmp_name']);

			move_uploaded_file($_FILES['image']['tmp_name'], "admin/upload/".$_FILES['image']['name']);

			$imageName = $_FILES['image']['name'];

			$update = "UPDATE users_tbl SET username = '$username', phonenumber = '$phonenumber', profilePicture = '$imageName' WHERE userID = '$userID'";
			$query = mysqli_query($con,$update);

			if($query == 1){

				echo'<script>alert("Profile was Updated");</script>';
				echo'<script>location.href = "?page=profile&pagename=Profile";</script>';
			}
		}else if($allow == "no"){


			$update = "UPDATE users_tbl SET username = '$username', phonenumber = '$phonenumber' WHERE userID = '$userID'";
			$query = mysqli_query($con,$update);

			if($query == 1){

				echo'<script>alert("Profile was Updated");</script>';
				echo'<script>location.href = "?page=profile&pagename=Profile";</script>';
			}

		}
	}
?>

<?php
	
	if (isset($_POST['updatepass'])) {
		
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newPass'];

		if($oldpass == $passwordCurrent){

			$update = "UPDATE users_tbl SET password = '$newpass' WHERE userID = '$userID'";
			$query = mysqli_query($con,$update);

			if($query == 1){

				echo'<script>alert("Password was Updated");</script>';
				echo'<script>location.href = "?page=profile&pagename=Profile";</script>';
			}
		}else{

			echo'<script>alert("Wrong Password");</script>';
		}
	}

?>