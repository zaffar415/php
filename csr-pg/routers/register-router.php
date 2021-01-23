<?php
include '../include/dbconnect.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

function number($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$count=mysqli_query($con,"select * from users where email='$email' or contact='$phone'");
if(mysqli_num_rows($count)==0)
{
    $sql = "INSERT INTO users ( name,email,password,role,username,address,contact,verified,deleted) VALUES ('$username','$email','$password','Customer','$username','$address','$phone','0','0');";
    if($con->query($sql)==true){
        $user_id =  $con->insert_id;
    }
    header("location: ../reglog/login.php");
}
else {
    header("location: ../reglog/register.php?error=1");
    die();
}

?>