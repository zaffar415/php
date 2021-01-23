<!DOCTYPE html>
<?php
include("header1.php");
include("dbconnect.php");
if(isset($_REQUEST["fname"]))
{
    $name=$_REQUEST["fname"];
    $sub=$_REQUEST["sub"];
    $email=$_REQUEST["email"];
    $feedback=$_REQUEST["feedback"];
    $date=date("Y-m-d h:i:sa");
    mysqli_query($link,"insert into Feedbacks(name,sub,email,feedback,date)values('$name','$sub','$email','$feedback','$date')");
}
if(isset($_REQUEST["fid"]))
{
    $fid=$_REQUEST["fid"];
    mysqli_query($link,"delete from Feedbacks where No=$fid");
    header("location:adminuser.php?a=5");
}
?>
