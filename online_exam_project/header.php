<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Exam Admin</title>
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
            }

            #header>li {
            }

            #header>li>a {
                text-decoration:none;
                color:white;
                float:left;
                margin-top:50px;
                padding:15px;
            }

            #header>li>a:hover {
                background:black;
            }
        </style>
    </head>
    <body>

        <ul id=header>
        <li><img src="image/CAHC-WEB-BANNER-FULL.png" alt="Cahc"></li>
        <li><a href="adminuser.php?a=1" style="margin-left:70px;">Home</a></li>
        <li><a href="adminuser.php?a=2">View</a></li>
        <li><a href="adminuser.php?a=3">Students</a></li>
        <li><a href="adminuser.php?a=4">Rankings</a></li>
        <li><a href="adminuser.php?a=5">FeedBacks</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a style="margin:10px -50px"><i class="fas fa-bars"></i></a></li>
        </ul>
    </body>

</html>