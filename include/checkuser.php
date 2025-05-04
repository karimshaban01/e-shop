<?php
	
	session_start();

	include 'conn.php';

	if(isset($_POST['login_btn'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$select = "select * from users_tbl where username = '$username' and password ='$password'";
		$query = mysqli_query($con,$select);
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_row($query);

		if($count == 1){

			if($row[6]=="admin"){

				$_SESSION['adminID'] = $row[0];
				header('location:admin/?page=index');

			}else if($row[6]=="user"){

				$_SESSION['userID'] = $row[0];
				header("location:index.php?page=index&pagename=Lyuba Shop | Home");
			}

		}else{

			$message = "Wrong Password";

		}
	}else if(isset($_POST['register_btn'])){

		$username = $_POST['username'];
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];

		$select = "select * from users_tbl where phonenumber = '$phonenumber'";
		$query = mysqli_query($con,$select);
		$count = mysqli_num_rows($query);

		if($count == 0){

			$insert = "insert into users_tbl values(null,'$username','$phonenumber','$password','default.jpg','active','user')";
			$result = mysqli_query($con,$insert);

			if($result == 1){

				$select1 = "select * from users_tbl where phonenumber = '$phonenumber'";
				$query1 = mysqli_query($con,$select1);
				$count1 = mysqli_num_rows($query1);
				$row = mysqli_fetch_row($query1);

				if($count1 == 1){

					$_SESSION['userID'] = $row[0];
					header("location:http:register.php?step=second");

				}
			}

		}else{
			$message = "User Is Exist";

		}
	}else if(isset($_POST['upload'])){

		$userID = $_SESSION['userID'];
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$size = getimagesize($_FILES['image']['tmp_name']);

		move_uploaded_file($_FILES['image']['tmp_name'], './admin/upload/'.$_FILES['image']['name']);

		$profile = $_FILES['image']['name'];

		$update = "UPDATE users_tbl SET profilepicture = '$profile' WHERE userID = '$userID'";
		$query = mysqli_query($con,$update);

		if($query == 1){

			$time = date("H:i:a, d-m-Y");
			$title = "A new user has registered on your system";
			$body = "hello mr admin a new user has registered in your system, now you are increasing the number of customers in the system";
			$insertadd = "INSERT INTO notification_tbl VALUES(NULL,'admin','$title','$body','$userID','viewprofile','Not-Read','$time')";
					$resultadd = mysqli_query($con,$insertadd);
			header("location:index.php?page=index&pagename=Lyuba Shop | Home");
		}

	}
?>