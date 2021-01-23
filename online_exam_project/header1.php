<!Doctype HTML>
<?php
session_start();
if(isset($_SESSION["uname"]))
{
    $uid=$_SESSION["uname"];
}
else
{
    $uid="Account";
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script type="text/javascript" src="file:///opt/lampp/htdocs/exam_project/js/jquery-3.4.1.min.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://kit.fontawesome.com/c5b0d4ad62.js" crossorigin="anonymous"></script>

        <style>
            *{
                margin:0px;
                padding:0px;
            }
            #header {
                list-style-type:none;
                background:#333333;
                display:flex;
                justify-content:center;
                font-size:20px;
            }

            #header li {
            }

            #header>li>a {
                text-decoration:none;
                color:white;
                float:left;
                margin-top:50px;
                padding:15px;
            }

            #header>li>a:hover {
                background:green;
            }
            
            #dropdown {
                list-style-type:none;
                position:absolute;
                margin-top:103px;
                display:none;
            }
            #dropdown li:hover{
                background:white;
            }
            #dropdown li {
                padding:15px;
                background:black;
            }
            #dropdown a {
                text-decoration:none;
                background:none;
                padding:15px;
            }
            #header li:hover #dropdown {
                display:block;
            }
        </style>

        <script>
        function lout()
        {
            if(confirm("ALERT!\nYou Will not be able to login again")==true)
            window.location.href="logout.php";    
        }
        </script>
    </head>
    <body>
        <ul id=header>
        <li><img src="image/CAHC-WEB-BANNER-FULL.png" alt="Cahc"></li>
        <li style="margin-left:25%"><a href="home.php?i=1">Home</a></li>
        <li><a>|</a></li>    
        <li><a href="account.php"><?php echo $uid; ?><i class="fas fa-user-alt"></i></i></a>
            <ul id="dropdown">
                <li><a href="#" onclick="lout()">Logout</a></li>
            </ul>
        </li>
    </ul>
        
    </body>

</html>