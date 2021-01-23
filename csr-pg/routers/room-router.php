<?php
include '../include/dbconnect.php';
$roomname = htmlspecialchars($_POST['roomname']);
$desc = htmlspecialchars($_POST['desc']);
$ac = htmlspecialchars($_POST['ac']);
$wifi = $_POST['wifi'];
$food = $_POST['food'];
$laundry = $_POST['laundry'];
$price = htmlspecialchars($_POST['price']);
$nop = $_POST['nop'];
$total=$_POST['total'];
$plans=$_POST['plans'];

$desc=str_replace("'","\'",$desc);

if (isset($_POST['upload'])) {
$target=rand().$_FILES['img']['name'];
    if (move_uploaded_file($_FILES['img']['tmp_name'],"../assets/images/uploads/".$target)) {
      print "success {$_FILES['img']['name']}";
    }else{
      print "failed";
    }
  }


      
$sql = "INSERT INTO `rooms`(`name`, `image`, `descrip`, `ac`, `food`, `laundry`, `wifi`, `occupied`, `max`, `price`,`total`,`plans`) VALUES ('$roomname','$target','$desc','$ac','$food','$laundry','$wifi','0','$nop','$price','$total','$plans')";
if($con->query($sql)==true){
$user_id =  $con->insert_id;

}
header("location: ../admin/add-room.php");
?>
