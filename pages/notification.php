<strong>Notification</strong><br><hr>
<?php
	
	$selectNot = "select * from notification_tbl where userID = '$userID' order by notification_id desc";
	$queryNot = mysqli_query($con,$selectNot);
	if(mysqli_num_rows($queryNot)> 0){
		while($notification = mysqli_fetch_assoc($queryNot)){
			?>
			<div class="notificationDiv" id="<?php echo $notification['action']?>">
				<b><?php  echo $notification['title']; ?><?php if($notification['action']=="Not-Read"){ ?> <a href="include/updatenot.php?id=<?php echo $notification['notification_id'] ?>"><label class="rela">Mark as Read</label></a><?php }?></b><br><br>
				<i><?php echo $notification['notificationBody'] ?></i>
				<label class="times"><b><?php echo $notification['timeInter']; ?></b></label>
			</div>
			<br>
			<?php
		}
	}else{

		echo"<center>No Notification</center>";
	}
?>

<style type="text/css">
	#Not-Read{
		background-color: #ea5050;
	}
	#read{
		background-color: white;
		color: black;
	}
	.rela{
		float: right;
		margin-right: 10px;
	}
</style>