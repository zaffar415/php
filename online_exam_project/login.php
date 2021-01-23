
<?php
session_start();
include("dbconnect.php");
/*********************************Admin Login****************************************/
if(isset($_REQUEST["admin"]))
{
    $admin_id=$_REQUEST["admin_id"];
    $password=$_REQUEST["password"];
    $details=mysqli_query($link,"select * from Admin");
    while($rows=mysqli_fetch_array($details))
    {
        if($admin_id==$rows["name"]&&$password==$rows["password"])
        {
            $_SESSION["aid"]=$rows["name"];
            echo "adminuser.php?a=1";
        }
    }

}
/*********************************Student Login****************************************/ 
if(isset($_REQUEST["userlogin"]))
{
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $details=mysqli_query($link,"select * from Students");
    while($row=mysqli_fetch_array($details))
    {
        if($email==$row["email"]&&$password==$row["stud_pass"])
        {
            $_SESSION["uname"]=$row["stud_name"];
            $_SESSION["uid"]=$row["stud_id"];
            $uid=$row["stud_id"];
            echo "1";
        }
    }
}

if(@$_GET['l']==1)
{
   if(!isset($_SESSION["end_time"]))
   {
    $_SESSION["start_time"]=time();
    $query=mysqli_query($link,"select * from Title where visibility=1");
    $query1=mysqli_query($link,"select * from Title1 where visibility=1");
    $val1=mysqli_num_rows($query);
    $val2=mysqli_num_rows($query1);
    $exp_time=($val1/2+$val2)*10*60;
    $_SESSION["end_time"]=$_SESSION["start_time"]+$exp_time;
    header("location:home.php?i=1");
   }
   else
   {
       header("location:home.php?i=1");
   }
}
/*********************************Student Registration****************************************/
if(isset($_REQUEST["stud_reg"]))
{
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $DOB=$_REQUEST["DOB"];
    $gender=$_REQUEST["gender"];
    $aadhar=$_REQUEST["aadhar"];
    $mobile=$_REQUEST["mobile"];
    $date=date("Y-m-d h:i:sa");

    $details=mysqli_query($link,"select * from Students1 where email='$email' or Aadhar_no='$aadhar'");
    $rowcount=mysqli_num_rows($details);
    if($rowcount>0)
    {
        echo "User Already exist Try Login";
    }
    else {
        
        mysqli_query($link,"insert into Students(stud_name,email,stud_pass,DOB,Gender,Aadhar_no,mobile_no,date)values('$name','$email','$password','$DOB','$gender','$aadhar','$mobile','$date')");
        mysqli_query($link,"insert into Students1(stud_name,email,stud_pass,DOB,Gender,Aadhar_no,mobile_no,date)values('$name','$email','$password','$DOB','$gender','$aadhar','$mobile','$date')");
        echo "Registered Successfully";
    }

}
?>