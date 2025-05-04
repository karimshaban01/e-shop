<center>
	<div class="profileDiv">
		<div class="imgProfile">
			<img src="./upload/<?php echo $profile; ?>">
		</div>
		<div class="personalDetails">
			<strong><?php echo $username; ?></strong>
		</div><br>
		<div class="personalDetails">
			<label><?php echo $phonenumber;?></label>&nbsp;|&nbsp;<label><?php echo $userStatus; ?></label>&nbsp;|&nbsp;<label><?php echo $role; ?></label>
		</div><br>
		<div class="btnProfile">
			<a href="?page=editprofile&step=first"><label class="editProfile">Edit Profile</label></a>&nbsp;&nbsp;
			<a href="?page=editprofile&step=password"><label class="editPass">Change Password</label></a>&nbsp;&nbsp;
			<label class="deleteProfile" onclick="alert('access denied');">Delete Account</label>
		</div>
		<br>
	</div>
</center>