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
            
            $id     = $_SESSION['id'];
            $branch = $_SESSION['branch'];
            
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
                            <h4 class="page-title">Receivables</h4>
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
                                <li class="active">Receivables</li>
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
                            <a class="fcbtn btn btn-success btn-outline btn-1e" href="dashboard.php">
                            <i class ="glyphicon glyphicon-arrow-left"></i> Back to Dashboard</a>
                            </div>
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Account #</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($con,"SELECT * FROM customer NATURAL JOIN sales NATURAL JOIN sales_details NATURAL JOIN term NATURAL JOIN product WHERE balance <> 0 and branch_id = '$branch' AND status <> 'paid' ORDER BY cust_last DESC")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)) :
                                                ?>
                                            <tr>
                                                <td><?php echo $row['term_id'];?></td>
                                                <td><?php echo $row['cust_last'].", ".$row['cust_first'];?></td>
                                                <td><?php echo $row['prod_name'];?></td>
                                                <td><?php echo $row['serial'];?></td>
                                                <td><?php echo number_format($row['balance'],2);?></td>
                                            </tr>
                                            <?php endwhile; ?>        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php 
                                                    $querytotal = mysqli_query($con,"SELECT SUM(balance) AS total FROM customer WHERE branch_id = '$branch'")or die(mysqli_error());
                                                    $row = mysqli_fetch_array($querytotal);
                                                    
                                                    ?>
                                                <th colspan="4">Total</th>
                                                <th colspan="1">₱  <?php echo number_format($row['total'],2);?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="5"></th>
                                            </tr>
                                            <tr>
                                                <?php
                                                    $query=mysqli_query($con,"SELECT * FROM user where user_id='$id'")or die(mysqli_error($con));
                                                    $row=mysqli_fetch_array($query);
                                                    ?>
                                                <th>
                                                    <h5>Prepared by: </h5>
                                                </th>
                                                <th>
                                                    <h5><?php echo $row['name'];?></h5>
                                                </th>
                                                <th colspan="3"></th>
                                            </tr>
                                            <?php
                                                $queryb = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error());
                                                  $rowb = mysqli_fetch_array($queryb);              
                                                ?> 
                                            <tr>
                                                <th>
                                                    <h5>Branch: </h5>
                                                </th>
                                                <th>
                                                    <h5><?php echo $rowb['branch_name']; ?></h5>
                                                </th>
                                                <th colspan="4"></th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h5>Address:</h5>
                                                </th>
                                                <th>
                                                    <h5><?php echo $rowb['branch_address']; ?></h5>
                                                </th>
                                                <th colspan="4"></th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <h5>Contact #:</h5>
                                                </th>
                                                <th>
                                                    <h5><?php echo $rowb['branch_contact']; ?></h5>
                                                </th>
                                                <th colspan="4"></th>
                                            </tr>
                                        </tfoot>
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
            ?>
    </body>
</html>