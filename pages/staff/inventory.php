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
                            <h4 class="page-title">Inventory</h4>
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
                                <li class="active">Inventory</li>
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
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Supplier</th>
                                                <th>Qty Left</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Reorder</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($con, "SELECT * FROM product NATURAL JOIN supplier WHERE branch_id = '$branch' ORDER BY prod_name")or die(mysqli_error());
                                                $grand = 0;
                                                while($row = mysqli_fetch_array($query)) :
                                                    $total = $row['prod_price'] * $row['prod_qty'];
                                                    $grand += $total;
                                                ?>
                                            <tr>
                                                <td><?php echo $row['serial'];?></td>
                                                <td><?php echo $row['prod_name'];?></td>
                                                <td><?php echo $row['supplier_name'];?></td>
                                                <td><?php echo $row['prod_qty'];?></td>
                                                <td><?php echo $row['prod_price'];?></td>
                                                <td><?php echo number_format($total,2);?></td>
                                                <td>
                                                    <?php if ($row['prod_qty']<=$row['reorder'])
                                                        echo "<span class='badge badge-danger'><i class='glyphicon glyphicon-refresh'></i> &nbsp; Reorder</span>";
                                                        ?>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>                    
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2">₱  <?php echo number_format($grand,2);?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
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
                                                <th><h5>Prepared by: &nbsp; <?php echo $row['name'];?></h5></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <?php
                                                $queryb = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error());
                                                  $rowb = mysqli_fetch_array($queryb);              
                                                ?> 
                                            <tr>
                                                <th colspan="3">
                                                    <h5>Branch: &nbsp; <?php echo $rowb['branch_name']; ?></h5>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">
                                                    <h5>Address: &nbsp; <?php echo $rowb['branch_address']; ?></h5>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">
                                                    <h5>Contact #: &nbsp; <?php echo $rowb['branch_contact']; ?></h5>
                                                </th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
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
            include('components/validator.php'); 
            ?>
    </body>
</html>