<!Doctype HTML>
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

        #footer {
            background:#333333;
            position:fixed;
            width:100%;
            bottom:0px;
        }

        #footer>ul>li {
            list-style-type:none;
            float:left;
            padding-left:200px;
        }

        #footer>ul>li>a {
            text-decoration:none;
            color:white;
            float:left;
            padding:5px;
        }    

        #feedback-container {
                background:white;
                position:absolute;
                top:15%;
                left:20%;
                display:none;
                background:url("image/fbbg.jpg");
        }

        #feedback-container input {
            margin-left:100px;
            padding-right:200px;
            border-left:1px solid grey;
            font-size:18px;
            line-height:30px;
            border:none;
        }

        #developers {
            position:absolute;
            background:white;
            border-radius:10px;
            top:20%;
            left:35%;
            display:none;
        }
        #developers>div {
            padding:30px 150px;
        }



    </style>

    <script>
        function feedback_submit()
        {
            var fname=$("#name").val();
            var sub=$("#sub").val();
            var email=$("#femail").val();
            var feedback=$("#feedback").val();
            $.ajax({
                type:'post',
                url:'feedback.php',
                data:{fname,sub,email,feedback},
                success:function() {
                    alert("Feedback is Successfully Submited"); 
                }
            });
        }

        function feedbacks()
        {
            console.log("fb");
            var f=$("#feedback-container");
            f.slideToggle();
        }

        function developers()
        {
            $("#developers").slideToggle();
        }
    </script>
</header>
<body>
    
    <div id="developers">
    <button onclick="developers()" style="float:right; background:red; padding:5px 20px;">X</button>    
        <h4 style="padding:5px;">Developers</h4>
        <hr>
        <img src="image/dev.jpeg" alt="Dev" style="float:left; width:100px; height:100px; padding:50px 20px;">
        <div>
            Zaffar <br>
            <br>
            +(91)9876543210 <br>
            <br>
            mail@mail.com <br>
            <br>
            Thiruvalluvar University <br>
            CAH College
            
        </div>
    </div>
    <!---------------------------------------FeedBack Section Start---------------------------------------->
    <div id="feedback-container">
    <button onclick="feedbacks()" style="float:right; background:red; padding:5px 20px;">X</button>
    <br>
    <h1 align=center>Feedback</h1>
    <p style="margin-left:100px;">
        You can send us your feedback through e-mail on the following e-mail id: <br>
        hello@gmail.com <br>
    </p>
    <br>
    <p style="margin-left:100px; padding:10px;">Or you can directly submit your feedback by filling the enteries below:-</p>
        <div style="padding:0px 50px 50px;">
        Name : &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="name" placeholder="Enter Your Name"><br><br>
        Subject : &emsp;&emsp;&emsp;
            <input type="text" id="sub" placeholder="Enter Subject"><br><br>
        E-Mail Address :
            <input type="text" id="femail" placeholder="Enter Your E-Mail Id"><br><br><br>
            <textarea style="border:none;" rows="6" cols="80" id="feedback" placeholder="Write feedback here..."></textarea>
            <br>
            <br>
            <div style="text-align:center">
                <button style="background:blue; padding:10px 50px;" onclick="feedback_submit()">Submit</button>
            </div>
        </div>
        <div></div>
    </div>
    <!---------------------------------------Feedback Section End--------------------------------->
</body>
<footer id="footer">
    <ul>
        <li>
            <a href="hakeem.html">About Us</a>
        </li>
        <li>
            <a href="instruction.php">Terms & Conditions</a>
        </li>
        <li>
            <a href="#" onclick="developers()">Developers</a>
        </li>
        <li><a href="#" onclick="feedbacks()">Feedback</a></li>
    </ul>  
</footer>
