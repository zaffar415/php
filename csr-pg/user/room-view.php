<?php include_once('../include/head.php'); ?>

<body class="not-front page-details">
    <div id="main">
        <?php include_once('../include/header.php'); ?>
        
        <?php 
        if(@($_GET['id'])) :
            $id=$_GET['id'];
            $room=mysqli_query($con,"select * from rooms where id='$id'"); 
            if($row=mysqli_fetch_array($room)) : ?>
        
        <div class="breadcrumbs1_wrapper">
            <div class="container">
                <div class="breadcrumbs1"><a href="../">Home</a><span>|</span><?php echo $row['name']; ?></div>
            </div>
        </div>
        
        <div id="content">
            <div class="container">
                <div class="title1"><?php echo $row['name']; ?></div>
                <div class="title2">Lorem ipsum dolor sit amet concateur non troppo di saronno la prada</div>
                <div class="slider2-wrapper">
                    <div class="slider-for2">
                        <div class="slider-item">
                            <img src="../assets/images/uploads/<?php echo $row['image']; ?>" alt="" class="img-fluid" style="max-height:600px;">
                        </div>
                    </div>
                </div>

                <div class="details-wrapper clearfix" style="min-height:100px; padding-right:0px;">
                    <div class="txt2"><?php echo $row['name']; ?></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="txt3">
                                
                                    <?php 
                                    $text=$row['descrip'];
                                    echo htmlspecialchars_decode($text); ?>
                                
                                <?php if(isset($_SESSION['admin_sid'])) : ?>
                                    <table style="text-align:center; width:100%; border:1px solid grey;">
                                        <thead>
                                            <tr style="border-bottom:1px solid grey;">
                                                <th>ID</th>
                                                <th>name</th>
                                                <th>Email</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th>Persons</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                        $admin_details=mysqli_query($con,"select * from requests where room_id='$id' && status='approved'");
                                        while($admin=mysqli_fetch_array($admin_details)) : ?>
                                        <tr>
                                            <td><?php echo $admin['userid']; ?></td>
                                            <td><?php echo $admin['name']; ?></td>
                                            <td><?php echo $admin['email']; ?></td>
                                            <td><?php echo $admin['start_date']; ?></td>
                                            <td><?php echo $admin['end_date']; ?></td>
                                            <td><?php echo $admin['quantity']; ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </table>
                                <?php endif; ?>
                            </div>
                            <div class="details2-wrapper" style="padding-top:30px;">
                                <div class="row row-cols-2">
                                    <div class="col-md-6">
                                        <div class="our-rooms-icons">
                                            <div class="our-rooms-icon">
                                                <figure><img src="../assets/images/ic14.png" alt="" class="img-fluid"></figure>
                                                <div class="our-rooms-icon-txt1">Car Parking Available</div>
                                                <div class="our-rooms-icon-txt2">INCLUDES</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($row['food']) : ?>
                                    <div class="col-md-6">
                                        <div class="our-rooms-icons">
                                            <div class="our-rooms-icon">
                                                <figure><img src="../assets/images/ic12.png" alt="" class="img-fluid"></figure>
                                                <div class="our-rooms-icon-txt1">Food</div>
                                                <div class="our-rooms-icon-txt2">INCLUDES</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($row['wifi']) : ?>
                                    <div class="col-md-6">
                                        <div class="our-rooms-icons">
                                            <div class="our-rooms-icon">
                                                <figure><img src="../assets/images/ic11.png" alt="" class="img-fluid"></figure>
                                                <div class="our-rooms-icon-txt1">Free WiFi AROUND the DELVATORE</div>
                                                <div class="our-rooms-icon-txt2">INCLUDES</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-md-6">
                                        <div class="our-rooms-icons">
                                            <div class="our-rooms-icon">
                                                <figure><img src="../assets/images/ic15.png" alt="" class="img-fluid"></figure>
                                                <div class="our-rooms-icon-txt1">Security safe Available</div>
                                                <div class="our-rooms-icon-txt2">INCLUDES</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($row['ac']) : ?>
                                    <div class="col-md-6">
                                        <div class="our-rooms-icons">
                                            <div class="our-rooms-icon">
                                                <figure><img src="../assets/images/ic18.png" alt="" class="img-fluid"></figure>
                                                <div class="our-rooms-icon-txt1">Air Conditioning</div>
                                                <div class="our-rooms-icon-txt2">AVAILABLE</div>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding:0px 40px;">
                            <div class="card" style="padding:20px 20px;">
                            <div class="txt4"><i class="fas fa-rupee-sign"></i> <span><?php echo $row['price']; ?></span> PER MONTH</div>
                            
                                <form action="<?php echo isset($_SESSION['user_id']) ? '../include/process.php' : '../reglog/login.php'; ?>" method="post">
                                    <input type="hidden" name="room_name" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id'];  ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                    <div class="form-group">
                                    <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" min="<?php echo date('Y-m-d',strtotime('today')); ?>" value="<?php echo date('Y-m-d',strtotime('tomorrow')); ?>" max="<?php echo date('Y-m-d',strtotime('+3 months')); ?>" require="required">
                                    </div>
                                    <input type="hidden" name="plan" value="<?php echo $row['plans']; ?>">
                                    <!-- <div class="form-group">
                                        
                                        <input type="radio" name="plan" value="short_term" id="short-term" onchange="$('.select').toggle()" checked> Short-Term
                                        <input type="radio" name="plan" value="long_term" id="long-term" onchange="$('.select').toggle()"> Long-term
                                    </div> -->
                                    <div class="form-group select">
                                    <label>Select Duration</label><br>
                                    <?php if($row['plans']=='short') : ?>
                                        <select id="" class="form-control" name="month">
                                            <option value="1">1 Month</option>
                                            <option value="3">3 Month</option>
                                            <option value="6">6 Month</option>
                                            <option value="12">12 Month</option>
                                        </select>
                                        <?php else : ?>
                                            <select id="" class="form-control" name="year">
                                            <option value="12">1 Year</option>
                                            <option value="24">2 Year</option>
                                            <option value="36">3 Year</option>
                                        </select>
                                        <?php endif; ?>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label>No. of Persons <small>(max :  <?php echo $row['max']; ?>)</small> </label> 
                                        <input type="number" name="quantity" class="form-control" required="required" value="1" min="1" max="<?php echo $row['max']; ?>">
                                    </div>
                                    <input type="submit" value="Register Now" name="new-booking" class="form-control btn btn-warning" <?php echo isset($_SESSION['admin_sid']) ? 'disabled' : ''; ?> >
                                    <div class="pt-3">
                                        <div class="text-center">
                                            By proceeding, you agree to our <a href="#">Terms and Conditions</a>.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php 
            endif; 
        endif; ?>  
    </div>
<?php include_once('../include/footer.php'); ?>
</body>
</html>
