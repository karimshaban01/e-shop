<?php
	
	$selectSystemStatus = "select * from system_db";
	$querySystemStatus = mysqli_query($con,$selectSystemStatus);
	if(mysqli_num_rows($querySystemStatus)> 0){
		while($systemStatus = mysqli_fetch_assoc($querySystemStatus)){

			if($systemStatus['status']== "off"){

				header("location:include/maintanance.php");
			}
		}
	}

?>