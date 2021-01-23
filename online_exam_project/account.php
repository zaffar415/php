<!doctype HTML>
<?php 
include("header1.php");
include("dbconnect.php");
?>
<head>
    <style>
        table {
            background:white;
            margin:10px 2% 50px 2%;
            margin-top:50px;
            padding:15px;
            text-align:center;
            width:96%;
            font-size:20px;
            border-spacing:0px;
        }

        table:hover {
            box-shadow:10px 8px 20px 0px black;
        }
        
        th {
            line-height:40px;
            border-bottom:1px solid black;
        }

        td {
            line-height:50px;
            text-align:center;
            font-size:18px;
        }
        tr:hover {
            background:#f5f5f5;
        }
    </style>
</head>

<?php
if(isset($_SESSION["uid"])&&isset($_SESSION["uname"]))
{
    $uid=$_SESSION["uid"];
/*******************************Profile*****************************/
    $details=mysqli_query($link,"select * from Students1 where stud_id='$uid'");
    $rowscount=mysqli_num_rows($details);
    if($rowscount==1)
    {
        while($row=mysqli_fetch_array($details))
        {
            echo '<table style="padding:10px 400px;">';
            echo '<tr><td>Student ID :</td><td>'.$row["stud_id"].'</td></tr>';
            echo '<tr><td>Username :</td><td>'.$row["stud_name"].'</td></tr>';
            echo '<tr><td>E-mail-ID :</td><td>'.$row["email"].'</td></tr>';
            echo '<tr><td>Gender :</td><td>'.$row["Gender"].'</td></tr>';
            echo '<tr><td>Aadhar Number :</td><td>'.$row["Aadhar_no"].'</td></tr>';
            echo '<tr><td>Mobile Number :</td><td>'.$row["mobile_no"].'</td></tr>';
        }
    }
    /*******************************Profile End*****************************/
    $result_details=mysqli_query($link,"select * from Result where stud_id='$uid'");
    $overall=0;
    $no=0;
    echo '<table style="padding:20px 70px;">';
    echo '<caption><center><h1>Account Summary</h1></center></caption>';
    echo '<tr>
            <th><h3>S No</h3></th>
            <th style="color:blue;"><h3>Section</h3></th>
            <th style="color:#66CCFF;"><h3>Total Question</h3></th>
            <th style="color:#99CC32;"><h3>Right Answer <i class="far fa-check-circle"></i></h3></th>
            <th style="color:#FF0000;"><h3>Wrong Answer <i class="far fa-times-circle"></i></h3></th>
            <th style="color:#66CCFF;"><h3>Score <i class="fas fa-star"></i></h3></th>
        </tr>';
    echo '<caption><hr></caption>';
    
    while($rows=mysqli_fetch_array($result_details))
    {
        $no++;
        $overall=$overall+$rows["Result"];
        $wrong=10-$rows["Correct"];
        echo'<tr>
                <td><h3>'.$no.'</h3></td>
                <td><h3>'.$rows["Section"].'</h3></td>
                <td><h3>10</h3></td>
                <td><h3>'.$rows["Correct"].'</h3></td>
                <td><h3>'.$wrong.'</h3></td>
                <td><h3>'.$rows["Result"].'</h3></td>
            </tr>';
    }
    echo '<tr style="color:green">
        <td colspan=3><h1>OVERALL <i class="fas fa-chart-bar"></i></h1></td>
        <td colspan=3><h1>'.$overall.'</h1></td>
        </tr>';
    echo'</table>';
}

/*******************************Report View -admin*****************************/
elseif(isset($_REQUEST["view_id"])) 
{
    $view_id=$_REQUEST["view_id"];
    ?>
    <style>
        #header>li>a {
            display:none;
        }
    </style>
    <?php
    /*******************************Student Details*****************************/
    $details=mysqli_query($link,"select * from Students1 where stud_id='$view_id'");
    $rowscount=mysqli_num_rows($details);
    if($rowscount==1)
    {
        while($row=mysqli_fetch_array($details))
        {
            echo '<table style="padding:0px 500px;">';
            echo '<tr><td>Student ID :</td><td>'.$row["stud_id"].'</td></tr>';
            echo '<tr><td>Username :</td><td>'.$row["stud_name"].'</td></tr>';
            echo '<tr><td>E-mail-ID :</td><td>'.$row["email"].'</td></tr>';
            echo '<tr><td>Gender :</td><td>'.$row["Gender"].'</td></tr>';
            echo '<tr><td>Aadhar Number :</td><td>'.$row["Aadhar_no"].'</td></tr>';
            echo '<tr><td>Mobile Number :</td><td>'.$row["mobile_no"].'</td></tr>';
        }
    }
    /*******************************Student Details*****************************/
    $result_details=mysqli_query($link,"select * from Result where stud_id='$view_id'");
    $overall=0;
    $no=0;
    echo '<table style="padding:20px 70px;">';
    echo '<caption><center><h1>Account Summary</h1></center></caption>';
    echo '<tr>
            <th><h3>S No</h3></th>
            <th style="color:blue;"><h3>Section</h3></th>
            <th style="color:#66CCFF;"><h3>Total Question</h3></th>
            <th style="color:#99CC32;"><h3>Right Answer <i class="far fa-check-circle"></i></h3></th>
            <th style="color:#FF0000;"><h3>Wrong Answer <i class="far fa-times-circle"></i></h3></th>
            <th style="color:#66CCFF;"><h3>Score <i class="fas fa-star"></i></h3></th>
        </tr>';
    echo '<caption><hr></caption>';
    while($rows=mysqli_fetch_array($result_details))
    {
        $no++;
        $overall=$overall+$rows["Result"];
        $wrong=10-$rows["Correct"];
        echo'<tr>
                <td><h3>'.$no.'</h3></td>
                <td><h3>'.$rows["Section"].'</h3></td>
                <td><h3>10</h3></td>
                <td><h3>'.$rows["Correct"].'</h3></td>
                <td><h3>'.$wrong.'</h3></td>
                <td><h3>'.$rows["Result"].'</h3></td>
            </tr>';
    }
    echo '<tr style="color:green">
        <td colspan=3><h1>OVERALL <i class="fas fa-chart-bar"></i></h1></td>
        <td colspan=3><h1>'.$overall.'</h1></td>
        </tr>';
    echo'</table>';
}

?>