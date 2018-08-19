<!DOCTYPE html>

<html lang="en">
<head>

<?php
  session_start();
  
  if(empty($_SESSION['id'])):
  header('Location:../../index.php');
  endif;

  if(empty($_SESSION['branch'])):
  header('Location:../../index.php');
  endif;

  include('includes/style.php');
?>

</head>

<body>
    <?php include('includes/preloader.php'); ?>
    <div id="wrapper">
    <?php include('includes/navbar-top.php'); ?>
    <?php include('includes/navbar.php'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- ========================================= -->
                    <!-- Page Title -->
                    <!-- ========================================= -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Starter Page</h4>
                    </div>
                    <!-- ========================================= -->
                    <!-- /.Page Title -->
                    <!-- ========================================= -->

                    <!-- ========================================= -->
                    <!-- Breadcumb -->
                    <!-- ========================================= -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Starter Page</li>
                        </ol>
                    </div>
                    <!-- ========================================= -->
                    <!-- /.Breadcumb -->
                    <!-- ========================================= -->
                </div>


                <!-- ========================================= -->
                <!-- Work field -->
                <!-- ========================================= -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Blank Starter page</h3>
                                
                        </div>
                    </div>
                </div>
                <!-- ========================================= -->
                <!-- /.Work field -->
                <!-- ========================================= -->
               
            </div> <!-- /.container-fluid -->
            <?php include('includes/footer.php'); ?>
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
   <?php 
        include('includes/script.php');
        include('components/datatables.php'); 
        include('components/validator.php'); 
    ?>
</body>
</html>