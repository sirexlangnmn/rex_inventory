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
            
            $sid = $_REQUEST['sid']; // sales_id            
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
                            <h4 class="page-title">Account Summary / Credit History</h4>
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
                                <li class="active">Account Summary / Credit History</li>
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
                          <th>Due Date</th>
                          <th>Amount</th>
                          <th>Interest</th>
                          <th>Remaining</th>
                          <th>Date of Payment</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query1 = mysqli_query($con,"SELECT * FROM payment WHERE sales_id = '$sid' ORDER BY payment_for")or die(mysqli_error($con));
                              while($row1 = mysqli_fetch_array($query1)):
                                $payment_date = date("d M, Y",strtotime($row1['payment_date']));
                          ?>
                      <tr>
                        <td><?php echo date("M d, Y",strtotime($row1['payment_for']));?></td>
                       <td><?php echo number_format($row1['due'],2);?></td>
                        <td><?php echo number_format($row1['interest'],2); ?></td>
                        <td><?php echo number_format($row1['due']-$row1['payment'],2); ?></td>
                        <td><?php echo $payment_date;?></td>
                        <td>
                          <?php 
                            if ($row1['status']=='paid') 
                                echo "<span class='badge badge-success'>paid</span>";
                            elseif($row1['status'] == 'partially paid') {
                                echo "<span class='badge badge-danger'>partially paid</span>"; 
                            } 
                            else
                              echo "<span class='badge bg-red'>unpaid</span>";
                          ?>
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