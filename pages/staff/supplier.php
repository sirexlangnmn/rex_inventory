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
                        <div class="button-box">
                            <button class="fcbtn btn btn-success btn-outline btn-1e" data-toggle="modal" data-target="#modal-supplier-insert">
                            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Add Supplier"></i> Add Supplier</button>
                            <?php include('modal_supplier_insert.php'); ?>
                        </div>
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Category</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>#</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>#</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php       
                                            $supplier_query = mysqli_query($con,"SELECT * FROM supplier")or die(mysqli_error());
                                                while($row = mysqli_fetch_array($supplier_query)) :        
                                            ?>
                                        <tr>
                                            <td>
                                                <a href="#" data-target="#modal-supplier-update<?php echo $row['supplier_id'];?>" data-toggle="modal" style="color:#fff;" class="btn btn-outline-success waves-effect waves-light" onclick="return confirm('Update this data?')">
                                                    <i class="glyphicon glyphicon-edit text-blue" data-toggle="tooltip" data-placement="top" title="Update Supplier Details"></i>
                                                </a>
                                                  <?php include('modal_supplier_update.php'); ?>

                                                  <a href="#" data-target="#" data-toggle="modal" style="color: red;" class="btn btn-outline-danger waves-effect waves-light" onclick="return confirm('Delete Button Under Development.')"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete Supplier Record"></i></a>
                                            </td>
                                            <td><?php echo $row['supplier_id']; ?></td>
                                            <td><?php echo $row['supplier_name']; ?></td>
                                            <td><?php echo $row['supplier_address']; ?></td>
                                            <td><?php echo $row['supplier_contact']; ?></td>
                                        </tr>
                                        <?php endwhile; ?>      
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