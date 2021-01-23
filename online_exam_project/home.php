<!doctype HTML >
<?php 
include("header1.php");
include("dbconnect.php");
$now=time();
/*******************************Student Login Check*****************************/
if(isset($_SESSION["uid"]))
{
    if($now<$_SESSION["end_time"])
    {
        $rem_time=$_SESSION["end_time"]-$now;
        if(isset($_SESSION["uid"])&&isset($_SESSION["uname"]))
        {
            $Del_id=$_SESSION["uid"];
            mysqli_query($link,"delete from Students where stud_id=$Del_id");
            ?>
            <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <style>
                    * {
                        margin:0px;
                        padding:0px;
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
                        background:#82c91e;
                    }

                    td {
                        line-height:40px;
                        text-align:center;
                        font-size:16px;
                        padding:10px;
                    }
                    tr:hover {
                        background:#f5f5d5;
                    }

                    .radio input[type="radio"] {
                        display:none;
                    }

                    .radio span {
                        width:9px;
                        height:9px;
                        border-radius:50%;
                        border:3px solid #82c91e;
                        font-size:16px;
                        padding:0px 9px;
                    }

                    .radio span:after {
                        content:'';
                        height:30px;
                        width:30px;                   
                        background:url("image/select.png");
                        background-size:30px;
                        background-repeat:no-repeat;
                        position:absolute;
                        transform:translate(-50%,0.5%) scale(0);
                        transition:300ms ease 0s;
                    }

                    .radio input[type="radio"]:checked ~ span:after {
                        transform:translate(-50%,0.5%) scale(1);       
                    }

                    input:focus {
                        outline:none;
                    }

                    .table td {
                        line-height:25px;
                    }

                    label:hover {
                        cursor:pointer;
                    }
                </style>
                <script>
                    function on_load() {
                        var rem="<? echo $rem_time; ?>";
                        var date=new Date();
                        setInterval(function() {
                            date.setHours(0,0,rem);
                            rem=--rem;
                            $("#r_time").html("Remaining Time :"+("00"+date.getHours()).slice(-2)+":"+("00"+date.getMinutes()).slice(-2)+":"+("00"+date.getSeconds()).slice(-2));
                            if(date.getHours()==23)
                            {
                                window.location.href="logout.php";
                            }
                        }, 1000) 
                    }
                </script>
            </head>
            <body onload="on_load()">
            <h3 style="text-align:right; padding:5px; box-shadow:0px 0px 1px 0px;"><span id=r_time style="background:black;color:#82c91e;padding:5px;"></span></h3>
            <? if(@$_GET["i"]==1)  
                { 
                    /*******************************Home Page*****************************/
                    ?>
                    <!--------------------------Quiz Title------------------------------->
                    <div id="first_view">
                        <h1 style="text-align:center; font-size:50px;"><i>Welcome to Online Exam</i></h1>
                        <img src="http://www.cahc.edu.in/wp-content/themes/emphasize/images/shadow.png" alt="shadow" style="text-align:center; width:100%; height:10px;">
                        <h1 style="text-align:center; font-size:50px;"><i>Part A</i></h1>
                        <div style="text-align:center; margin:0px 200px; background:#82c91e; padding:20px 100px;">
                            <?php
                                $Title=mysqli_query($link,"select * from Title where visibility=1 order by id");
                                while($Trows=mysqli_fetch_array($Title))
                                {
                                    ?>
                                    <div style="background:white; padding:20px; border:5px solid red; border-radius:20px; margin:20px 0px; text-align:left;">
                                        <div style="text-decoration:none; color:black;"><h4><?php echo $Trows["Subject"]; ?></h4></div>
                                        <div style="text-align:right; margin-top:-25px;">
                                            <a style="text-decoration:none; color:black; background:orange; border:solid red; padding:5px;" href="home.php?section=<?php echo $Trows["Subject"]; ?>">START <i style="color:green; padding:5px;" class="fas fa-play"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>

                    <!--------------------------- PART B Title-------------------------------->
                    <div id="first_view">
                        <h1 style="text-align:center; font-size:50px;"><i>Part B</i></h1>
                        <div style="text-align:center; margin:0px 200px 100px 200px; background:#82c91e; padding:20px 100px;">
                            <?php
                                $Title=mysqli_query($link,"select * from Title1 where visibility=1 order by id");
                                while($Trows=mysqli_fetch_array($Title))
                                {
                                    ?>
                                    <div style="background:white; padding:20px; border:5px solid red; border-radius:20px; margin:20px 0px; text-align:left;">
                                        <div style="text-decoration:none; color:black;"><h4><?php echo $Trows["Subject"]; ?></h4></div>
                                        <div style="text-align:right; margin-top:-25px;">
                                            <a style="text-decoration:none; color:black; background:orange; border:solid red; padding:5px;" href="home.php?Bsection=<?php echo $Trows["Subject"]; ?>">START <i style="color:green; padding:5px;" class="fas fa-play"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <!----------- Part B Title End--------------->
                    <?php
                }
                
                if(isset($_REQUEST["Bsection"]))
                {
                    $Bsection=$_REQUEST["Bsection"];
                    /******************************Part B Title Menu start*****************************/
                    echo '<div id="Title">';
                    $Title=mysqli_query($link,"select * from Title1 where visibility=1 order by id");
                    while($Trows=mysqli_fetch_array($Title))
                    {
                    ?>
                        <div id="div2">
                            <a style="text-decoration:none; color:black" href="home.php?Bsection=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                        </div>
                    <?php
                    }
                    echo '</div>';
                    /*******************************Part B Title Menu End*****************************/
                ?>
                <img src="http://www.cahc.edu.in/wp-content/themes/emphasize/images/shadow.png" alt="shadow" style="text-align:center; width:100%; height:10px;">   
                <div id="time" style="text-align:center; margin:0% 45% -3% 45%; background:black; color:white; font-size:30px;"></div><!-----------Timer-------------->
                <div id="question_container">
                    <table class="table">
                        <form id="quiz" action="home.php?Bsection1=<?php echo $Bsection; ?>" method="post">
                            <tr>
                                <th>SNo.</th>
                                <th>Question</th>
                                <th>Answer</th>
                            </tr>
                                <?php
                                        $q=0;
                                        $Qdetails=mysqli_query($link,"select * from QA where Section='$Bsection' order by rand() limit 10");
                                        $Qrowcount=mysqli_num_rows($Qdetails);
                                        while($Qrows=mysqli_fetch_array($Qdetails))
                                        {
                                            $i=$Qrows["Qno"];
                                            $q++;
                                            ?>
                                            <tr>
                                            <td><?php echo $q; ?></td>
                                            <td style="width:40%"><?php echo $Qrows["Question"]; ?></td>
                                            <td><input type="text" name="Answer[<? echo $i; ?>]"  style="border:none; font-size:20px; border-bottom:2px solid black; text-align:center;" autocomplete="off"></td>  
                                            <tr><td colspan='3'><hr></td></tr>   
                                            <?php
                                        }
                                        $time=$Qrowcount*60;
                                        $minutes=$time/60;
                                        $minutes=$minutes-1;
                                        $seconds=59;
                                        echo '<script>
                                                window.onload=function() {
                                                    on_load();
                                                    var i='.$time.';
                                                    var minutes='.$minutes.'
                                                    var seconds='.$seconds.'
                                                    setInterval(function() {
                                                        $("#time").html(minutes+":"+seconds);
                                                        seconds--;
                                                        if(seconds<10)
                                                        {
                                                            seconds="0"+seconds;
                                                        }
                                                        if(seconds==0)
                                                        {
                                                            seconds=59;
                                                            minutes--;
                                                        }
                                                        i--;
                                                        if(i==0) {
                                                            $("#submit_quiz").click();
                                                        }
                                                    },1000);
                                                }
                                            </script>';
                                ?>
                                </tr>
                            <td colspan="6">
                                <input type="submit" name="submit_answer" id="submit_quiz" value="result" style="background:lightgreen; padding:5px 15px; font-size:20px;">
                            </td>
                        </form>
                    </table>
                </div>
                <?php
                }

                if(isset($_REQUEST["submit_answer"])&&isset($_REQUEST["Bsection1"]))
                {
                    /*******************************Part B Result Submit Queries*****************************/         
                    $Bsection=$_REQUEST["Bsection1"];
                    $name=$_SESSION["uname"];
                    $uid=$_SESSION["uid"];
                    $date=date("Y-m-d h:i:sa");
                    if(isset($_REQUEST["submit_answer"]))
                    {
                        if(!empty($_REQUEST["Answer"]))
                        {
                            $Ans=$_REQUEST["Answer"];
                            $count=count($_REQUEST["Answer"]);
                            $result=0;
                            $Qdetails=mysqli_query($link,"select * from QA where Section='$Bsection' order by Qno");
                            $Qrowcount=mysqli_num_rows($Qdetails);
                            while($Qrows=mysqli_fetch_array($Qdetails))
                            {
                                //print_r($Qrows["Ansid"]);
                                //echo "->";
                                //echo !empty($selected[$i])." ";
                                $i=$Qrows["Qno"];
                                $Original_Answer=strtoupper($Qrows["Answer"]);
                                $Answer=strtoupper($Ans[$i]);
                                if(preg_match("/$Original_Answer/",$Answer))
                                {
                                    $result++;
                                }
                            }  
                            $score=$result*2;
                            $result_details=mysqli_query($link,"select * from Result where stud_id=$uid and Section='$Bsection'");
                            $Rrowcount=mysqli_num_rows($result_details);
                            $result_details1=mysqli_query($link,"select * from Result where stud_id=$uid");
                            $overall=0;
                            while($rows=mysqli_fetch_array($result_details1))
                            {
                                $overall=$overall+$rows["Result"];
                            }
                            $overall=$overall+$score;
                            echo '<table style="padding:20px 70px; margin-left:200px; width:70%;">';
                            if($Rrowcount>0)
                            {
                                echo "<tr><td style='color:blue'>You Have Already Answered This Section</td></tr>";
                            }
                            else
                            {
                                mysqli_query($link,"insert into Result(name,stud_id,Correct,Result,Section,date)values('$name','$uid','$result','$score','$Bsection','$date')");
                                $rank_details=mysqli_query($link,"select * from Rank where id='$uid'");
                                $rankcount=mysqli_num_rows($rank_details);
                                if($rankcount==0)
                                {
                                    mysqli_query($link,"insert into Rank values($uid,'$name','$overall')");    
                                }
                                mysqli_query($link,"update Rank set score='$overall' where id=$uid");
                            
                            }
                            /*******************************Part B Result View Design*****************************/
                            echo '<caption style="background:white; color:brown; padding:20px 0px 20px 0px; font-size:30px;"><h3>RESULT</h3></caption>';
                            echo '<caption><hr></caption>';
                            echo'<tr style="color:#66CCFF;">
                                    <td style="text-align:left;"><h3>Total Question</h3></td>
                                    <td><h3>10</h3></td>
                                </tr>';
                            echo'<tr style="color:#99CC32">
                                    <td style="text-align:left;"><h3>Right Answer <i class="far fa-check-circle"></i></h3></td>
                                    <td><h3>'.$result.'</h3></td>
                                </tr>';
                                $wrong=10-$result;
                            echo'<tr style="color:#FF0000">
                                    <td style="text-align:left;"><h3>Wrong Answer <i class="far fa-times-circle"></i></h3></td>
                                    <td><h3>'.$wrong.'</h3></td>
                                </tr>';
                            echo'<tr style="color:#66CCFF;">
                                    <td style="text-align:left;"><h3>Score <i class="fas fa-star"></i></h3></td>
                                    <td><h3>'.$score.'</h3></td>
                                </tr>';
                            echo'<tr style="color:#990000;">
                                    <td style="text-align:left;"><h3>Overall <i class="fas fa-chart-bar"></i></h3></td>
                                    <td><h3>'.$overall.'</h3></td>
                                </tr>';
                            echo'</table>';    
                        }
                    }
                }
                if(isset($_REQUEST["section"]))
                {
                    $section=$_REQUEST["section"];
                    /*******************************Quiz Title Menu*****************************/ 
                    echo '<div id="Title">';
                    $Title=mysqli_query($link,"select * from Title where visibility=1 order by id");
                    while($Trows=mysqli_fetch_array($Title))
                    {
                    ?>
                        <div id=div1>
                            <a style="text-decoration:none; color:black" href="home.php?section=<?php echo $Trows["Subject"]; ?>"><?php echo $Trows["Subject"]; ?></a>
                        </div>
                    <?php
                    }
                    echo '</div>';
                    /*******************************Quiz Title Menu End*****************************/            
                ?>
                <img src="http://www.cahc.edu.in/wp-content/themes/emphasize/images/shadow.png" alt="shadow" style="text-align:center; width:100%; height:10px;">
                <div id="time" style="text-align:center; margin:0% 45% -3% 45%; background:black; border-radius:5px; color:white; font-size:30px;"></div><!---------Timer--------->
                <div id="question_container">
                    <table class="table">
                        <form id="quiz" action="home.php?section1=<?php echo $section; ?>" method="post">
                            <tr>
                                <th>SNo.</th>
                                <th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                            </tr>
                                <?php
                                        $q=0;
                                        $Qdetails=mysqli_query($link,"select * from Question where Section='$section' order by rand() limit 10");
                                        $Qrowcount=mysqli_num_rows($Qdetails);
                                        while($Qrows=mysqli_fetch_array($Qdetails))
                                        {
                                            $i=$Qrows["Qno"];
                                            $q++;
                                            ?>
                                            <tr>
                                            <td><?php echo $q; ?></td>
                                            <td style="width:40%"><?php echo $Qrows["Question"]; ?></td>
                                            <?php
                                            $Adetails=mysqli_query($link,"select * from Answers where Qno=$i order by rand() limit 4");
                                            $Arowcount=mysqli_num_rows($Adetails);
                                            while($Arows=mysqli_fetch_array($Adetails))
                                            {
                                                ?>
                                                <td style="text-align:left;"><label class="radio"><input type="radio" name="check[<?php echo $Arows['Qno']; ?>]" value="<?php echo $Arows['No']; ?>"> 
                                                <?php
                                                    echo '<span></span>'.$Arows["Options"].'</label></td>';
                                                    ?><?php
                                                
                                            } 
                                            echo "<tr><td colspan='6'><hr></td></tr>
                                            ";       
                                        }
                                        $time=$Qrowcount*30;
                                        $minutes=$time/60;
                                        $minutes=$minutes-1;
                                        $seconds=59;
                                        echo '<script>
                                                window.onload=function() {
                                                    on_load();
                                                    var i='.$time.';
                                                    var minutes=parseInt('.$minutes.')
                                                    var seconds='.$seconds.'
                                                    setInterval(function() {
                                                        $("#time").html(minutes+":"+seconds);
                                                        seconds--;
                                                        if(seconds<10)
                                                        {
                                                            seconds="0"+seconds;
                                                        }
                                                        if(seconds==0)
                                                        {
                                                            seconds=59;
                                                            minutes--;
                                                        }
                                                        i--;
                                                        if(i==0) {
                                                            $("#submit_quiz").click();
                                                        }
                                                    },1000);
                                                }
                                            </script>';
                                ?>
                                </tr>
                                
                            <td colspan="6">
                                <input type="submit" name="submit_quiz" id="submit_quiz" value="result" style="background:lightgreen; padding:5px 15px; font-size:20px;">
                            </td>
                        </form>
                    </table>
                </div>
                <?php
                }


            /////<!--Result Section-->
            if(isset($_REQUEST["submit_quiz"])&&isset($_REQUEST["section1"]))
            {
                /*******************************Quiz Submit Queries*****************************/ 
                $section=$_REQUEST["section1"];
                $name=$_SESSION["uname"];
                $uid=$_SESSION["uid"];
                $date=date("Y-m-d h:i:sa");
                if(isset($_REQUEST["submit_quiz"]))
                {
                    if(!empty($_POST["check"]))
                    {
                        $count=count($_POST["check"]);
                        $result=0;
                        $selected=$_POST["check"];
                        $select=sizeof($selected);
                        //print_r($selected);
                        $Qdetails=mysqli_query($link,"select * from Question where Section='$section' order by Qno");
                        $Qrowcount=mysqli_num_rows($Qdetails);
                        while($Qrows=mysqli_fetch_array($Qdetails))
                        {
                            //print_r($Qrows["Ansid"]);
                            //echo "->";
                            //echo !empty($selected[$i])." ";
                            $i=$Qrows["Qno"];
                            if(!empty($selected[$i]))
                            {
                                //echo $selected[$i];
                                if($Qrows["Ansid"]==$selected[$i])
                                {
                                    $result++;
                                }
                            }
                        }

                        $result_details=mysqli_query($link,"select * from Result where stud_id=$uid and Section='$section'");
                        $Rrowcount=mysqli_num_rows($result_details);
                        $result_details1=mysqli_query($link,"select * from Result where stud_id=$uid");
                        $overall=0;
                        while($rows=mysqli_fetch_array($result_details1))
                        {
                            $overall=$overall+$rows["Result"];
                        }
                        $score=$result;
                        $overall=$overall+$score;
                        echo '<table style="padding:20px 100px; margin-left:200px; width:70%;">';
                        if($Rrowcount>0)
                        {
                            echo "<tr><td style='color:blue'>You Have Already Answered This Section</td></tr>";
                        }
                        else
                        {
                            mysqli_query($link,"insert into Result(name,stud_id,Correct,Result,Section,date)values('$name','$uid','$result','$result','$section','$date')");                     
                            $rank_details=mysqli_query($link,"select * from Rank where id='$uid'");
                            $rankcount=mysqli_num_rows($rank_details);
                            if($rankcount==0)
                            {
                                mysqli_query($link,"insert into Rank values($uid,'$name','$overall')");    
                            }
                            mysqli_query($link,"update Rank set score='$overall' where id=$uid");
                        }
                        /*******************************Quiz Result View Display *****************************/
                        echo '<caption style="background:white; color:brown; padding:20px 0px 20px 0px; font-size:30px;"><h3>RESULT</h3></caption>';
                        echo '<caption><hr></caption>';
                        echo'<tr style="color:#66CCFF;">
                                <td style="text-align:left;"><h3>Total Question</h3></td>
                                <td><h3>10</h3></td>
                            </tr>';
                        echo'<tr style="color:#99CC32">
                                <td style="text-align:left;"><h3>Right Answer <i class="far fa-check-circle"></i></h3></td>
                                <td><h3>'.$result.'</h3></td>
                            </tr>';
                            $wrong=10-$result;
                        echo'<tr style="color:#FF0000">
                                <td style="text-align:left;"><h3>Wrong Answer <i class="far fa-times-circle"></i></h3></td>
                                <td><h3>'.$wrong.'</h3></td>
                            </tr>';
                        echo'<tr style="color:#66CCFF;">
                                <td style="text-align:left;"><h3>Score <i class="fas fa-star"></i></h3></td>
                                <td><h3>'.$score.'</h3></td>
                            </tr>';
                        echo'<tr style="color:#990000;">
                                <td style="text-align:left;"><h3>Overall <i class="fas fa-chart-bar"></i></h3></td>
                                <td><h3>'.$overall.'</h3></td>
                            </tr>';
                        echo'</table>';                
                    }
                }
            }
            echo '</body>';
            include("footer.php");
        }
    }
    else 
    {
        header("location:logout.php");
    }
}
else
{
    echo "<center style='margin-top:100px;'><h2>You have been Logout</h2>";
    echo "Click <a href='index.php?i=2'>here</a> to login</center>";
}
?>