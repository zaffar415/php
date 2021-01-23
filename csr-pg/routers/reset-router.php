<?php
include '../include/dbconnect.php';
$success=false;

$email = $_POST['email'];


$result = mysqli_query($con, "SELECT * FROM users WHERE email='$email'  AND role='Customer'");
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
	$_SESSION['customer_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['role'] = $role;
	$_SESSION['name'] = $name;

	header("location: ../reglog/pass.php");
}
else
{
	
        echo '<script>alert("Please Enter Registered E-Mail Or Entered E-Mail is not Registered")</script>';
        
	}

?>