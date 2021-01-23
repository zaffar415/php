    <?php 
    /*  Update Room Occupied  */
    $today=date('Y-m-d');
    mysqli_query($con,"UPDATE requests SET status='completed' where end_date<'$today' && status='approved'");
    $update_occupied=mysqli_query($con,"select * from rooms");
    while($update_room=mysqli_fetch_array($update_occupied))
    {
        $update_id=$update_room['id'];
        $fetch_details=mysqli_query($con,"select * from requests where room_id='$update_id' && status='approved'");
        $occupied=0;
        while($fetch_occupied=mysqli_fetch_array($fetch_details))
        {
            $occupied+=$fetch_occupied['quantity'];
        }
        mysqli_query($con,"UPDATE rooms SET occupied='$occupied' where id='$update_id'");
    }
    /*  End Update Room Occupied  */

    ?>
    <?php if(@($_GET['plan'])) : ?>
    <div class="search-wrapper">
        <div class="container">
            <div class="search-inner clearfix">
                <div class="search-field">
                    <form action="">
                        <input type="hidden" name="plan" value="<?php echo $_GET['plan']; ?>">
                        <input type="text" class="form-control" name="s" value="" placeholder="Enter Your Search...">
                    </form>
                </div>
                <a href="#" class="search-btn search-close"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <?php endif; ?>  

    <div class="top-wrapper">
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
                                <?php if(@($_GET['plan']))  : ?>
                                <a href="#" class="search-btn search-open"><i class="fa fa-search"></i></a>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="account dropdown">
                            <a class="dropdown-toggle" href="" role="button" id="dropdownAccount"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/my-account.jpg" alt="" class="img-fluid"><?php echo isset($_SESSION['user_id']) ? $_SESSION['name'] : 'My Account'; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                                <?php if(isset($_SESSION['user_id'])) : ?>
                                    <?php if(!isset($_SESSION['admin_sid'])) : ?>
                                    <a class="dropdown-item" href="../user/account.php">ACCOUNT</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="../routers/logout.php">SIGN OUT</a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="../reglog/login.php">SIGN IN</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top2-wrapper">
                <div class="container">
                    <div class="top2 clearfix">
                        <header>
                            <div class="logo_wrapper">
                                <a href="index.html" class="logo">
                                    <img src="../assets/images/logo.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </header>
                        <nav class="navbar_ navbar navbar-expand-md clearfix">

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav sf-menu clearfix">
                                    <li class="nav-item"><a href="../" class=" nav-link">Home</a></li>
                                    <li class="nav-item"><a href="../user/rooms.php" class=" nav-link">Rooms</a></li>
                                    <li class="nav-item"><a href="../user/status.php" class="nav-link">Bookings</a></li>
                                    <li class="nav-item"><a href="../user/my-room.php" class="nav-link">My Rooms</a></li>
                                    <li class="nav-item"><a href="../user/contact.php" class="nav-link">Feedback</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
