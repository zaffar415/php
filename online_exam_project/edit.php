<!DOCTYPE HTML>

<?php
include("header.php");
include("dbconnect.php");
$Qdetails=mysqli_query($link,"select * from Question");
$Adetails=mysqli_query($link,"select * from Answers");        
if(isset($_REQUEST["Qno"]))
{
    $Qno=$_REQUEST["Qno"];
    $Qdetails=mysqli_query($link,"select * from Question where Qno=$Qno");
    $Qrowcount=mysqli_num_rows($Qdetails);
    $Qrows=mysqli_fetch_array($Qdetails);
    //echo $Qrows["Question"];
    //echo $Qrows["Ansid"];
    $Adetails=mysqli_query($link,"select * from Answers where Qno=$Qno order by No");    
}
if(isset($_REQUEST["Del_Qno"]))
{
    /*******************************Quiz Question Delete Queries start*****************************/
    $Del_Qno=$_REQUEST["Del_Qno"];
    $Qrows=mysqli_fetch_array($Qdetails);
    mysqli_query($link,"delete from Question where Qno=$Del_Qno");
    mysqli_query($link,"delete from Answers where Qno=$Del_Qno");
    header("location:adminuser.php?a=2");
    /*******************************Quiz Question Delete Queries End*****************************/
}
if(isset($_REQUEST["Del_QA"]))
{
    /*******************************Part B Question Delete Queries Start*****************************/
    $Del_QA=$_REQUEST["Del_QA"];
    $Qrows=mysqli_fetch_array($Qdetails);
    mysqli_query($link,"delete from QA where Qno=$Del_QA");
    header("location:adminuser.php?a=21");
    /*******************************Part B Question Delete Queries End*****************************/
}
if(isset($_REQUEST["Del_id"]))
{
    /*******************************Student Delete Queries Start*****************************/
    $Del_id=$_REQUEST["Del_id"];
    mysqli_query($link,"delete from Students where stud_id='$Del_id'");
    mysqli_query($link,"delete from Students1 where stud_id='$Del_id'");
    mysqli_query($link,"delete from Result where stud_id='$Del_id'");
    mysqli_query($link,"delete from Rank where id='$Del_id'");     
    header("location:adminuser.php?a=3");
    /*******************************Student Delete Queries End*****************************/
}

if(isset($_REQUEST["submit"]))
{

    /*******************************Quiz Update Queries Start*****************************/
    $Question=$_REQUEST["Question"];
    $Ansid=$_REQUEST["Ansid"];
    for($i=1;$i<=4;)
    {
        $Option1=$_REQUEST["Option$i"];
        $i++;
        $Option2=$_REQUEST["Option$i"];
        $i++;
        $Option3=$_REQUEST["Option$i"];
        $i++;
        $Option4=$_REQUEST["Option$i"];
        $i++;
    }
    $Qdetails=mysqli_query($link,"select * from Question where Qno=$Qno");
    $Qrows=mysqli_fetch_array($Qdetails);
    mysqli_query($link,"update Question set Question='$Question' where Qno='$Qno'");
    mysqli_query($link,"update Question set Ansid='$Ansid' where Qno='$Qno'");

    mysqli_query($link,"update Answers set Options='$Option1' where Qno='$Qno' AND No='1'");
    mysqli_query($link,"update Answers set Options='$Option2' where Qno='$Qno' AND No='2'");
    mysqli_query($link,"update Answers set Options='$Option3' where Qno='$Qno' AND No='3'");
    mysqli_query($link,"update Answers set Options='$Option4' where Qno='$Qno' AND No='4'");
    header("location:adminuser.php?a=2");
    /*******************************QUiz Update Queries End*****************************/
}

if(isset($_REQUEST["data"]))
{
    /*******************************Quiz Title Entry Query Start*****************************/
    $data=$_REQUEST["data"];
    if(!empty($data))
    {
        mysqli_query($link,"insert into Title(Subject,visibility)values('$data',1)");
    }
    /*******************************Quiz Title Entry Query End*****************************/
}


if(isset($_REQUEST["QAsub"]))
{
    /*******************************Part B Title Entry Query Start*****************************/
    $QAsub=$_REQUEST["QAsub"];
    if(!empty($QAsub))
    {
        mysqli_query($link,"insert into Title1(Subject,visibility)values('$QAsub',1)");
    }
    header("location:adminuser.php?a=1");
    /*******************************Part B Title Entry Query End*****************************/
}

if(isset($_REQUEST["Title"]))
{
    /*******************************Quiz Delete Queries Start*****************************/ 
    $section=$_REQUEST["Title"];
    $Qdetails=mysqli_query($link,"select * from Question where Section='$section'");
    while($Qrows=mysqli_fetch_array($Qdetails))
    {
        $Qno=$Qrows["Qno"];
        $Adetails=mysqli_query($link,"select * from Answers where Qno=$Qno");
        while($Arows=mysqli_fetch_array($Adetails))
        {
            mysqli_query($link,"delete from Answers where Qno=$Qno");
        }
        mysqli_query($link,"delete from Question where Qno=$Qno");
    }
    $Tdetails=mysqli_query($link,"select * from Title");
    while($Trows=mysqli_fetch_array($Tdetails))
    {
        mysqli_query($link,"delete from Title where Subject='$section'");
    }
    header("location:adminuser.php?a=1");
    /*******************************Quiz Delete Queries End*****************************/
}

if(isset($_REQUEST["Title1"]))
{
    /*******************************Part B Delete Queries Start*****************************/    
    $section=$_REQUEST["Title1"];
    mysqli_query($link,"delete from Title1 where Subject='$section'");
    mysqli_query($link,"delete from QA where Section='$section'");
    header("location:adminuser.php?a=1");
    /*******************************Part B Delete Query End*****************************/ 
}

if(isset($_REQUEST["hide"]))
{
    $hide=$_REQUEST["hide"];
    mysqli_query($link,"update Title set visibility=0 where id=$hide");
    header("location:adminuser.php?a=1");
}

if(isset($_REQUEST["shows"]))
{
    $show=$_REQUEST["shows"];
    mysqli_query($link,"update Title set visibility=1 where id=$show");
    header("location:adminuser.php?a=1");
}

if(isset($_REQUEST["hide1"]))
{
    $hide=$_REQUEST["hide1"];
    mysqli_query($link,"update Title1 set visibility=0 where id=$hide");
    header("location:adminuser.php?a=1");
}

if(isset($_REQUEST["shows1"]))
{
    $show=$_REQUEST["shows1"];
    mysqli_query($link,"update Title1 set visibility=1 where id=$show");
    header("location:adminuser.php?a=1");
}
?>

<style>
div {
    display:flex; 
    justify-content:center; 
    font-size:20px;
}
div input {
    font-size:20px;
}
</style>

<body style="display:block;">
<div>
<form method=post>
    <table>
        <tr>
        <td>Question (<?php echo $Qrows["Qno"]; ?>):</td>
        <td><input type="text" name="Question" value="<?php echo $Qrows['Question']; ?>"></td>
        </tr>
        <tr>
        <td>Answer :</td>
        <td><input type="text" name="Ansid" value="<?php echo $Qrows['Ansid']; ?>"></td>
        </tr>
        <?php 
        $i=1;
        while($Arows=mysqli_fetch_array($Adetails))
        {
            ?>
            <tr>
            <td>Option (<?php echo $i; ?>)</td>
            <td><input type="text" name="Option<?php echo $i; ?>" value="<?php echo $Arows['Options']; ?>"></td>
            </tr>
            <?php
            $i++;
        }
        //echo $Qrows["Ansid"];
        ?>
        <tr>
        <td colspan="2" style="padding:10px; text-align:right"><input type="submit" name="submit" style="background:green; padding:5px; border:none; border-radius:5px;"></td>
        </tr>
    </table>
</form>
</div>
</body>