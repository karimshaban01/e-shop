<strong>Notification</strong><br><hr>
<?php
	
	$selectNot = "select * from notification_tbl where userID = 'admin' order by notification_id desc";
	$queryNot = mysqli_query($con,$selectNot);
	if(mysqli_num_rows($queryNot)> 0){
		while($notification = mysqli_fetch_assoc($queryNot)){
			?>
			<a href="?page=<?php echo $notification['direct']?>&<?php 

				if($notification['direct'] == "viewprofile"){

					echo"userid";

				}else if($notification['direct'] == "viewOrderDetail"){

					echo"oid";

				} else if($notification['direct'] == "productsDetails"){

					echo"pid";
				}

		?>=<?php echo $notification['link']?>">
				<div onclick="updateNot('<?php echo $notification['notification_id'];?>')" class="notificationDiv" id="<?php echo $notification['action']?>">
					<b><?php  echo $notification['title']; ?></b><br><br>
					<i><?php echo $notification['notificationBody'] ?></i>
					<label class="times"><b><?php echo $notification['timeInter']; ?></b></label>
				</div>
			</a>
			<br>
			<?php
		}
	}else{

		echo"<center>No Notification</center>";
	}
?>
<script type="text/javascript">
	function updateNot(notid){

		var id = notid;

		$.ajax({
			method:"POST",
			url:"include/updatenot.php",
			data:{
				id:id
			},
		})
	}
</script>