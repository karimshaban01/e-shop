<center>
	<div class="profileDiv">
		<div class="imgProfile">
			<a href="admin/upload/<?php echo $profile; ?>"><img src="admin/upload/<?php echo $profile; ?>"></a>
		</div>
		<div class="personalDetails">
			<strong><?php echo $username; ?></strong>
		</div><br>
		<div class="personalDetails">
			<label><?php echo $phonenumber;?></label>&nbsp;|&nbsp;<label><?php echo $status; ?></label>&nbsp;|&nbsp;<label><?php echo $role; ?></label>
		</div><br>
		<div class="btnProfile">
			<a href="?page=editprofile&step=first&pagename=Edit Profile"><label class="editProfile">Edit Profile</label></a>&nbsp;&nbsp;<span class="spc"><br><br></span>
			<a href="?page=editprofile&step=password&pagename=Edit Password"><label class="editPass">Change Password</label></a>&nbsp;&nbsp;<span class="spc"><br><br></span>
			<a href="?page=orders&pagename=<?php echo $username; ?> | Orders "><label class="viewOrders">View Orders</label></a>&nbsp;&nbsp;<span class="spc"><br><br></span>
		</div>
		<br>
	</div>
</center>