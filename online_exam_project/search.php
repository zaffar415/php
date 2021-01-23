<?php
include("dbconnect.php");
if(isset($_REQUEST["search_id"]))
{
    $search_id=$_REQUEST["search_id"];
            $stud_details=mysqli_query($link,"select * from Students1 where stud_name LIKE '%$search_id%'");
            $no=1;
            echo "<div align=center>";
            echo "<h4 style='padding:10px'>Search Result :</h4>";
            echo "<table class='table'>";
            echo "<tr> 
                    <th> S.No </th>
                    <th> STUDENT ID </th>
                    <th> STUDENT NAME </th>
                    <th> E-mail </th>
                    <th> PASSWORD </th>
                    <th> DOB </th>
                    <th> GENDER </th>
                    <th> AADHAR NO </th>
                    <th> MOBILE </th>
                    <th> DELETE <th>
                </tr>";
            while($rows=mysqli_fetch_array($stud_details))
            {
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$rows["stud_id"]."</td>";
                echo "<td>".$rows["stud_name"]."</td>";
                echo "<td>".$rows["email"]."</td>";
                echo "<td>".$rows["stud_pass"]."</td>";
                echo "<td>".$rows["DOB"]."</td>";
                echo "<td>".$rows["Gender"]."</td>";
                echo "<td>".$rows["Aadhar_no"]."</td>";
                echo "<td>".$rows["mobile_no"]."</td>";
                $Del_id=$rows["stud_id"];
                echo "<td><a href='edit.php?Del_id=$Del_id' style='color:red;'>Delete</a><td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
            echo "</div>";
}
if(isset($_REQUEST["search_rank"]))
{ 
        $search_rank=$_REQUEST["search_rank"];
        echo '<div id="rank">';
        $rank_details=mysqli_query($link,"select * from Rank where name LIKE '%$search_rank%' order by score");
        $no=1;
        echo "<div align=center>";
        echo "<h4 style='padding:10px'>Search Result :</h4>";
        echo "<table class='table'>";
        echo "<tr> 
                <th> Rank </th>
                <th> STUDENT NAME </th>
                <th> Score </th>
                <th> view </th>
            </tr>";
        while($rows=mysqli_fetch_array($rank_details))
        {
            $view_id=$rows["id"];
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$rows["name"]."</td>";
            echo "<td>".$rows["score"]."</td>";
            echo "<td><a href='account.php?view_id=".$view_id."'>view</a></td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
        echo "</div>";
        echo '</div>';   
}

if(isset($_REQUEST["Quiz_search"]))
{ 
    $Quiz_search=$_REQUEST["Quiz_search"];
    echo '<form action="" id=displayall style="text-align:center;" method="post">
        <div>
            <table class="table">
                <tr>
                    <th>SNo.</th>
                    <th width="500px">Question</th>
                    <th>Answer</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';
                        $Qdetails=mysqli_query($link,"select * from Question where Question LIKE '%$Quiz_search%' order by Qno");
                        $Qrowcount=mysqli_num_rows($Qdetails);
                        while($Qrows=mysqli_fetch_array($Qdetails))
                        {
                            $i=$Qrows["Qno"];
                            echo '<tr>
                            <td style="height:50px;">'.$Qrows["Qno"].'</td>
                            <td>'.$Qrows["Question"].'</td>
                            <td>'.$Qrows["Ansid"].'</td>';
                            $Adetails=mysqli_query($link,"select * from Answers where Qno=$i Order by No");
                            $Arowcount=mysqli_num_rows($Adetails);
                            while($Arows=mysqli_fetch_array($Adetails))
                            {
                                echo '<td>'.$Arows["Options"].'</td>'; 
                            }
                            echo '<td><a href="edit.php?Qno='.$Qrows["Qno"].'"><i style="color:blue" class="fas fa-edit"></i></a></td>
                                <td><a href="edit.php?Del_Qno='.$Qrows["Qno"].'"><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                            </tr>';     
                        }
            echo '</table>
            </div>
        </form>';
}

if(isset($_REQUEST["searchB"]))
{
    $searchB=$_REQUEST["searchB"];
    echo '<form action="" id=display style="text-align:center;" method="post">
        <div>
            <table class="table">
                <tr>
                    <th>SNo.</th>
                    <th width="900px">Question</th>
                    <th>Answer</th>
                    <th>Delete</th>
                </tr>';
                        $Qdetails=mysqli_query($link,"select * from QA where Question LIKE '%$searchB%'");
                        $Qrowcount=mysqli_num_rows($Qdetails);
                        while($Qrows=mysqli_fetch_array($Qdetails))
                        {
                            $i=$Qrows["Qno"];
                            echo '<tr>
                            <td style="height:50px;">'.$Qrows["Qno"].'</td>
                            <td>'.$Qrows["Question"].'</td>
                            <td>'.$Qrows["Answer"].'</td>        
                            <td><a href="edit.php?Del_QA='.$Qrows["Qno"].'"><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                            </tr>';     
                        }
            echo '</table>
        </div>
    </form>';
}

?>
