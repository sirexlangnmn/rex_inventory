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
                            <h4 class="page-title">Stockin</h4>
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
                                <li class="active">Stockin</li>
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
                        <div class="col-md-3">
                            <div class="white-box">
                                <form data-toggle="validator" method="post" action="queries/stockin_insert.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="date">Product Name</label>
                                        <div class="input-group">
                                            <select class="form-control" name="prod_name" required>
                                                <?php
                                                    $prod_query=mysqli_query($con,"SELECT * FROM product WHERE branch_id = '$branch' ORDER BY prod_name")or die(mysqli_error());
                                                      while($row=mysqli_fetch_array($prod_query)) :
                                                    ?>
                                                <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Quantity</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control pull-right" name="qty" value="<?php echo $row['qty'];?>" placeholder="Quantity" required>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <button class="btn btn-outline-success waves-effect waves-light btn-lg btn-block" id="daterange-btn" name="insert">
                                    Save
                                    </button>
                                    <button class="btn btn-lg btn-block" id="daterange-btn">
                                    Clear
                                    </button>
                                    <a class="btn btn-outline-info waves-effect waves-light btn-lg btn-block" href="stockin1.php"> View Stockin History</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="white-box">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Supplier</th>
                                            <th>Date Delivered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $branch = $_SESSION['branch'];
                                            $query = mysqli_query($con,"SELECT * FROM stockin NATURAL JOIN product NATURAL JOIN supplier WHERE branch_id = '$branch' ORDER BY date_delivered DESC")or die(mysqli_error());
                                            while($row = mysqli_fetch_array($query)) :
                                            ?>
                                        <tr>
                                            <td><?php echo $row['prod_name'];?></td>
                                            <td><?php echo $row['qty'];?></td>
                                            <td><?php echo $row['supplier_name'];?></td>
                                            <td><?php echo $row['date_delivered'];?></td>
                                        </tr>
                                        <?php endwhile; ?>                      
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Supplier</th>
                                            <th>Date Delivered</th>
                                        </tr>
                                    </tfoot>
                                </table>
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