<!DOCTYPE HTML>
<?php
include("header.php");
include("dbconnect.php");
echo '
<center>
    <form action="addadmin.php" method="get">
    <input type="text" name="admin_name"><br>
    <input type="password" name="admin_password"><br>
    <input type="submit" name="addAdmin" value="ADD">
    </form>
    <br>
    <a href="addadmin.php?view=1">View</a>
</center> ';

if(isset($_REQUEST["addAdmin"]))
{
    $admin_name=$_REQUEST["admin_name"];
    $admin_password=$_REQUEST["admin_password"];
    mysqli_query($link,"insert into Admin(name,password)values('$admin_name','$admin_password')");
}

if(isset($_REQUEST["delete"]))
{
    $del=$_REQUEST["delete"];
    mysqli_query($link,"delete from Admin where No='$del'");
}

if(@$_GET["view"]==1)
{
    $admins=mysqli_query($link,"select * from Admin");
    echo "<center><table border=1>";
    while($rows=mysqli_fetch_array($admins))
    {
        echo "<tr><th>".$rows["name"]."</th>";
        echo "<td><a href=addadmin.php?delete=".$rows['No'].">Delete</a></td></tr>"; 
    }
    echo "</table></center>";
}

?>