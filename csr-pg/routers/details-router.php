<?php
include '../include/dbconnect.php';
$user_id = $_SESSION['user_id'];


$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$password =  htmlspecialchars($_POST['password']);
$phone = $_POST['phone'];
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$sql = "UPDATE users SET name = '$name', username = '$username', contact=$phone, email='$email', address='$address' WHERE id = $user_id;";
if($con->query($sql)==true){
	$_SESSION['name'] = $name;
}

if(!empty($password))
{
	$sql = "UPDATE users SET password='$password' WHERE id = $user_id;";
}
if($con->query($sql)==true){
	$_SESSION['name'] = $name;
}
header("location: ../user/account.php");
?>