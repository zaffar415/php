<?php
include '../include/dbconnect.php';
$user_id = $_SESSION['user_id'];



$password =  htmlspecialchars($_POST['password']);

$sql = "UPDATE users SET  password='$password' WHERE id = $user_id;";
if($con->query($sql)==true){
	header('location:../reglog/pass.php?i=2');
}
echo '<script>alert("Password Updated Successfully")</script>';
?>