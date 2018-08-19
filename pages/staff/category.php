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
                        <h4 class="page-title">Category and Subcategory</h4>
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
                            <li class="active">Category and Subcategory</li>
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
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="button-box">
                    		<button class="fcbtn btn btn-success btn-outline btn-1e" data-toggle="modal" data-target="#modal-cat-insert">
                    		<i class="fa fa-plus-circle"></i> Add Category</button>
                            <?php include('modal_cat_insert.php'); ?>
                    	</div>
                        <div class="white-box">
                        	<h3 class="box-title m-b-0">Category</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>#</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>#</th>
                                            <th>Category</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php       
                                            $cat_query = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name")or die(mysqli_error());
                                                while($cat_row = mysqli_fetch_array($cat_query)) :        
                                            ?>
                                        <tr>
                                            <td>
                                                <a href="#" data-target="#modal-cat-update<?php echo $cat_row['cat_id'];?>" data-toggle="modal" style="color:#fff;" class="btn btn-outline-success waves-effect waves-light"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                                  <?php include('modal_cat_update.php'); ?>

                                                  <a href="#" data-target="#" data-toggle="modal" style="color: red;" class="btn btn-outline-danger waves-effect waves-light" onclick="return confirm('Delete Button Under Development.')"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete Category"></i></a>
                                            </td>
                                            <td><?php echo $cat_row['cat_id']; ?></td>
                                            <td><?php echo $cat_row['cat_name']; ?></td>
                                        </tr>
                                        <?php endwhile; ?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="button-box">
                    		<button class="fcbtn btn btn-success btn-outline btn-1e" data-toggle="modal" data-target="#modal-subcat-insert">
                    		<i class="fa fa-plus-circle"></i> Add Sub Category</button>
                            <?php include('modal_subcat_insert.php'); ?>
                    	</div>
                        <div class="white-box">
                            <h3 class="box-title">Sub Categories</h3>
                            <div class="table-responsive">
                            	<table id="myTable" class="table table-striped">
                                <!-- <table id="example23" class="display nowrap" cellspacing="0" width="100%"> -->
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
