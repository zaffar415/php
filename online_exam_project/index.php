<!Doctype HTML>
<?php session_start(); ?>
<header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Exam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/javascript" src="file:///opt/lampp/htdocs/exam_project/js/jquery-3.4.1.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/c5b0d4ad62.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <style>
        *{
            margin:0px;
            padding:0px;
        }
        #header {
            list-style-type:none;
            background:#333333;
        }

        #header li {
        }

        #header>li>a {
            text-decoration:none;
            color:white;
        }
        
        #header>li>a:hover {
            background:white;
        }

        #reg {
            position:absolute;
            margin:20% 80% 0%;
            transform:translate(-50%,-50%);
            border-radius:5px;
            padding:50px 20px 30px 20px;     
            background:#333333;  
            color:white;     
        }

        #reg input {
            background:none;
            border:none;
            line-height:30px;
            width:300px;    
            border-bottom:2px solid white;
            color:white;
            font-size:16px;
        }
        #reg:hover {
            box-shadow:10px 8px 20px 2px black;
            transition:500ms ease-in 0s;
        }

        .login {
            display:block;
            background:transparent;
            position:absolute;
            margin:22% 50% 0px;
            transform:translate(-50%,-50%);
            color:white;
            padding:50px 20px 50px 20px;      
        }
        .login:hover {
            box-shadow:15px 10px 25px 0px black;
            transition:300ms ease-in 0s;
        }

        .login div {
            padding:5px;
            text-align:left;
        }

        .login input {
            background:transparent;
            line-height:30px;
            border:none;
            border-bottom:2px solid black;
            font-size:17px;
        }

        .radio input[type="radio"] {
            display:none;    
        }

        .radio {
            float:left;
            margin-left:50px;
        }

        .radio span {
            height:10px;
            width:10px;
            border-radius:50%;
            border:2px solid white;
            position:relative;
            padding:0px 8px;
        }

        .radio span:after {
            content:'';
            height:8px;
            width:8px;
            border-radius:50%;
            background:white;
            position:absolute;
            left:50%;
            top:50%;
            transform:translate(-50%,-50%) scale(0);
            transition:300ms ease-in-out 0s;
        }

        .radio input[type="radio"]:checked ~ span:after {
            transform:translate(-50%,-50%) scale(1);
        }
        
        input:focus {
            outline:none;
        }
    </style>
</header>
<body style="background:url('image/background3.jpg'); background-size:1400px 700px">
<?php
    if(isset($_SESSION["uid"]))
    {
        header("location:home.php?i=1");
    }
    ?>
    <ul id=header>
        <li><img src="image/CAHC-WEB-BANNER-FULL.png" alt="Cahc"></li>
        <li style="float:right; margin-top:-55px; margin-right:50px;"><a href="index.php?i=3" style="background:orange; padding:5px; border:2px solid black; border-radius:5px;" accesskey="A">Admin -></a></li>
    </ul>
    <script>
        function stud_reg()
        {
            var name=$("#stud_name").val();
            var email=$("#email").val();
            var password=$("#password").val();
            var confirm_password=$("#confirm_password").val();
            var DOB=$("#DOB").val();
            var gender=$("[name='gender']:checked").val();
            var aadhar=$("#aadhar").val();
            var mobile=$("#mobile_no").val();
            var stud_reg="register";
            if(password==""||confirm_password=="")
            {
                $("#reg_err").html("Password is Empty");
            }
            else if(name==""||email==""||DOB==""||aadhar==""||mobile=="")
            {
                $("#reg_err").html("All Fields are Mandatory");
            }
            else
            {
                if(password==confirm_password)
                {
                    $.ajax({
                        type:'post',
                        url:'login.php',
                        data:{name,email,password,DOB,gender,aadhar,mobile,stud_reg},
                        success:function(result) {
                            alert(result);
                            window.location.href="index.php?i=2";
                        }
                    });
                }
                else
                {
                    $("#reg_err").html("Password doesn't Match");
                }
            }
            
        }

        function stud_login() 
        {
            var email=$("#login_email").val();
            var password=$("#login_password").val();
            var userlogin="userlogin";

            $.ajax({
                type:'post',
                url:'login.php',
                data:{email,password,userlogin},
                success:function(result) {
                    if(result==1)
                    {
                        window.location.href="instruction.php";
                    }
                    else 
                    {
                        $("#log_err").html("Invalid Email and Password");
                    }
                }
            });
        }

        function admin_login() 
        {
            var admin_id=$("#admin_id").val();
            var password=$("#admin_password").val();
            var admin="admin";

            $.ajax({
                type:'post',
                url:'login.php',
                data:{admin_id,password,admin},
                success:function(result) {
                    window.location.href=result;
                }
            });
        }

    </script>
    
    <div>

        <?php
        if(@$_GET["i"]==1)
        { 
        ?>
            <!-----------------------------------Registration Section Start--------------------------------------->
            <div id="reg" align=center> 
                <div><!--Register Container Box-->
                    <h2>Registration</h2>
                    <br>
                    <div id="reg_err"></div>
                    <br>
                        <div>
                        <input type="text" id="stud_name" name="stud_name" placeholder="Username" autofocus required> 
                        </div>                          
                        <div>
                            <input type="email" id="email" name="email" placeholder="E-mail" required>    
                        </div> 
                        <div>
                            <input type="password" id="password" placeholder="Password" required>
                        </div>        
                        <div><input type="password" id="confirm_password" name="stud_pass" placeholder="Confirm Password" required></div>
                        <div><input type="date" name="DOB" id="DOB" ></div>
                        <br>
                        <div><label class="radio"><input type="radio" value="male" name="gender" style="width:20px;"><span></span> Male </label>
                            <label class="radio"><input type="radio" value="female" name="gender" style="width:20px;"><span></span>Female </label></div>    
                        <div><input type="text" id="aadhar" placeholder="Aadhar number" required></div>
                        <div><input type="text" id="mobile_no" placeholder="mobile Number" required></div>
                        <br>
                        <div><button type="submit" name="stud_register" style="padding:5px 50px; border-radius:10px; border:none; background:green;" onclick="stud_reg()">Sign Up</button></div>        
                        <br>
                        <div><a href="index.php?i=2" style="text-decoration:none; color:black;">Already Have an Account</a></div>   
                </div>
            </div>
            <div id="details" style="margin:120px 100px 0px; font-size:26px; position:absolute;">
                <h1>What is Online Examination?</h1>
                <br>
                <p>Online examination is conducting a test online to measure <br>
                    the knowledge of the participants on a given topic. In the <br>
                    olden days, everybody had to gather in a classroom at the <br>
                    same time to take an exam. With online examination <br>
                    students can do the exam online, in their own time,with <br>
                    their own device, regardless of where they live. You only <br>
                    need a browser and an internet connection.</p>
            </div>
            <!-----------------------------------Registration Section End--------------------------------------->
        <?php 
        }
        if(@$_GET["i"]==2)
        {
        ?>
            <!-----------------------------------Login Section Start--------------------------------------->
            <div id="login" class="login" align=center>
                <div style="position:absolute; width:100px; height:100px; border-radius:50%; background:black; top:-50px; left:88px;">
                    <i class="fas fa-user" style="font-size:50px; margin:50% 50%; transform:translate(-50%,-50%);"></i>
                </div>
                    <div><!--Login Container Box-->
                    <h2 style="text-align:center; padding:20px;">
                        Login here
                    </h2>
                    <div style="color:red"><center id="log_err"></center></div>
                            <div>
                                Username :
                            </div>    
                            <div>
                                <input type="email" id="login_email" placeholder="Enter E-mail" autofocus required>
                            </div>
                            <div>
                                Password :
                            </div>
                            <div>
                                <input type="password" id="login_password" placeholder="Enter Password" required>      
                            </div>  
                            <div>
                                <button style="padding:5px 95px; border-radius:10px; border:none; background:black;" onclick="stud_login()"><span style="color:green">Login</span></button>
                            </div>
                            <div>
                                <a style="padding: 4px 90px; border-radius:10px; border:none; background:green; color: black; font-size:14px; text-decoration:none;" href="index.php?i=1">sign up</a>
                            </div>
                    </div>    
                </div>
                <!-----------------------------------Login Section End--------------------------------------->
        <?php
        }
        if(@$_GET["i"]==3)
        {
            ?>
            <!-----------------------------------Admin Login Section Start---------------------------------------> 
            <div id="admin_login" class="login" style="background:#333333" align=center><!--Login Section-->
            <div style="position:absolute; width:100px; height:100px; border-radius:50%; background:brown; top:-50px; left:88px;">
                <i class="fas fa-users-cog" style="font-size:50px; margin:50% 50%; transform:translate(-50%,-50%);"></i>
            </div>
                <div><!--Login Container Box-->
                    <h2 style="text-align:center; padding:20px;">
                        Admin Login 
                    </h2>
                        <div>
                            Admin ID :
                        </div>    
                        <div>
                            <input type="text" id="admin_id" placeholder="Enter ID" autofocus required>
                        </div>
                        <div>
                            Password :
                        </div>
                        <div>
                            <input type="password" id="admin_password" placeholder="Enter Password" required>      
                        </div>  
                        <div>
                            <button style="padding:5px 95px; border-radius:10px; border:none; background:black;" onclick="admin_login()"><span style="color:green">Login</span></button>
                        </div>       
                </div>    
            </div>
             <!-----------------------------------Admin Login Section End--------------------------------------->  
            <?php 
        }
        ?>

    </div>
    <?include("footer.php");?>
</body>



