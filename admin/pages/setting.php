<div class="registerAdmin">
	<strong>Add Admin</strong><hr><br>
	<form method="POST">
		<table width="100%">
			<tr>
				<td><input type="text" name="username" placeholder="Username" required></td>
				<td><input type="number" name="phonenumber" placeholder="Phonenumber" required></td>
				<td><input type="password" name="password" placeholder="Password" required></td>
				<td><input type="submit" name="addAdmin" value="Add Admin"></td>
			</tr>
		</table>
	</form><br>
</div><br>
<div class="settingDiv">
	<div class="div1">
		<div  class="addType">
			<strong>Type List</strong><hr>
			<table width="100%" class="styled-table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Type Name</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$selectType = "select * from types_tbl order by typename asc";
						$queryType = mysqli_query($con,$selectType);
						if(mysqli_num_rows($queryType)> 0){
							while($types = mysqli_fetch_assoc($queryType)){
								?>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $types['typename'];?></td>
									<td>
										<a href="include/action.php?pg=type&u=<?php echo $types['typeId']?>"><label class="deletebtn">Delete</label></a>
									</td>
								</tr>
								<?php
							}
						}else{
							?>
							<tr>
								<td colspan="3"><center>No Type Added</center></td>
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="listType">
			<strong>Add Type</strong><hr>
			<form method="POST">
				<input type="text" name="type" placeholder="Enter Type" required><br><br>

				<input type="submit" name="addtype" value="Add Type">
			</form>
		</div>
	</div>
	<div class="div2">
		<div class="maintanance">
			put the system into maintenance mode<br><br>
			<center>
				<?php 

					if($systemStatus == "on"){
						?>
						<a href="include/systemstatus.php?status=<?php echo $systemStatus;?>"><label class="switchoff">Switch Off</label></a>
						<?php

					}else if($systemStatus == "off"){

						?>
						<a href="include/systemstatus.php?status=<?php echo $systemStatus;?>"><label class="switchon">Switch On</label></a>
						<?php
					}

				?>
			</center>
			<br>
		</div>
		<br>
		<?php

					if($systemStatus == "off"){
						?>
						<div class="errorDiv">Remember, putting the system in maintenance mode will make the user unable to use it until you turn on the system</div>
						<?php
					}
				?>
	</div>
</div>

<style type="text/css">
	.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    
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
.errorDiv{
	padding: 10px;
	width: 90%;
	background-color: pink;
	color: black;
	border-left: 2px solid red;
}
.registerAdmin{
	width: 95%;
	padding: 12px;
	background-color: white;
	box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
	border-top: 2px solid #ea5050;
}
.deletebtn{
	padding: 4px;
	background-color: red;
	color: white;
	border-radius: 4px;
	cursor: pointer;
}

</style>

<?php
	
	if(isset($_POST['addtype'])){

		$nametype = $_POST['type'];

		$inserttype = "insert into types_tbl values(null,'$nametype')";
		$querytype = mysqli_query($con,$inserttype);

		if($querytype == 1){

			echo"<script>location.href='?page=setting';</script>";
		}
	}

?>

<?php
		
	if(isset($_POST['addAdmin'])){

		$username = $_POST['username'];
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];

		$select = "select * from users_tbl where phonenumber = '$phonenumber'";
		$query = mysqli_query($con,$select);
		$count = mysqli_num_rows($query);

		if($count == 0){

			$insert = "insert into users_tbl values(null,'$username','$phonenumber','$password','default.jpg','active','admin')";
			$result = mysqli_query($con,$insert);

			if($result == 1){

				echo"<script>alert('User Registered Succesful');</script>";

		}
	}else{
			echo"<script>alert('User is Exist!');</script>";

		}

	}

?>