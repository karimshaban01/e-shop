<div class="usersDiv">
	<div class="header-user">
		<strong>Users List</strong>
	</div><hr>
	<table class="styled-table">
		<thead>
			<tr>
				<td>No</td>
				<td>Username</td>
				<td>Phonenumber</td>
				<td>Role</td>
				<td style="float: right;">Action</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$selectExistUser = "select * from users_tbl order by username asc";
				$queryExistUser = mysqli_query($con,$selectExistUser);
				if(mysqli_num_rows($queryExistUser)> 0){
					while ($userData = mysqli_fetch_assoc($queryExistUser)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $userData['username']; ?></td>
							<td><?php echo $userData['phonenumber']; ?></td>
							<td><?php echo $userData['role']; ?></td>
							<td style="float: right;">
								<?php

									if($user_id == $userData['userID']){

									}else{

											?>
										<a href="include/action.php?action=delete&pg=users&u=<?php echo $userData['userID']?>"><label class="deletebtn">Delete</label></a>
								<?php

									if($userData['status']=="active"){

										?>
										<a href="include/action.php?action=deactivate&pg=users&u=<?php echo $userData['userID']?>"><label class="deactivate">Deactivate</label></a>
										<?php
									}else{

										?>
										<a href="include/action.php?action=activate&pg=users&u=<?php echo $userData['userID']?>"><label class="activate">Activate</label></a>
										<?php
									}
								?>
										<?php
									}
								?>
								<a href="?page=viewprofile&userid=<?php echo $userData['userID']?>"><label class="viewprofile">View Profile</label></a>
							</td>
						</tr>
						<?php
					}
				}else{

					?>
					<tr>
						<td colspan="5">
							No user at The Moment
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
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
