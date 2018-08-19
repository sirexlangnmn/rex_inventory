<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            
            if(empty($_SESSION['id'])):
            header('Location:../../index.php');
            endif;      
            
            if(empty($_SESSION['branch'])):  // This is branch ID
            header('Location:../../index.php');
            endif;
            
            include('includes/style.php');
            
            $branch = $_SESSION['branch'];  // This is branch ID
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
                                <li class="active">Credit Information</li>
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
                                <!-- Table list of added product/ Add to cart-->
                                <!-- ========================================= -->
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $cid = $_REQUEST['cid'];
                                                $sid = $_SESSION['sid'];
                                                $query = mysqli_query($con,"SELECT * FROM sales NATURAL JOIN sales_details NATURAL JOIN product WHERE sales_id = '$sid'")or die(mysqli_error());
                                                  $grand = 0;
                                                while($row = mysqli_fetch_array($query)) :
                                                      //$id=$row['temp_trans_id'];
                                                      $total= $row['qty']*$row['price'];
                                                      $grand=$grand+$total;
                                                ?>
                                            <tr>
                                                <td><?php echo $row['qty'];?></td>
                                                <td><?php echo $row['prod_name'];?></td>
                                                <td><?php echo number_format($row['price'],2);?></td>
                                                <td><?php echo number_format($total,2);?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <?php echo $sid; ?>
                                    <br />
                                    <br />
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <tbody>       
                                            <tr>
                                                <th class="pull-right">Sub total: &nbsp; <b class="text-danger"><?php echo number_format($grand,2);?></b></th>
                                            </tr>
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
                                <form data-toggle="validator" method="post" action="queries/terms_insert.php" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                $sid = $_SESSION['sid'];
                                                $query = mysqli_query($con,"SELECT * FROM term WHERE sales_id = '$sid'")or die(mysqli_error());
                                                
                                                  $row = mysqli_fetch_array($query);
                                                    $down  = $row['down'];
                                                    $span  = $row['term'];
                                                    $due   = $row['due'];
                                                    $date  = $row['payment_start'];
                                                ?>        
                                            <div class="form-group">
                                                <label>3% interest</label>
                                                <?php $interest = $grand * .03; ?>
                                                <input type="hidden" name="cid" value="<?php echo $cid;?>">
                                                <input type="text" style="text-align:right" class="form-control" name="interest" placeholder="Interest" 
                                                    value="<?php echo $interest; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="text" style="text-align:right" class="form-control" id="grandtotal" name="grandtotal" placeholder="Total" 
                                                    value="<?php echo $grand + $interest; ?>" readonly>
                                            </div>
                                            <!-- /.form group -->
                                            <div class="form-group">
                                                <label>Downpayment</label>
                                                <input type="text" class="form-control" name="down" placeholder="Downpayment" value="<?php $down = ($grand + $interest) * .2; echo $down;?>" data-error="Required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <!-- /.form group -->
                                            <div class="form-group">
                                                <label>Terms</label>
                                                <select class="form-control select2" name="terms" required>
                                                    <option>monthly</option>
                                                    <option>weekly</option>
                                                    <option>daily</option>
                                                </select>
                                            </div>
                                            <!-- /.form group -->
                                            <div class="form-group">
                                                <label>Payable for</label>
                                                <select class="form-control select2" name="span" required>
                                                    <option value="1">1 month</option>
                                                    <option value="2">2 months</option>
                                                    <option value="3">3 months</option>
                                                    <option value="4">4 months</option>
                                                    <option value="5">5 months</option>
                                                    <option value="6">6 months</option>
                                                </select>
                                            </div>
                                            <!-- /.form group --> 
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-success waves-effect waves-light btn-lg btn-block" type="submit" name="insert">
                                    Save
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
        <!-- /#wrapper -->
        <script>
            $("#cash").click(function() {
                $("#tendered").show('slow');
                $("#change").show('slow');
            });
        </script>
        <?php 
            include('includes/script.php');
            include('components/datatables.php'); 
            include('components/validator.php'); 
            ?>
    </body>
</html>