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
            
            $branch = $_SESSION['branch'];
            
                      if(isset($_REQUEST['cid'])) {
                        $cid=$_REQUEST['cid'];
                      }
                      else {
                        $cid=$_POST['cid'];
                      }
                    
            
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
                            <h4 class="page-title">Account Summary / Cash History</h4>
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
                                <li class="active">Account Summary / Cash History</li>
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
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="card">
                                        <?php
                                            $query=mysqli_query($con,"SELECT * FROM customer WHERE cust_id = '$cid'")or die(mysqli_error());
                                              $row = mysqli_fetch_array($query);
                                            ?>
                                        <img class="card-img-top img-responsive" src="../../assets/plugins/images/customer/<?php echo $row['cust_pic'];?>" alt="Customer Image">
                                        <div class="card-block">
                                            <b>Fullname</b><br />
                                            <h4 class="card-title">
                                                <?php echo $row['cust_last'].", ".$row['cust_first'];?>
                                            </h4>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <b>Address</b><br />
                                                <?php echo $row['cust_address'];?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Contact</b><br />
                                                <?php echo $row['cust_contact'];?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Balance</b><br />
                                                <h3 class="text-danger text-center">
                                                    <?php echo number_format($row['balance'],2);?>
                                                </h3>
                                            </li>
                                        </ul>
                                        <div class="card-block">
                                            <a href="<?php if ($row['balance']<=0) echo "credit_transaction.php?cid=$cid";?>" class="fcbtn btn btn-success btn-outline btn-block btn-1e">
                                            <i class="fa  fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="Add Order"></i> Add New Order</a>
                                            <a href="account_summary.php?cid=<?php echo $row['cust_id'];?>" class="fcbtn btn btn-success btn-outline btn-block btn-1e">Credit History</a>
                                            <a href="account_summary1.php?cid=<?php echo $row['cust_id'];?>" class="fcbtn btn btn-success btn-outline btn-block btn-1e">Cash History</a>
                                            <a href="account_summary2.php?cid=<?php echo $row['cust_id'];?>" class="fcbtn btn btn-success btn-outline btn-block btn-1e">Payment History</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Transaction #</th>
                                                <th>Product</th>
                                                <th>Product Code</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                                <th>Reprint</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query1 = mysqli_query($con,"SELECT * FROM sales NATURAL JOIN sales_details NATURAL JOIN product WHERE cust_id = '$cid' AND modeofpayment = 'cash' ORDER BY date_added DESC")or die(mysqli_error($con));
                                                while($row1 = mysqli_fetch_array($query1)) :
                                                ?>
                                            <tr>
                                                <td><?php echo $row1['sales_id'];?></td>
                                                <td><?php echo $row1['prod_name'];?></td>
                                                <td><?php echo $row1['serial'];?> month/s</td>
                                                <td><?php echo $row1['prod_price'];?></td>
                                                <td><?php echo $row1['qty'];?></td>
                                                <td><?php echo number_format($row1['total'],2);?></td>
                                                <td><?php echo date("d M, Y",strtotime($row1['date_added']));?></td>
                                                <td><a href="reprint_cash.php?sid=<?php echo $row1['sales_id'];?>"><i class="glyphicon glyphicon-print"></i></a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>       
                                        </tbody>
                                    </table>
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