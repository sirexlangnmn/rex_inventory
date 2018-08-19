<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            
            if(empty($_SESSION['id'])):
            header('Location:../../index.php');
            endif;      
            
            if(empty($_SESSION['branch'])):  // branch ID
            header('Location:../../index.php');
            endif;
            
            include('includes/style.php');
            
            $branch = $_SESSION['branch'];  // branch ID
            $cid    = $_REQUEST['cid'];
            
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
                        <?php
                            $query_name = mysqli_query($con,"SELECT * FROM customer WHERE cust_id = '$cid' AND  branch_id = '$branch'")or die(mysqli_error());
                              $row_name = mysqli_fetch_array($query_name);
                            ?>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title text-danger"><?php echo $row_name['cust_last'].", ".$row_name['cust_first'];?></h4>
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
                                <li class="active">Credit Transaction</li>
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
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <!-- ========================================= -->
                                <!-- Form for getting product/ Add to cart-->
                                <!-- ========================================= -->
                                <form data-toggle="validator" class="form-horizontal" method="post" action="queries/credit_transaction_insert.php" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Product List</label>
                                                <select class="form-control" name="prod_name" autofocus required>
                                                    <?php
                                                        $query2 = mysqli_query($con,"SELECT * FROM product WHERE branch_id = '$branch' ORDER BY prod_name")or die(mysqli_error());
                                                            while($row=mysqli_fetch_array($query2)) :
                                                        ?>
                                                    <option value="<?php echo $row['prod_id'];?>">
                                                        <?php echo $row['prod_name']." Available (".$row['prod_qty'].")";?>
                                                    </option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                                <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label">Quantity</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control pull-right" name="qty" placeholder="Quantity" required>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label"></label>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-success waves-effect waves-light" type="submit" name="addtocart" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                </form>
                                <!-- ========================================= -->
                                <!-- /.Form for getting product/ Add to cart-->
                                <!-- ========================================= -->
                                <!-- ========================================= -->
                                <!-- Table list of added product/ Add to cart-->
                                <!-- ========================================= -->
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <?php 
                                            $queryb = mysqli_query($con,"SELECT balance FROM customer WHERE cust_id = '$cid'")or die(mysqli_error());
                                            $rowb = mysqli_fetch_array($queryb);
                                            $balance = $rowb['balance'];
                                            
                                            if ($balance > 0) // I am not sure kung para saan ito
                                             $disabled = "disabled=true";  // I will analyze this later.
                                            else {
                                              $disabled = "";
                                            }
                                            ?>
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($con,"SELECT * FROM temp_trans NATURAL JOIN product WHERE branch_id = '$branch'")or die(mysqli_error());
                                                    $grand = 0;
                                                    while($row = mysqli_fetch_array($query)) :
                                                        $id    = $row['temp_trans_id'];
                                                        $total = $row['qty'] * $row['price'];
                                                        $grand = $grand + $total;
                                                
                                                ?>
                                            <tr>
                                                <td><?php echo $row['qty'];?></td>
                                                <td class="record"><?php echo $row['prod_name'];?></td>
                                                <td><?php echo number_format($row['price'],2);?></td>
                                                <td><?php echo number_format($total,2);?></td>
                                                <td>
                                                    <a href="#modal-qty1-update<?php echo $row['temp_trans_id'];?>" data-target="#modal-qty1-update<?php echo $row['temp_trans_id'];?>" data-toggle="modal" class="btn btn-outline-success waves-effect waves-light" onclick="return confirm('Update Quantity?')"><i class="glyphicon glyphicon-edit text-success" data-toggle="tooltip" data-placement="top" title="Update Quantity"></i></a>
                                                    <?php include('modal_qty1_update.php'); ?>

                                                    <a href="#modal-trans1-delete<?php echo $row['temp_trans_id'];?>" data-target="#modal-trans1-delete<?php echo $row['temp_trans_id'];?>" data-toggle="modal"class="btn btn-outline-danger waves-effect waves-light" onclick="return confirm('Remove to cart?')"><i class="glyphicon glyphicon-trash text-danger" data-toggle="tooltip" data-placement="top" title="Remove to cart."></i></a>
                                                    <?php include('modal_transaction1_delete.php'); ?>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>      
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ========================================= -->
                                <!-- /.Table list of added product/ Add to cart-->
                                <!-- ========================================= -->
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <!-- ========================================= -->
                                <!-- Form for payment-->
                                <!-- ========================================= -->
                                <form method="post" action="queries/credit_insert.php" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control text-right" name="cid" value="<?php echo $cid;?>">
                                                <label for="date">Total</label>
                                                <input type="text" style="text-align:right" class="form-control" name="total" placeholder="Total" value="<?php echo number_format($grand,2);?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-success waves-effect waves-light btn-lg btn-block" type="submit">
                                    Save
                                    </button>
                                    <button class="btn btn-lg btn-block" type="reset">
                                    <a href="queries/cancel.php">Cancel Sale</a>
                                    </button>
                                </form>
                                <!-- ========================================= -->
                                <!-- /.Form for payment-->
                                <!-- ========================================= -->
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

        <?php 
            include('includes/script.php');
            include('components/datatables.php'); 
            include('components/validator.php'); 
            ?>
    </body>
</html>