<?php include('../include/head.php');
if(isset($_SESSION['user_id'])) :
$user_id=$_SESSION['user_id'];
$room_id=$end_date="";
?>  
<body class="not-front page-rooms">
<div id="main">
    <?php include_once('../include/header.php'); ?>
    <div class="breadcrumbs1_wrapper">
        <div class="container">
            <div class="breadcrumbs1"><a href="../">Home</a><span>|</span>My Rooms</div>
        </div>
    </div>
    <div id="content">
        <div class="container">
        <?php 
        $my_rooms_id=mysqli_query($con,"select * from requests where userid='$user_id' && status='approved' order by id desc");
        $no=0;
        while($row1=mysqli_fetch_array($my_rooms_id)) :
            $start_date=$row1['start_date'];
            $end_date=$row1['end_date'];
            $room_id=$row1['room_id'];
            
            $my_rooms=mysqli_query($con,"select * from rooms where id='$room_id'");
            if($row=mysqli_fetch_array($my_rooms)) : 
            $no++; ?>

                <div class="our-rooms-wrapper clearfix">
                    <div class="our-rooms-left">
                        
                        <figure class="our-rooms-img">
                            <img src="../assets/images/uploads/<?php echo $row['image']; ?>" alt="" class="img-fluid">
                        </figure>
                    </div>
                    <div class="our-rooms-right">
                        <div class="our-rooms-caption">
                            <div class="txt2"><?php echo $row['name']; ?></div>
                            <div class="txt3"><p><?php echo strip_tags(htmlspecialchars_decode(substr($row['descrip'],0,300))); ?></p></div>
                            <?php echo date('d/m/Y',strtotime($start_date)) . " - ". date('d/m/Y',strtotime($end_date)); ?>
                            <div class="txt4"><span><i class="fas fa-rupee-sign"></i>  <?php echo $row['price']; ?></span> PER MONTH</div>
                            <div class="our-rooms-icons">
                                <div class="our-rooms-icons">
                                    <div class="our-rooms-icon">
                                        <figure><img src="../assets/images/ic14.png" alt="" class="img-fluid"></figure>
                                        <div class="our-rooms-icon-txt1">Car Parking Available</div>
                                        <div class="our-rooms-icon-txt2">INCLUDES</div>
                                    </div>
                                </div>
                                <?php if($row['food']) : ?>
                                    <div class="our-rooms-icons">
                                        <div class="our-rooms-icon">
                                            <figure><img src="../assets/images/ic12.png" alt="" class="img-fluid"></figure>
                                            <div class="our-rooms-icon-txt1">Food</div>
                                            <div class="our-rooms-icon-txt2">INCLUDES</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($row['wifi']) : ?>
                                    <div class="our-rooms-icons">
                                        <div class="our-rooms-icon">
                                            <figure><img src="../assets/images/ic11.png" alt="" class="img-fluid"></figure>
                                            <div class="our-rooms-icon-txt1">Free WiFi AROUND the DELVATORE</div>
                                            <div class="our-rooms-icon-txt2">INCLUDES</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                    <div class="our-rooms-icons">
                                        <div class="our-rooms-icon">
                                            <figure><img src="../assets/images/ic15.png" alt="" class="img-fluid"></figure>
                                            <div class="our-rooms-icon-txt1">Security safe Available</div>
                                            <div class="our-rooms-icon-txt2">INCLUDES</div>
                                        </div>
                                    </div>
                                <?php if($row['ac']) : ?>
                                    <div class="our-rooms-icons">
                                        <div class="our-rooms-icon">
                                            <figure><img src="../assets/images/ic18.png" alt="" class="img-fluid"></figure>
                                            <div class="our-rooms-icon-txt1">Air Conditioning</div>
                                            <div class="our-rooms-icon-txt2">AVAILABLE</div>
                                        </div>
                                    </div>
                                <?php endif; ?>    
                            </div>
                        </div>
                        <div class="our-rooms-details">
                            <div class="my-3">
                            <?php
                 		if(date('Y-m-d',strtotime('+10 days')) >= $end_date) :               
                                $room_id=$row['id'];
                             

                                $renewals=mysqli_query($con,"select * from renewals where user_id='$user_id' && room_id='$room_id'");
                                if(mysqli_num_rows($renewals)) 
                                {
                                    if($row1=mysqli_fetch_array($renewals))
                                    {   
                                        
                                        switch($row1['status'])
                                        {
                                            case 'pending' :
                                                echo '<span class="text-warning">pending</span>';
                                                break;
                                            case 'approved' :
                                                echo '<span class="text-success">Approved</span>';
                                                break; 
                                            case 'rejected' :
                                                echo '<span class="text-danger">Rejected</span>';
                                                break;
                                        }
                                    }
                                }
                                else
                                {
                                    //<!-- Modal Button -->
                                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal'.$no.'">
                                    Renew
                                    </button>';
                                }
                                endif;
                            ?>    
                            </div>
                            <a href="../user/room-view.php?id=<?php echo $row['id']; ?>">
                                <div class="caption">
                                    <div class="txt2"><?php echo $row['name']; ?></div>
                                </div>
                                <a href="../user/room-view.php?id=<?php echo $row['id']; ?>"><span class="txt3">VIEW DETAIL <i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
                            </a>
                        </div>
                    </div>
                </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['name']; ?> Renewal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Extend Your stay Upto 1 Month</p>
                        <form action="../include/process.php" method="post" id="extend_form<?php echo $no; ?>">
                            <div class="form-group">    
                                <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="room_name" value="<?php echo $row['name']; ?>">
                                <select name="extend" class="form-control">
                                    <option value="10"> + 10 days </option>
                                    <option value="20"> + 20 days </option>
                                    <option value="30"> + 1 Month </option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="$('#extend_form<?php echo $no; ?>').submit()">Extend</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <?php endif; ?>
        <?php endwhile; ?>
        </div>
    </div>
</div>
<?php include_once('../include/footer.php'); ?>
</body>
</html>
<?php endif; 
header("location:../reglog/login.php"); ?>
