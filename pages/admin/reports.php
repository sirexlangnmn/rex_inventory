<!DOCTYPE html>
<html lang="en">
    <head>
    	<!-- session code is inside style.php -->
        <?php include('includes/style.php'); ?>
    </head>
    <body>
        <?php include('includes/preloader.php'); ?>
        <div id="wrapper">
            <?php include('includes/topbar.php');?>
            <?php include('includes/sidebar.php');?>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <!-- .page title -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Starter Page</h4>
                        </div>
                        <!-- /.page title -->
                        <!-- .breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Starter Page</li>
                            </ol>
                        </div>
                        <!-- /.breadcrumb -->
                    </div>
                    <!-- Work Station -->
                    <div class="row">
                        <div class="col-md-12 white-box">
                            <?php 
                                $query1 = mysqli_query($con,"SELECT * FROM branch ORDER BY branch_name")or die(mysqli_error($con));
                                while ($row=mysqli_fetch_array($query1)):
                                ?>
                            <a href ="reports_page.php?branch_id=<?php echo $row['branch_id'];?>">
                                <div class="col-md-6 col-sm-12">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <i class="center fa fa-building"></i>
                                        </div>
                                        <div class="panel-body">
                                            <h2><?php echo $row['branch_name'];?></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endwhile; ?>	
                        </div>
                    </div>
                    <!-- /.Work Station -->
                </div>
                <!-- /.container-fluid -->
                <?php include('includes/footer.php'); ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include('includes/script.php'); ?>
    </body>
</html>