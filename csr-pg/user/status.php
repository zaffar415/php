<?php
include_once('../include/head.php'); 
if(isset($_SESSION['user_id']))
	{
		?>


<body class="not-front page-rooms">
    <div id="main">
        <?php include_once('../include/header.php'); ?>
        
        <div class="breadcrumbs1_wrapper">
            <div class="container">
                <div class="breadcrumbs1"><a href="../">Home</a><span>|</span>Booking Status</div>
            </div>
        </div>
        <div class="container" style="min-height:400px;">
            <div class="table-responsive">
        
                <br><br>
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="bg-warning">
                            <th>No. </th>
                            <th>Room</th>
                            <th>StartDate</th>
                            <th>EndDate</th>
                            <th>Status</th>
                            
                            <th>Delete</th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $user_id=$_SESSION['user_id'];
                        $requests=mysqli_query($con,"select * from requests where userid='$user_id' && status!='approved' order by id desc");
                        if(mysqli_num_rows($requests)) :
                            $no=1;
                            while($row=mysqli_fetch_array($requests)) : ?>
                            <tr>
                                
                                <td><?php echo $no; $no++; ?></td>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td><?php echo $row['status']; ?><br> <?php echo $row['description']; ?> </td>
                                <td><a href="../include/process.php?delete_request=<?php echo $row['id']; ?>"><i class="btn btn-danger">Delete</i></a></td>

                            </tr>
                        
                        <?php endwhile;
                        else : ?>
                            <tr>
                                <td colspan="6">Nothing Found</td>
                            </tr>                      
                        <?php endif; ?>
                        </tbody>
                    
                
                </table>
            </div> 
        </div>
    </div> 
    <?php include_once('../include/footer.php'); ?>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:../reglog/login.php");
		}
	}
?>