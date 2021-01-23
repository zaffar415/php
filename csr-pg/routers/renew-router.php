<?php
include '../include/dbconnect.php';
	// foreach ($_POST as $key => $value)
	// {
	// 	if(preg_match("/[0-9]+_status/",$key)){
	// 		$key = strtok($key, '_');
	// 		$sql = "UPDATE renewals SET status = '$value' WHERE id = $key;";
	// 		$con->query($sql);
	// 	}
	// 	if(preg_match("/[0-9]+_description/",$key)){
	// 		$key = strtok($key, '_');
	// 		$sql = "UPDATE renewals SET description = '$value' WHERE id = $key;";
	// 		$con->query($sql);
    //     }
    // }
	//header("location: ../renewals.php");
	//print_r($_REQUEST);
	$count=count($_REQUEST['renew_id']);
	for($i=0;$i<$count;$i++)
	{
		$status=$_REQUEST['status'][$i];
		$renew_id=$_REQUEST['renew_id'][$i];
		$room_id=$_REQUEST['room_id'][$i];
		$extend=$_REQUEST['extend'][$i];
		$user_id=$_REQUEST['user_id'][$i];

		mysqli_query($con,"UPDATE renewals SET status = '$status' WHERE id = $renew_id;");

		if($status=='approved')
		{
			$details=mysqli_query($con,"select * from requests where userid='$user_id' && room_id='$room_id'");
			if($row=mysqli_fetch_array($details))
			{
				$date=date_create($row['end_date']);
				date_add($date,date_interval_create_from_date_string("$extend days"));
				$end_date = date_format($date,"Y-m-d");
				mysqli_query($con,"UPDATE requests SET end_date = '$end_date' WHERE room_id='$room_id' && userid='$user_id' ");
			}		
			mysqli_query($con,"DELETE from renewals WHERE id = $renew_id;");
		}

	}

	header("location: ../admin/renewals.php");
?>