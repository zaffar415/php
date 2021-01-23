
  

<div id="second-tab-group" class="tabgroup">
                <div id="tabs2-1">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="room-wrapper">
                                <div class="room-inner">
                                    <div class="room">
                                        <figure>
                                            <img src="../assets/images/room04.jpg" alt="" class="img-fluid">
                                            
                                        </figure>
                                        <div class="caption">
                                            <div class="txt1"><a href="room-view.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></div>
                                            <div class="txt2">
                                                39 REVEW
                                                <div class="small-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="txt3">
                                            <?php echo $row['descrip']; ?>
                                            </div>
                                            <div class="txt4">
                                                <a href="details.html">
                                                   </a>
                                            </div>
                                        </div>
                                        <div class="select-txt">
                                            <a href="room-view.php?id=<?php echo $row['id']; ?>"><span>SELECT THIS ROOM<i class="fa fa-angle-right"
                                                                                            aria-hidden="true"></i></span></a>
                                        </div>
                                        <div class="room-icons">
                                            <div class="room-ic room-ic-wifi">
                                                <i class="fa fa-wifi" aria-hidden="true"></i>
                                                <div class="txt1">FREE WIFI</div>
                                            </div>
                                            <div class="room-ic room-ic-person">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <div class="txt1">MAX<br>PERSON</div>
                                            </div>
                                            <div class="room-ic room-ic-breakfast">
                                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                                <div class="txt1">BREAKFAST<br>INCLUDED</div>
                                            </div>
                                            <div class="room-ic room-ic-left">
                                                <div class="txt0">4</div>
                                                <div class="txt1">ROOMS LEFT</div>
                                            </div>
                                            <div class="room-ic room-ic-refund">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <div class="txt1">NO REFUND</div>
                                            </div>
                                            <div class="room-price">
                                                <div class="txt1"><span><?php echo $row['price']; ?></span></div>
                                                <div class="txt2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div></div>
                       
                        
                     

                                <?php if(isset($_SESSION['admin_sid'])) : ?>
                <i class="fas fa-user"></i> <?php echo $row['occupied']." Guests"; ?>
             
            <?php endif; ?>
                               
                            <?php if(isset($_SESSION['admin_sid'])) : ?>
                <a href="process.php?room_delete=<?php echo $row['id']; ?>"> Delete</a>
            <?php endif; ?> <i class="fa fa-caret-right" aria-hidden="true"></i>
                      