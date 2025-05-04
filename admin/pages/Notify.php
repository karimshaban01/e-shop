<?php
	
	if($_GET['userID'] == ""){

		header("location:?page=users");
	}

?>

<div class="addType">
	<strong>Send Notification</strong><hr>
	<form  method="POST" class="editUserDetails">
		<input type="text" name="text" placeholder="Enter Title" required><br><br>
		<textarea name="body" placeholder="Enter Body" required></textarea><br><br>
		<input type="submit" name="send" value="Send Notification">
	</form><br>
</div>

<?php
	
	if(isset($_POST['send'])){

		$id = $_GET['userID'];
		$title = $_POST['text'];
		$body = $_POST['body'];
		$time = date("H:i:a, d-m-Y");

		$insert = "INSERT INTO notification_tbl VALUES(NULL,'$id','$title','$body','none','direct','Not-Read','$time')";
		$query = mysqli_query($con,$insert);

		if($query == 1){

			echo"<script>alert('Notification Send');</script>";
			echo"<script>location.href = window.location.href;</script>";

		}
	}

?>