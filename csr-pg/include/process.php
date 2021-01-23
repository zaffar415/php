<?php 

include('dbconnect.php');

$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['name'];
$user_email=$_SESSION['email'];
$today=date('Y-m-d');
/*  Update Room Occupied  */
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

if(isset($_REQUEST['new-booking']))
{
    $room=$_REQUEST['room_name'];   
    $room_id=$_REQUEST['room_id'];
    $start_date=$_REQUEST['start_date'];
    $duration=$_REQUEST['plan']=='short' ? $_REQUEST['month'] : $_REQUEST['year'];
    $date=date_create("$start_date");
  
    $add=date_add($date,date_interval_create_from_date_string("$duration months"));
    $end_date= $add->format('Y-m-d');
  
    
   
    $quantity=$_REQUEST['quantity'];
    if(mysqli_query($con,"insert into requests(userid,name,email,room,room_id,start_date,end_date,duration,quantity,status)values('$user_id','$user_name','$user_email','$room','$room_id','$start_date','$end_date','$duration','$quantity','pending')"))
    {
        header("location:../user/thankyou.php");
    }
    else {
        header("location:".$_SERVER["HTTP_REFERER"]);
    }
}   


if(isset($_REQUEST['extend']))
{
    $room_id=$_REQUEST['room_id'];
    $room_name=$_REQUEST['room_name'];
    $extend=$_REQUEST['extend'];
    if(mysqli_query($con,"insert into renewals(user_id,user,email,room_id,room_name,extend,status)values('$user_id','$user_name','$user_email','$room_id','$room_name','$extend','pending')"))
    {
        print_r($_REQUEST);
        header("location:".$_SERVER["HTTP_REFERER"]);
    }
    else {
        echo "Error";
    }
}

if(@($_GET['delete_request']))
{
    $delete_id=$_GET['delete_request'];
    $user_id=$_SESSION['user_id'];
    mysqli_query($con,"delete from requests where id='$delete_id' && userid='$user_id'");
    header("location:".$_SERVER["HTTP_REFERER"]);
}
if(@($_GET['room_delete']))
{
    $delete_id=$_GET['room_delete'];
    $user_id=$_SESSION['user_id'];
    $del_details=mysqli_query($con,"select * from rooms where id='$delete_id'");
    if($del=mysqli_fetch_array($del_details))
    {
        unlink("../assets/images/uploads/".$del['image']);
        mysqli_query($con,"delete from rooms where id='$delete_id'");
    }
    header("location:".$_SERVER["HTTP_REFERER"]);
}
if(@($_GET['delete_renewals']))
{
    $delete_id=$_GET['delete_renewals'];
    $user_id=$_SESSION['user_id'];
    mysqli_query($con,"delete from renewals where id='$delete_id'");
    header("location:".$_SERVER["HTTP_REFERER"]);
}

if(@($_GET['f_del']))
{
    $f_id=$_GET['f_del'];
    mysqli_query($con,"delete from feedback where id='$f_id'");
    header("location:".$_SERVER["HTTP_REFERER"]);
}