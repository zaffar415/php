<?php
include '../include/dbconnect.php';
$success=false;

$username = $_POST['username'];
$password = $_POST['password'];

/*  Update Room Occupied  */
$today=date('Y-m-d');
mysqli_query($con,"UPDATE requests SET status='completed' where end_date<'$today' && status='approved'");
$update_occupied=mysqli_query($con,"select * from rooms");
while($update_room=mysqli_fetch_array($update_occupied))
{
    $update_id=$update_room['id'];
    $fetch_details=mysqli_query($con,"select * from requests where room_id='$update_id' && status='approved'");
    $occupied=0;
    while($fetch_occupied=mysqli_fetch_array($fetch_details))
    {
        $occupied+=$fetch_occupied['quantity'];
    }
    mysqli_query($con,"UPDATE rooms SET occupied='$occupied' where id='$update_id'");
}
/*  End Update Room Occupied  */

$result = mysqli_query($con, "SELECT * FROM users WHERE email='$username' AND password='$password' AND role='Administrator' AND not deleted;");
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['id'];
	$name = $row['name'];
	$role= $row['role'];
}
if($success == true)
{	
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;

	header("location: ../admin/");
}
else
{
	$result = mysqli_query($con, "SELECT * FROM users WHERE email='$username' AND password='$password' AND role='Customer' AND not deleted;");
	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['id'];
	$name = $row['name'];
	$role= $row['role'];
	$email=$row['email'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['customer_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role'] = $role;
		$_SESSION['name'] = $name;			
		$_SESSION['email']=$email;
		header("location: ../user/rooms.php");
	}
	else
	{
		header("location: ../reglog/login.php?error=1");
	}
}

?>
