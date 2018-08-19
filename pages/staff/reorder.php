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
                            <h4 class="page-title">Reorder List</h4>
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
                                <li class="active">Reorder List</li>
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
                                <a href="requested_purchase.php" class="fcbtn btn btn-success btn-outline btn-1e">
                                <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Add Supplier"></i> View Purchase Request</a>
                            </div>
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
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
                                                <th>Product Code</th>
                                                <th>Product Name</th>
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
                                                $query = mysqli_query($con,"SELECT * FROM product NATURAL JOIN supplier NATURAL JOIN category WHERE branch_id = '$branch' AND prod_qty <= reorder ORDER BY prod_name")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)) :
                                                ?>
                                            <tr>
                                                <td><?php echo $row['serial'];?></td>
                                                <td><?php echo $row['prod_name'];?></td>
                                                <td><?php echo $row['supplier_name'];?></td>
                                                <td><p class='label label-danger'>
                                                    <?php echo $row['prod_qty'];?></p></td>
                                                <td><?php echo number_format($row['prod_price'],2);?></td>
                                                <td><?php echo $row['cat_name'];?></td>
                                                <td><?php echo $row['reorder'];?></td>
                                                <td>
                                                    <a href="#modal-reorder-insert<?php echo $row['prod_id'];?>" data-target="#modal-reorder-insert<?php echo $row['prod_id'];?>" data-toggle="modal" class="fcbtn btn btn-success btn-outline btn-1e">Request Purchase
                                                    </a>
                                                    <?php include('modal_reorder_insert.php'); ?>
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
                </div>
                <!-- /.container-fluid -->
                <?php include('includes/footer.php'); ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php 
            include('includes/script.php');
            include('components/datatables.php'); 
            include('components/validator.php'); 
            ?>
    </body>
</html>