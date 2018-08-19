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
            $branch = $_SESSION['branch']; // branch ID
            
            include('includes/style.php');
            ?>
    </head>
    <body>
        <div id="wrapper">
            <?php include('includes/navbar-top.php'); ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <!-- ========================================= -->
                        <!-- Page Title -->
                        <!-- ========================================= -->
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Stockin History</h4>
                        </h4>
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
                                <li class="active">Stockin History</li>
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
                                <!-- ========================================= -->
                                <!-- Date Range -->
                                <!-- ========================================= -->
                                <form method="post">
                                    <div class="form-group col-md-6">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control pull-right active" id="reservation" required>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="fcbtn btn btn-success btn-outline btn-1e" name="display">Display</button>
                                </form>
                            </div>
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
                                            if(isset($_POST['display'])) {
                                               $date   = $_POST['date'];
                                               $date   = explode('-',$date); 
                                               $start  = date("Y/m/d",strtotime($date[0]));
                                               $end    = date("Y/m/d",strtotime($date[1]));  
                                           
                                            $query = mysqli_query($con,"SELECT * FROM stockin NATURAL JOIN product NATURAL JOIN supplier WHERE branch_id = '$branch' AND date(date_delivered) >= '$start' AND date(date_delivered) <= '$end' ORDER BY date_delivered DESC")or die(mysqli_error($con));
                                            while($row = mysqli_fetch_array($query)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $row['prod_name'];?></td>
                                            <td><?php echo $row['qty'];?></td>
                                            <td><?php echo $row['supplier_name'];?></td>
                                            <td><?php echo $row['date_delivered'];?></td>
                                        </tr>
                                        <?php }} ?>                      
                                    </tbody>
                                    <!------------------------------------>
                                    <!--/.Company Details inside table footer-->
                                    <!------------------------------------>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <?php
                                                $query=mysqli_query($con,"SELECT * FROM user where user_id='$id'")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query);
                                                ?>
                                            <th>
                                                <h5>Prepared by:</h5>
                                            </th>
                                            <th><h5><?php echo $row['name'];?></h5></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                            $queryb = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error());
                                              $rowb = mysqli_fetch_array($queryb);              
                                            ?> 
                                        <tr>
                                            <th>
                                                <h5>Branch:</h5>
                                            </th>
                                            <th  colspan="3"><h5><?php echo $rowb['branch_name']; ?></h5></th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h5>Address:</h5>
                                            </th>
                                            <th  colspan="3"><h5><?php echo $rowb['branch_address']; ?></h5></th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h5>Contact #:</h5>
                                            </th>
                                            <th colspan="3"><h5><?php echo $rowb['branch_contact']; ?></h5></th>
                                        </tr>
                                    </tfoot>
                                    <!------------------------------------>
                                    <!--/.Company Details inside table footer-->
                                    <!------------------------------------>
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
            include('components/daterange.php'); // working under script.php. Conflict with preloader
            include('components/datatables.php'); 
            include('components/validator.php'); 
            ?>
    </body>
</html>