<?php
include '../include/dbconnect.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_status/",$key)){
			$key = strtok($key, '_'); 
			$sql = "UPDATE requests SET status = '$value' WHERE id = $key;";
			$con->query($sql);
				$room_id=$_POST[$key."_room_id"];
				$rooms=mysqli_query($con,"select * from requests where room_id='$room_id' && status='approved'");
				$occupied=0;
				while($row=mysqli_fetch_array($rooms))
				{
					$occupied+=$row['quantity'];
				}
				mysqli_query($con,"UPDATE rooms SET occupied='$occupied' where id='$room_id'");
		}
		if(preg_match("/[0-9]+_description/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE requests SET description = '$value' WHERE id = $key;";
			$con->query($sql);
		}
	}
		
		
header("location: ../admin/my-requests.php");
?>