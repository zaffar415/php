<!Doctype HTML>
<?php
session_start();
include("header.php");
include("dbconnect.php");
?>
<header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        /*******************************Add Title for Quiz*****************************/
        function new_sub()
        {
            var data=$("#new_sub").val();
            if(data!="")
            {
                $.ajax({
                    type:'post',
                    url:'edit.php',
                    data:{data},
                    success:function(result) {
                        alert("New Title Added");
                        window.location.href="adminuser.php?a=1";
                    }
                });
            }
        }
        /*******************************Add Title for Part B*****************************/
        function new_QAsub()
        {
            var QAsub=$("#new_QAsub").val();
            if(QAsub!="")
            {
                $.ajax({
                    type:'post',
                    url:'edit.php',
                    data:{QAsub},
                    success:function(result) {
                        alert("New Title Added");
                        window.location.href="adminuser.php?a=1";
                    }
                });
            }
        }
        /*******************************Search Student*****************************/
        function searchid() 
        {
            var search_id=$("#searchid").val();
            $.ajax({
                type:'post',
                url:'search.php',
                data:{search_id},
                success:function(result) {
                    $("#students").html(result);
                }
            });
        
        }
        /*******************************Search Rankers*****************************/
        function searchrank()
        {
            var search_rank=$("#search_rank").val();
            $.ajax({
                type:'post',
                url:'search.php',
                data:{search_rank},
                success:function(result) {
                    $("#rank").html(result);
                }
            });
        }

        function searchquiz()
        {
            var Quiz_search=$("#Quiz-search").val();
            $.ajax({
                type:'post',
                url:'search.php',
                data:{Quiz_search},
                success:function(result) {
                    $("#Quiz").html(result);
                }
            });
        }

        function searchB()
        {
            var searchB=$("#searchB").val();
            $.ajax({
                type:'post',
                url:'search.php',
                data:{searchB},
                success:function(result) {
                    $("#partB").html(result);
                }
            });
        }

    </script>

    <style>
        #question input[type="text"] {
        border:none;
        border-bottom:2px solid black;
        width:80%;
        text-align:center;
        line-height:30px;
        font-size:20px;
        background:transparent;
        }

        #Title {
            display:flex;
            justify-content:center;
        }
        #Title>#div1 {
            width:200px;
            text-align:center;
            margin-left:4px;
            margin-top:5px;
            padding:10px;
            background:lightblue;
            border:3px solid lightblue;
            border-radius:15px;
        }

        #Title>#div2 {
            width:200px;
            text-align:center;
            margin-left:4px;
            margin-top:5px;
            padding:10px;
            background:lightgreen;
            border:3px solid lightgreen;
            border-radius:15px;
        }

        #Title>div>a {
            float:left;
            height:100%;
            width:100%;
        }
        #Title #div1:hover {
            background:white;
        }

        #Title #div2:hover {
            background:white;
        }

        table {
            background:white;
            margin:10px 2% 10px 2%;
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
            background:#82c91e;
        }

        td {
            line-height:50px;
            text-align:center;
            font-size:16px;
            padding:5px;
        }
        tr:hover {
            background:#f5f5d5;
        }

        input:focus {
            outline:none;
        }

        .table td {
            line-height:25px;
        }
    </style>


</header>
<body>
    <?php
    /*******************************Admin Login Check*****************************/
    if(isset($_SESSION["aid"]))
    { 
        if(@$_GET['a']==1)
        {
            /*******************************Home Page*****************************/
            ?>
                <!--------------------------Quiz Title------------------------------->
                <div id="first_view">
                    <h1 style="text-align:center; font-size:50px;"><i>Welcome To Online Exam</i></h1>
                    <img src="http://www.cahc.edu.in/wp-content/themes/emphasize/images/shadow.png" alt="shadow" style="text-align:center; width:100%; height:10px;">
                    <h1 style="text-align:center; font-size:50px;"><i>Part A</i></h1>
                    <div style="text-align:center; margin:0px 200px; background:white; padding:20px 100px;">
                    <?php
                    $Title=mysqli_query($link,"select * from Title order by id");
                    while($Trows=mysqli_fetch_array($Title))
                    {
                    ?>
                        <div style="background:lightgreen; padding:20px; border:5px solid red; border-radius:20px; margin:20px 0px; text-align:left;">
                            <p style="text-decoration:none; color:black;"><?php echo $Trows["Subject"]; ?></p>
                            <div style="text-align:right; margin-top:-25px;">
                            <a style="text-decoration:none; color:black; background:orange; border:solid red; padding:5px;" href="adminuser.php?section=<?php echo $Trows["Subject"]; ?>">START <i style="color:green; padding:5px;" class="fas fa-play"></i></a>
                            <?php
                            if($Trows["visibility"]==1)
                            {
                                echo '<a style="color:blue; padding:0px 0px 0px 10px;" href="edit.php?hide='.$Trows["id"].'"><i class="far fa-eye"></i></a>';
                            }
                            else
                            {
                                echo '<a style="color:black; padding:0px 0px 0px 10px;" href="edit.php?shows='.$Trows["id"].'"><i class="far fa-eye-slash"></i></a>';
                            }
                            ?>
                            <a style="color:red; padding:0px 15px; font-size:20px;" href='edit.php?Title=<?php echo $Trows["Subject"]; ?>'><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                        <div style="background:lightgreen; padding:10px; border:5px solid red; border-radius:20px; margin:20px 300px; text-align:center;">
                            <input id="new_sub" type="text" name=new_sub onfocusout="new_sub()" placeholder="Add New Title" style="text-decoration:none; width:100px; border:none; border-bottom:solid; color:black; background:transparent">
                        </div>
                    </div>
                </div>
                
                <!--------------------------- PART B Title-------------------------------->
                <div id="first_view">
                    <h1 style="text-align:center; font-size:50px;"><i>Part B</i></h1>
                    <div style="text-align:center; margin:0px 200px 100px 200px; background:white; padding:20px 100px;">
                    <?php
                    $Title=mysqli_query($link,"select * from Title1 order by id");
                    while($Trows=mysqli_fetch_array($Title))
                    {
                    ?>
                        <div style="background:lightgreen; padding:20px; border:5px solid red; border-radius:20px; margin:20px 0px; text-align:left;">
                            <p style="text-decoration:none; color:black;"><?php echo $Trows["Subject"]; ?></p>
                            <div style="text-align:right; margin-top:-25px;">
                            <a style="text-decoration:none; color:black; background:orange; border:solid red; padding:5px;" href="adminuser.php?Bsection=<?php echo $Trows["Subject"]; ?>">START <i style="color:green; padding:5px;" class="fas fa-play"></i></a>
                            <?php
                            if($Trows["visibility"]==1)
                            {
                                echo '<a style="color:blue; padding:0px 0px 0px 10px;" href="edit.php?hide1='.$Trows["id"].'"><i class="far fa-eye"></i></a>';
                            }
                            else
                            {
                                echo '<a style="color:black; padding:0px 0px 0px 10px;" href="edit.php?shows1='.$Trows["id"].'"><i class="far fa-eye-slash"></i></a>';
                            }
                            ?>
                            <a style="color:red; padding:0px 15px; font-size:20px;" href='edit.php?Title1=<?php echo $Trows["Subject"]; ?>'><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                        <div style="background:lightgreen; padding:10px; border:5px solid red; border-radius:20px; margin:20px 300px; text-align:center;">
                            <input id="new_QAsub" type="text" name=new_sub onfocusout="new_QAsub()" placeholder="Add New Title" style="text-decoration:none; width:100px; border:none; border-bottom:solid; color:black; background:transparent">
                        </div>
                    </div>
                </div>
                <!----------- Part B Title End--------------->
            <?php
            /*******************************Home Page End*****************************/
        }
        if(@$_GET['a']==3)
        { 
            /*******************************Students List Page*****************************/
            echo '<div style="font-size:20px; text-align:center;">
                  <h1 align=center>Student Details</h1>
                  <h3>Search :</h3>
                  <input id="searchid" type="search" style="font-size:20px;" onkeyup="searchid()" placeholder="Enter Name to Search"></div>';
            echo '<div id="students">';
            $stud_details=mysqli_query($link,"select * from Students1");
            $no=1;
            echo "<div style='text-align:center; padding:10px 0px 50px;'>";
            echo "<table class='table'>";
            echo "<tr> 
                    <th> S.No </th>
                    <th> STUDENT ID </th>
                    <th> STUDENT NAME </th>
                    <th> E-mail </th>
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
                echo "<td>".$rows["DOB"]."</td>";
                echo "<td>".$rows["Gender"]."</td>";
                echo "<td>".$rows["Aadhar_no"]."</td>";
                echo "<td>".$rows["mobile_no"]."</td>";
                $Del_id=$rows["stud_id"];
                echo "<td><a href='edit.php?Del_id=$Del_id' style='color:red;'><i style='color:red' class='fas fa-trash-alt'></i></a><td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
            echo "</div>";
            echo '</div>';
            /*******************************Student List Page End *****************************/
        }  
        if(@$_GET['a']==4)
        {
            /*******************************Rank List Page*****************************/
            echo '<div style="font-size:20px; text-align:center;">
                  <h1 align=center>Ranking Details</h1>
                  <h3>Search :</h3>
                  <input id="search_rank" type="search" style="font-size:20px;" onkeyup="searchrank()" placeholder="Enter Name to Search"></div>';
            echo '<div id="rank" style="padding:0px 150px;">';
            $rank_details=mysqli_query($link,"select * from Rank order by score desc");
            $no=1;
            echo "<div style='text-align:center; padding:10px 0px 50px;'>";
            echo "<table>";
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
            /*******************************Rank List Page End*****************************/
        }
        /*{ 
            echo '<div style="font-size:20px; text-align:center;">
                  <h1 align=center>Ranking Details</h1>
                  <h3>Search :</h3>
                  <input id="search_rank" type="search" style="font-size:20px;" onkeyup="searchrank()" placeholder="Enter Name to Search"></div>';
            echo '<div id="rank">';
            $result_details=mysqli_query($link,"select * from Result order by Result desc");
            $no=1;
            $overall=0;
            echo "<div align=center>";
            echo "<table>";
            echo "<tr> 
                    <th> S.No </th>
                    <th> STUDENT NAME </th>
                    <th> Section </th>
                    <th> Right Answers </th>
                    <th> Result </th>
                    <th> OverAll </th>
                    <th> View </th>
                </tr>";
            while($rows=mysqli_fetch_array($result_details))
            {
                $overall+=$rows["Result"];
                $view_id=$rows["stud_id"];
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$rows["name"]."</td>";
                echo "<td>".$rows["Section"]."</td>";
                echo "<td>".$rows["Correct"]."</td>";
                echo "<td>".$rows["Result"]."</td>";
                echo "<td>".$overall."</td>";
                echo "<td><a href='account.php?view_id=".$view_id."'>view</a></td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
            echo "</div>";
            echo '</div>';
        }*/  
        if(@$_GET['a']==5)
        {
            /*******************************Feedback Page*****************************/
                echo '<div id="feedbacks">';
                    echo '<h1 style="text-align:center;">FeedBacks</h1><br>';
                    $details=mysqli_query($link,"select * from Feedbacks order by No desc");
                    $n=0;
                    echo '<div style="margin-left:1%; padding:10px 0px 50px;">
                        <table class="table">
                        <tr>
                        <th> No </th>
                        <th> Name </th>
                        <th> Subject </th>
                        <th> E-Mail </th>
                        <th> Feedbacks </th>
                        <th> Date&Time </th>
                        <th> Delete </th>
                        </tr>';
                    while($rows=mysqli_fetch_array($details))
                    {   
                        $n++;
                        $fid=$rows["No"];
                        echo '<tr>';
                        echo '<td>'.$n.'</td>';
                        echo '<td>'.$rows["name"].'</td>';
                        echo '<td>'.$rows["email"].'</td>';
                        echo '<td>'.$rows["sub"].'</td>';
                        echo '<td>'.$rows["feedback"].'</td>';
                        echo '<td>'.$rows["date"].'</td>';
                        echo '<td>'.'<a href="feedback.php?fid='.$fid.'"><i style="color:red" class="fas fa-trash-alt"></i></a>'.'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                echo '</div>';       
                /*******************************Feedback Page End*****************************/
        } 
        if(isset($_REQUEST["Bsection"]))
        { 
            /******************************Title Menu start*****************************/
            echo '<div id="Title">';
            /*******************************Quiz Title Menu Start*****************************/
            $Title=mysqli_query($link,"select * from Title order by id");
            while($Trows=mysqli_fetch_array($Title))
            {
            ?>
                <div id="div1">
                    <a style="text-decoration:none; color:black" href="adminuser.php?section=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                </div>
            <?php
            }
            /******************************Quiz Title Menu End*****************************/
            /*******************************Part B Title Menu Start*****************************/
            $Title=mysqli_query($link,"select * from Title1 order by id");
            while($Trows=mysqli_fetch_array($Title))
            {
            ?>
                <div id="div2">
                    <a style="text-decoration:none; color:black;" href="adminuser.php?Bsection=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                </div>
            <?php
            }
            /*******************************Part B Title Menu End*****************************/
            echo '</div>';
            /*******************************Title Menu End*****************************/
            $Bsection=$_REQUEST["Bsection"]; 
            /*******************************New Part B Question Entry Start*****************************/
            ?>
            <div id="question">
                <form method="post" style="text-align:center" action="adminuser.php?Bsection=<?php echo $Bsection; ?>">
                    <table>
                        <tr>
                            <td><label for="">Question Number :</label></td>
                            <td><input type="text" name="No" value="" placeholder="Enter Question No" autocomplete="off" autofocus required></td>
                        </tr>
                        <tr>
                            <td><label for="">Question :</label></td>
                            <td><input type="text" name="Question" value="" placeholder="Enter Question" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Answer :</label></td>
                            <td><input type="text" name="Answer" value="" placeholder="Enter Correct Answer Option" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <input type="submit" name="submitQuestionB" value="submit" style="background:darkgreen; padding:5px 40px; font-size:25px; border-radius:10px; border:none;">
                                <button style="background:red; padding:5px 40px; font-size:25px; border-radius:10px; border:none;"><a href="adminuser.php?a=1" style="text-decoration:none; color:black;">Exit</a></button>
                            </td>
                        </tr>
                    </table>        
                </form> 
            </div>
            <?php
            /*******************************Part B Insert Queries*****************************/
                if(isset($_REQUEST["submitQuestionB"]))
                {
                    $Qno=($_REQUEST["No"]);
                    $Question=$_REQUEST["Question"];
                    $Ansid=$_REQUEST["Answer"];
    
                    $details=mysqli_query($link,"select * from QA where Qno='$Qno'");
                    $rowcount=mysqli_num_rows($details);
                    if($rowcount>0)
                    {
                        echo "<script> alert('Question Number is Already Exist');</script>";           
                    }
                    else
                    {
                        mysqli_query($link,"insert into QA(Qno,Question,Answer,Section)values('$Qno','$Question','$Ansid','$Bsection')");
                        echo "Last Submited Question Number is :".$Qno;
                    }
                }
            /*******************************Part B Insert Queries End*****************************/
            ?>

            <!-------------------------- View Entered Questions and Answers-------------------->
            <div align=center style="padding:50px;">
                <form action="" id=display style="text-align:center;" method="post">
                <div>
                    <table class="table">
                        <tr>
                            <th>SNo.</th>
                            <th width="900px">Question</th>
                            <th>Answer</th>
                            <th>Delete</th>
                        </tr>
                            <?php
                                $Bsection=$_REQUEST["Bsection"];
                                $Qdetails=mysqli_query($link,"select * from QA where Section='$Bsection' order by Qno");
                                $Qrowcount=mysqli_num_rows($Qdetails);
                                echo 'Total Number of Questions in '.$Bsection.' : '.$Qrowcount;
                                while($Qrows=mysqli_fetch_array($Qdetails))
                                {
                                    $i=$Qrows["Qno"];
                                    ?>
                                    <tr>
                                    <td style="height:50px;"><?php echo $Qrows["Qno"]; ?></td>
                                    <td><?php echo $Qrows["Question"]; ?></td>
                                    <td><?php echo $Qrows["Answer"]; ?></td>        
                                    <td><a href='edit.php?Del_QA=<?php echo $Qrows["Qno"]; ?>'><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <tr><td colspan='4'><hr></td></tr>
                                    <?php       
                                }
                            ?>
                    </table>
                </div>
                </form>
            </div>
            <!------------------------------View Question End------------------------------------->
            <?php
        }
        /*******************************New Part B Question Entry End*****************************/
        /*******************************New Quiz Question Entry*****************************/
        if(isset($_REQUEST["section"]))
        { 
            /*******************************Title Menu Start*****************************/
            echo '<div id="Title">';
            /*******************************Quiz Title Menu Start*****************************/
            $Title=mysqli_query($link,"select * from Title order by id");
            while($Trows=mysqli_fetch_array($Title))
            {
            ?>
                <div id="div1">
                    <a style="text-decoration:none; color:black" href="adminuser.php?section=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                </div>
            <?php
            }
            /*******************************Quiz Title Menu End*****************************/
            /*******************************Part B Title Menu Start*****************************/
            $Title=mysqli_query($link,"select * from Title1 order by id");
            while($Trows=mysqli_fetch_array($Title))
            {
            ?>
                <div id="div2">
                    <a style="text-decoration:none; color:black;" href="adminuser.php?Bsection=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                </div>
            <?php
            }
            /*******************************Part B Title Menu End*****************************/
            echo '</div>';
            /*******************************Title Menu End*****************************/

            /*******************************New Quiz Entry Start*****************************/
            $section=$_REQUEST["section"]; ?>
            <div id="question">
                <form method="post" style="text-align:center" action="adminuser.php?section=<?php echo $section; ?>">
                    <table>
                        <tr>
                            <td><label for="">Question Number :</label></td>
                            <td><input type="text" name="No" value="" placeholder="Enter Question No" autocomplete="off" autofocus required></td>
                        </tr>
                        <tr>
                            <td><label for="">Question :</label></td>
                            <td><input type="text" name="Question" value="" placeholder="Enter Question" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Ans Id :</label></td>
                            <td><input type="text" name="Ansid" value="" placeholder="Enter Correct Answer Option" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Option1 :</label> </td>
                            <td><input type="text" name="Option1" value="" placeholder="Enter First Choice" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Option2 :</label></td>
                            <td><input type="text" name="Option2" value="" placeholder="Enter Second Choice" autocomplete="off" required></td>
                        </tr>
                        <tr>   
                            <td><label for="">Option3 :</label> </td>
                            <td><input type="text" name="Option3" value="" placeholder="Enter third Choice" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><label for="">Option4 :</label> </td>
                            <td><input type="text" name="Option4" value="" placeholder="Enter Fourth Choice" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <input type="submit" name="submitQuestion" value="submit" style="background:darkgreen; padding:5px 40px; font-size:25px; border-radius:10px; border:none;">
                                <button style="background:red; padding:5px 40px; font-size:25px; border-radius:10px; border:none;"><a href="adminuser.php?a=1" style="text-decoration:none; color:black;">Exit</a></button>
                            </td>
                        </tr>
                    </table>        
                </form> 
            </div>
            <?php
            /*******************************Quiz Insertion Queries Start*****************************/
                if(isset($_REQUEST["submitQuestion"]))
                {
                    $Qno=($_REQUEST["No"]);
                    $Question=$_REQUEST["Question"];
                    $Ansid=$_REQUEST["Ansid"];
                    $Option1=$_REQUEST["Option1"];
                    $Option2=$_REQUEST["Option2"];
                    $Option3=$_REQUEST["Option3"];
                    $Option4=$_REQUEST["Option4"];
    
                    $details=mysqli_query($link,"select * from Question where Qno='$Qno'");
                    $rowcount=mysqli_num_rows($details);
                    if($rowcount>0)
                    {
                        echo "<script> alert('Question Number is Already Exist');</script>";           
                    }
                    else
                    {
                        mysqli_query($link,"insert into Question(Qno,Question,Ansid,Section)values('$Qno','$Question','$Ansid','$section')");
                        mysqli_query($link,"insert into Answers(No,Options,Qno)values('1','$Option1','$Qno')");
                        mysqli_query($link,"insert into Answers(No,Options,Qno)values('2','$Option2','$Qno')");
                        mysqli_query($link,"insert into Answers(No,Options,Qno)values('3','$Option3','$Qno')");
                        mysqli_query($link,"insert into Answers(No,Options,Qno)values('4','$Option4','$Qno')");
                        echo "Last Submited Question Number is :".$Qno;
                    }
                }
                /*******************************Quiz Insertion Queries End*****************************/
            ?>

            <!-------------------------- View Entered Questions and Answers----------------------------->
            <div align=center style="padding:50px;">
                <form action="" id=display style="text-align:center;" method="post">
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
                        </tr>
                            <?php
                                $section=$_REQUEST["section"];
                                $Qdetails=mysqli_query($link,"select * from Question where Section='$section' order by Qno");
                                $Qrowcount=mysqli_num_rows($Qdetails);
                                echo 'Total Number of Questions in '.$section.' : '.$Qrowcount;
                                while($Qrows=mysqli_fetch_array($Qdetails))
                                {
                                    $i=$Qrows["Qno"];
                                    ?>
                                    <tr>
                                    <td style=""><h3><?php echo $Qrows["Qno"]; ?></h3></td>
                                    <td><?php echo $Qrows["Question"]; ?></td>
                                    <td><?php echo $Qrows["Ansid"]; ?></td>
                                    <?php
                                    $Adetails=mysqli_query($link,"select * from Answers where Qno=$i Order by No");
                                    $Arowcount=mysqli_num_rows($Adetails);
                                    while($Arows=mysqli_fetch_array($Adetails))
                                    {
                                        ?>
                                        <td><?php echo $Arows["Options"]; ?></td> 
                                        <?php      
                                    }
                                    ?>        
                                    <td><a href='edit.php?Qno=<?php echo $Qrows["Qno"]; ?>'><i style="color:blue" class="fas fa-edit"></i></a></td>
                                    <td><a href='edit.php?Del_Qno=<?php echo $Qrows["Qno"]; ?>'><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <tr><td colspan='9'><hr></td></tr>
                                    <?php       
                                }
                            ?>
                    </table>
                </div>
                </form>
            </div>
            <!------------------------------------View Entered Question End------------------------------------>
            <?php
            /*******************************New Quiz Entry End*****************************/
        }
        if(@$_GET[a]==2)
        {
            /*******************************View All Quiz From Database*****************************/
            ?>
            <div style="margin-top:20px; text-align:center;">
            <a href="adminuser.php?a=2" style="text-decoration:none; color:white; background:orange; padding:20px 100px;">Quiz</a>
            <a href="adminuser.php?a=21" style="text-decoration:none; color:white; background:skyblue; padding:20px 100px;">Part B</a>
            <br>
            <br>
            <br>
            <div>
            <h2>Search :</h2>
            <input type="search" id="Quiz-search" style="font-size:20px;" onkeyup="searchquiz()" placeholder="Search by Question">
            </div>
            </div>
            <div id="Quiz" align=center style="padding:10px 0px 50px 0px;">
                <form action="" id=displayall style="text-align:center;" method="post">
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
                        </tr>
                            <?php
                                $Qdetails=mysqli_query($link,"select * from Question order by Qno");
                                $Qrowcount=mysqli_num_rows($Qdetails);
                                echo 'Total Number of Questions in Quiz : '.$Qrowcount;
                                while($Qrows=mysqli_fetch_array($Qdetails))
                                {
                                    $i=$Qrows["Qno"];
                                    ?>
                                    <tr>
                                    <td style="height:50px;"><?php echo $Qrows["Qno"]; ?></td>
                                    <td><?php echo $Qrows["Question"]; ?></td>
                                    <td><?php echo $Qrows["Ansid"]; ?></td>
                                    <?php
                                    $Adetails=mysqli_query($link,"select * from Answers where Qno=$i Order by No");
                                    $Arowcount=mysqli_num_rows($Adetails);
                                    while($Arows=mysqli_fetch_array($Adetails))
                                    {
                                        ?>
                                        <td><?php echo $Arows["Options"]; ?></td> 
                                        <?php      
                                    }
                                    ?>        
                                    <td><a href='edit.php?Qno=<?php echo $Qrows["Qno"]; ?>'><i style="color:blue" class="fas fa-edit"></i></a></td>
                                    <td><a href='edit.php?Del_Qno=<?php echo $Qrows["Qno"]; ?>'><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <?php       
                                }
                            ?>
                    </table>
                    </div>
                </form>
            </div>
            <? 
        }
        if(@$_GET["a"]==21)
        {
            /*******************************View All Part B Question From Database*****************************/
            ?>
            <div style="margin-top:20px; text-align:center;">
            <a href="adminuser.php?a=2" style="text-decoration:none; color:white; background:red; padding:20px 100px;">Quiz</a>
            <a href="adminuser.php?a=21" style="text-decoration:none; color:white; background:blue; padding:20px 100px;">Part B</a>
            <br>
            <br>
            <br>
            <div>
            <h2>Search :</h2>
            <input type="search" id="searchB" style="font-size:20px;" onkeyup="searchB()" placeholder="Search by Question">
            </div>
            </div>
            <div id="partB" align=center style="padding:10px 0px 50px 0px;">
                <form action="" id=display style="text-align:center;" method="post">
                <div>
                    <table class="table">
                        <tr>
                            <th>SNo.</th>
                            <th width="900px">Question</th>
                            <th>Answer</th>
                            <th>Delete</th>
                        </tr>
                            <?php
                                $Qdetails=mysqli_query($link,"select * from QA order by 'Qno'");
                                $Qrowcount=mysqli_num_rows($Qdetails);
                                echo 'Total Number of Questions in Part B : '.$Qrowcount;
                                while($Qrows=mysqli_fetch_array($Qdetails))
                                {
                                    $i=$Qrows["Qno"];
                                    ?>
                                    <tr>
                                    <td style="height:50px;"><?php echo $Qrows["Qno"]; ?></td>
                                    <td><?php echo $Qrows["Question"]; ?></td>
                                    <td><?php echo $Qrows["Answer"]; ?></td>        
                                    <td><a href='edit.php?Del_QA=<?php echo $Qrows["Qno"]; ?>'><i style="color:red" class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <?php       
                                }
                            ?>
                    </table>
                </div>
                </form>
            </div>
            <?php
        }
        include("footer.php");
    }
    else
    {
        echo "<div style='margin-top:10%; text-align:center;'>";
        echo "<h1>You have been Logout</h1>";
        echo "Click <a href='index.php?i=3'>here</a> to Login";
        echo "</div>";
    }
    ?>
</body>









