<?php session_start(); 
$con=mysqli_connect("localhost","root","","pgdb");
?>
<!doctype html>
<html lang="en">
<head>
    <title>CSR PG - Paying Guests </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <link href="./assets/css/font-awesome.css" rel="stylesheet">
    <link href="./assets/css/superslides.css" rel="stylesheet">
    <link href="./assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="./assets/css/select2.css" rel="stylesheet">
    <link href="./assets/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
    <link href="./assets/css/owl.carousel.css" rel="stylesheet">
    <link href="./assets/css/slick.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>
<body class="front" data-spy="scroll" data-target="#top-inner" data-offset="0">
<div id="main">
    <div class="top-wrapper top-wrapper-dark">
        <div class="top-inner" id="top-inner">
            <div class="top1-wrapper">
                <div class="container">
                    <div class="top1 clearfix">
                        
                        <div class="social-wrapper">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <div class="account dropdown">
                            <a class="dropdown-toggle" href="" role="button" id="dropdownAccount2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="./assets/images/my-account.jpg" alt="" class="img-fluid"><?php echo isset($_SESSION['user_id']) ? $_SESSION['name'] : 'My Account'; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAccount2">
                                <?php if(isset($_SESSION['user_id'])) : ?>
                                    <a class="dropdown-item" href="./user/account.php">Account</a>
                                    <a class="dropdown-item" href="./routers/logout.php">SIGN OUT</a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="./reglog/login.php">SIGN IN</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top2-wrapper">
                <div class="container">
                    <div class="top2 clearfix">

                            <div class="logo_wrapper">
                                <a href="" class="logo">
                                    <img src="./assets/images/logo-white.png" alt="hjmjhb" class="img-fluid">
                                </a>
                            </div>

                        <nav class="navbar_ navbar navbar-expand-md clearfix">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                                <ul class="nav navbar-nav sf-menu clearfix">
                                    <li class="nav-item"><a href="" class=" nav-link">Home</a></li>
                                    <li class="nav-item"><a href="./user/rooms.php" class=" nav-link">Rooms</a></li>
                                    <li class="nav-item"><a href="./user/status.php" class="nav-link">Bookings</a></li>
                                    <li class="nav-item"><a href="./user/my-room.php" class="nav-link">My Rooms</a></li>
                                    <li class="nav-item"><a href="./user/contact.php" class="nav-link">Feedback</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="home" class="">
        <div id="home-inner" class="home-inner">
            <div id="slides_wrapper" class="">
                <div id="slides">
                    <ul class="slides-container">
                        <li>
                            <img src="./assets/images/slide01.jpg" alt="" class="img">
                        </li>
                        <li>
                            <img src="./assets/images/slide04.jpg" alt="" class="img">
                        </li>
                        <li>
                            <img src="./assets/images/slide03.jpg" alt="" class="img">
                        </li>
                        <li>
                            <img src="./assets/images/slide02.jpg" alt="" class="img">
                        </li>
                        <li>
                            <img src="./assets/images/slide05.jpg" alt="" class="img">
                        </li>
                        <li>
                            <img src="./assets/images/slide06.jpg" alt="" class="img">
                        </li>

                    </ul>
                </div>
            </div>
            <div class="slide-text-wrapper">
                <div class="container">
                    <div class="slide-text clearfix">
                        <div class="img1">
                            <img src="./assets/images/logo-white.png" alt="" class="img-fluid">
                        </div>
                        <div class="txt1"><span>CSR-PG<i><img src="./assets/images/slide-logo2.png" alt="" class="img-fluid"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-buttons-wrapper">
                <div class="container">
                    <div class="slide-buttons clearfix">
                        <div class="slide-button">
                            <a href="#">
                                <div class="ic"><img src="./assets/images/slide-ic1.png" alt="" class="img-fluid"></div>
                                <div class="hr"></div>
                                <div class="txt1">PG</div>
                            </a>
                        </div>
                        <div class="slide-button">
                            <a href="#">
                                <div class="ic"><img src="./assets/images/slide-ic2.png" alt="" class="img-fluid"></div>
                                <div class="hr"></div>
                                <div class="txt1">Breakfast</div>
                            </a>
                        </div>
                        <div class="slide-button">
                            <a href="#">
                                <div class="ic"><img src="./assets/images/slide-ic3.png" alt="" class="img-fluid"></div>
                                <div class="hr"></div>
                                <div class="txt1">Fitness Club</div>
                            </a>
                        </div>
                        <div class="slide-button">
                            <a href="#">
                                <div class="ic"><img src="./assets/images/slide-ic4.png" alt="" class="img-fluid"></div>
                                <div class="hr"></div>
                                <div class="txt1">Support 24/7</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top-wrapper"></div>
    <div id="about">
        <div class="container">

            <div class="title1">LITTLE ABOUT US</div>


            <div class="about-slider-wrapper clearfix">
                <div class="about-slider-left">
                    <div class="slider-for">
                        <div class="slider-item">
                            <img src="./assets/images/about01.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="./assets/images/about02.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="./assets/images/about03.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="about-slider-right">
                    <div class="slider-nav">
                        <div class="slider-item">
                            <div class="txt1">
                                CSR Paying Guest
                            </div>
                            <div class="txt2">
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                            </div>
                            
                        </div>
                        <div class="slider-item">
                            <div class="txt2">
                                <div class="txt1">
                                    CSR Paying Guest
                                </div>
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="txt2">
                                <div class="txt1">
                                    CSR Paying Guest
                                </div>
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                                <p>
                                    Finding the perfect home is not easy, as pioneers of real estate website on the internet, 
                                    we have the solution! With over 2 lakhs+ listings, 1.5 million+ users, 3500 builders and 
                                    real estate agents listing over 40,000+ new projects on our web portal,we guarantee that 
                                    everything you need for the perfect home is just a few scrolls down!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="rooms">
        <div class="container">
            <div class="title1">OUR ROOMS</div>
            <br>
            <div class="row row-cols-3">
            <?php $rooms=mysqli_query($con,"select * from rooms order by id desc limit 3");
                while($room=mysqli_fetch_array($rooms)) :  ?>
                    <div class="col-lg-4">
                        <div class="room-wrapper">
                            <div class="room-inner">
                                <div class="room">
                                    <figure>
                                        <img src="./assets/images/uploads/<?php echo $room['image']; ?>" alt="Image" class="img-fluid" style="height:230px;">
                                        <figcaption>
                                            <div class="txt1"><?php echo $room['name']; ?></div>
                                            <div class="txt2">START FROM <i class="fas fa-rupee-sign"></i> <?php echo $room['price']; ?></div>
                                        </figcaption>
                                    </figure>
                                    <div class="caption">
                                        <div class="txt1"><?php echo $room['name']; ?></div>
                                        
                                        <div class="txt3">
                                            <?php echo substr($room['descrip'],0,100); ?>...
                                        </div>
                                        <div class="txt4">
                                            <a href="./user/room-view.php?id=<?php echo $room['id']; ?>">See Room Details<i class="fa fa-caret-right"
                                                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="select-txt">
                                        <a href="./user/room-view.php?id=<?php echo $room['id']; ?>"><span>SELECT THIS ROOM<i class="fa fa-angle-right"
                                                                                        aria-hidden="true"></i></span></a>
                                    </div>
                                    <div class="room-icons">
                                        <?php if($room['wifi']) : ?>
                                        <div class="room-ic room-ic-wifi">
                                            <i class="fa fa-wifi" aria-hidden="true"></i>
                                            <div class="txt1">FREE WIFI</div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($room['ac']) : ?>
                                        <div class="room-ic room-ic-person">
                                            <i class="fa fa-fan" style="font-size:24px;" aria-hidden="true"></i> 
                                            <div class="txt1">Air conditioner</div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($room['food']) : ?>
                                        <div class="room-ic room-ic-person">
                                            <i class="fas fa-utensils" aria-hidden="true"></i>
                                            <div class="txt1">FOOD<br>INCLUDED</div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="room-ic room-ic-left">
                                            <div class="txt0"><?php echo $room['max']; ?></div>
                                            <div class="txt1">MAX<br>PERSON</div>
                                        </div>                                                
                                        <div class="room-ic room-ic-refund">
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <div class="txt1">NO REFUND</div>
                                        </div>
                                        <div class="room-price">
                                            <div class="txt1"><i class="fas fa-rupee-sign"></i><span><?php echo $room['price']; ?></span></div>
                                            <div class="txt2">PER MONTH</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>


        </div>
    </div>
    
    <div class="bot1-wrapper">
        <div class="container">
            <div class="bot1 clearfix">
                <div class="logo2_wrapper">
                    <a href="" class="logo2">
                        <img src="./assets/images/logo-white.png" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="social2-wrapper">
                    <ul class="social2">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <p>
                    <i>CSR Paying Guests</i>
                </p>
            </div>
        </div>
    </div>
    <div class="bot3-wrapper">
        <div class="container">
            <div class="bot3 clearfix">
                <ul class="menu-bot">
                    <li><a href="">Home</a></li>
                    <li><a href="./user/rooms.php">Rooms</a></li>
                    <li><a href="./user/status.php">My Requests</a></li>
                    <li><a href="./user/my-room.php">My Rooms</a></li>
                    <li><a href="./user/account.php">Account</a></li>
                    <li><a href="./user/contact.php">Account</a></li>
                </ul>

                <div class="copyrights">Copyright @2018 Made with <i class="fa fa-heart" aria-hidden="true"></i> By <a href="#" target="_blank">XYZ</a>. All Rights Reserve
                </div>

            </div>
        </div>
    </div>
</div>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/superfish.js"></script>
<script src="./assets/js/jquery.superslides.js"></script>
<script src="./assets/js/jquery.fancybox.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>
<script src="./assets/js/jquery.easing.1.3.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/jquery-ui.js"></script>
<script src="./assets/js/owl.carousel.js"></script>
<script src="./assets/js/slick.js"></script>
<script src="./assets/js/jquery.appear.js"></script>

<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/scripts.js"></script>
<script src="https://kit.fontawesome.com/c5b0d4ad62.js" crossorigin="anonymous"></script>
</body>
</html>
