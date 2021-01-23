<?php include('../include/head.php'); ?>

<body class="not-front page-reservation">
<div id="main">
    <?php include('../include/header.php'); ?>
    <div class="breadcrumbs1_wrapper">
        <div class="container">
            <div class="breadcrumbs1"><a href="../">Home</a><span>|</span>Feedback</div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="card p-5 col-lg-9 m-auto">
                <div class="text-center pb-5">
                    <h1>Feedback</h1>
                </div>
                <form action="" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10" placeholder="" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="text-right">
                                <input type="submit" class="btn btn-warning form-control" name="feed_submit" value="Send" >
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <?php 
                    if(isset($_REQUEST['feed_submit']))
                    {
                        $name=$_REQUEST['username'];
                        $email=$_REQUEST['email'];
                        $subject=$_REQUEST['subject'];
                        $message=trim($_REQUEST['message']);
                        $subject=str_replace("'","\'",$subject);
                        $message=str_replace("'","\'",$message);
                        if(mysqli_query($con,"insert into feedback(name,email,subject,message)values('$name','$email','$subject','$message')"))
                        {
                            echo '<div class="bg-success text-white p-1 pl-3">Thankyou for your Message</div>';
                        }
                        else {
                            echo '<div class="bg-danger text-white p-1 pl-3">Error in your Message</div>';
                        }
                    }

                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once('../include/footer.php'); ?>
</body>
</html>
