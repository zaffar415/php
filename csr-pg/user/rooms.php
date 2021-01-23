<?php include('../include/head.php'); ?>

<body class="not-front page-reservation">
<div id="main">
    
    <?php include('../include/header.php'); ?>
    <div class="breadcrumbs1_wrapper">
        <div class="container">
            <div class="breadcrumbs1"><a href="../">Home</a><span>|</span>Rooms</div>
        </div>
    </div>
    <div id="content">
    <div id="">
        <?php if(!@($_GET['plan'])) : ?>
        <div class="container">

            <div class="title1">Select Your Stay</div>
                <div class="title2">Select stay according to your perferences</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="latest-news-wrapper">
                            <div class="latest-news-inner">
                                <div class="latest-news clearfix">
                                    <figure><a href="?plan=short"><img src="../assets/images/news01.jpg" alt="" class="img-fluid"></a></figure>
                                    <div class="caption">
                                        <div class="txt1"><a href="../user/rooms.php?plan=short">Short Stay</a></div>
                                        <div class="txt2">Maximum 1 year
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="latest-news-wrapper">
                            <div class="latest-news-inner">
                                <div class="latest-news clearfix">
                                    <figure><a href="?plan=long"><img src="../assets/images/news02.jpg" alt="" class="img-fluid"></a></figure>
                                    <div class="caption">
                                        <div class="txt1"><a href="../user/rooms.php?plan=long">Long Stay</a></div>
                                        <div class="txt2">Maximun 3 Years
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php else : ?>
        <div class="container">
        <?php 
            $plan="";
            if(@($_GET['plan']))
            {
                $plan="where plans='".$_GET['plan']."'";
                if(@($_GET['s']))
                {
                    $plan.="&& name LIKE '%".$_GET['s']."%'";
                }
            }                    
        ?>
            <div class="title1">OUR ROOMS</div>
            <br><br>
            <div id="second-tab-group" class="tabgroup">
                <div id="tabs2-1">
                    <div class="row row-cols-3">
                        <?php $rooms=mysqli_query($con,"select * from rooms $plan order by id desc");
                        while($room=mysqli_fetch_array($rooms)) :  ?>
                            <div class="col-lg-4">
                                <div class="room-wrapper">
                                    <div class="room-inner">
                                        <div class="room">
                                            <figure>
                                                <img src="../assets/images/uploads/<?php echo $room['image']; ?>" alt="Image" class="img-fluid" style="height:230px;">
                                                <figcaption>
                                                    <div class="txt1"><?php echo $room['name']; ?></div>
                                                    <div class="txt2">START FROM <i class="fas fa-rupee-sign"></i> <?php echo $room['price']; ?></div>
                                                </figcaption>
                                            </figure>
                                            <div class="caption">
                                                <div class="txt1"><?php echo $room['name']; ?> 
                                                <?php if(isset($_SESSION['admin_sid'])) : ?> 
                                                        <a href="../include/process.php?room_delete=<?php echo $room['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif; ?>    
                                                </div>
                                                <?php $ava=(int)$room['total']-(int)$room['occupied']; ?>
                                                <small>(<?php echo $ava < 0 ? 0 : $ava; ?> Bed's Available)</small>
                                                
                                                <div class="txt3">
                                                    <?php echo strip_tags(htmlspecialchars_decode(substr($room['descrip'],0,100))); ?>...
                                                </div>
                                                <div class="txt4">
                                                    <a href="../user/room-view.php?id=<?php echo $room['id']; ?>">See Room Details<i class="fa fa-caret-right"
                                                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="select-txt">
                                                <a href="../user/room-view.php?id=<?php echo $room['id']; ?>"><span>SELECT THIS ROOM<i class="fa fa-angle-right"
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
        </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once('../include/footer.php'); ?>
</body>
</html>
