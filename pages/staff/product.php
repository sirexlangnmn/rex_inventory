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
                        <h4 class="page-title">Product</h4>
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
                            <li class="active">Product</li>
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
                            <button class="fcbtn btn btn-success btn-outline btn-1e" data-toggle="modal" data-target="#modal-product-insert">
                            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Add Supplier"></i> Add Product</button>
                            <?php include('modal_product_insert.php'); ?>
                        </div>
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Category</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Picture</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Supplier</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Reorder</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Picture</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Supplier</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Reorder</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM product NATURAL JOIN supplier NATURAL JOIN category WHERE branch_id = '$branch' ORDER BY prod_name")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)):
                                                $cate_id = $row['cat_id'];
                                                $supp_id = $row['supplier_id'];
                                            ?>
                                          <tr>
                                            <td><?php echo $row['prod_id'];?></td>
                                            <td><img style="width:80px;height:60px" src="../../assets/plugins/images/product/<?php echo $row['prod_pic'];?>"></td>
                                            <td><?php echo $row['serial'];?></td>
                                            <td><?php echo $row['prod_name'];?></td>
                                            <td><?php echo $row['prod_desc'];?></td>
                                            <td><?php echo $row['supplier_name'];?></td>
                                            <td><?php echo $row['prod_qty'];?></td>
                                            <td><?php echo number_format($row['prod_price'],2);?></td>
                                            <td><?php echo $row['cat_name'];?></td>
                                            <td><?php echo $row['reorder'];?></td>
                                            <td>
                                                <a href="#" data-target="#modal-product-update<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="btn btn-outline-success waves-effect waves-light" onclick="return confirm('Update this data?')">
                                                    <i class="glyphicon glyphicon-edit text-blue" data-toggle="tooltip" data-placement="top" title="Update Supplier Details"></i>
                                                </a>
                                                  <?php include('modal_product_update.php'); ?>
                                                

                                                <a href="#" data-target="#" data-toggle="modal" style="color: red;" class="btn btn-outline-danger waves-effect waves-light" onclick="return confirm('Delete Button Under Development.')"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete Product Record"></i></a>
                                            </td>
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


                <!-- ========================================= -->
                <!-- Modals -->
                <!-- ========================================= -->
                <?php include('modal_product_update.php'); ?>
                <!-- ========================================= -->
                <!-- /.Modals -->
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