<?php
    //session_start();
    if(empty($_SESSION['id'])):
    header('Location:../../../index.php');
    endif;
    
    date_default_timezone_set("Asia/Manila"); 
  
    $branch = $_SESSION['branch'];
    $branch_query = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error($con));
    $branch_row = mysqli_fetch_array($branch_query);
    $branch_name = $branch_row['branch_name'];
    ?>
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">
                <b style="color: red;"><?php echo $branch_name;?></b>
                </a>
            </li>
            <li>
                <a href="dashboard.php" class="waves-effect">
                <i class="fa fa-dashboard (alias) text-success"></i> 
                <span class="hide-menu"> Dashboard
                <span class="fa arrow"></span></span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect"><i class="fa fa-users text-success"></i> <span class="hide-menu"> Client <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="buyer.php"> Buyer </a></li>
                    <li><a href="creditor.php"> Creditor </a></li>
                </ul>
            </li>
            <li>
                <a href="index.html" class="waves-effect"><i class="fa fa-spin fa-gear text-success"></i> <span class="hide-menu"> Maintenance <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="category.php"> Category </a></li>
                    <li><a href="product.php"> Product </a></li>
                    <li><a href="supplier.php"> Supplier </a></li>
                </ul>
            </li>
            <li>
                <a href="stockin.php" class="waves-effect">
                <i class="fa fa-cubes text-success"></i> 
                <span class="hide-menu"> Stockin 
                <span class="fa arrow"></span></span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                <i class="fa fa-spin fa-refresh  text-success"></i>
                <span class="hide-menu"> Reorder 
                <span class="label label-danger">
                <?php 
                    $query = mysqli_query($con, "SELECT COUNT(*) AS count FROM product WHERE prod_qty <= reorder AND branch_id = '$branch'")or die(mysqli_error());
                    $row = mysqli_fetch_array($query);
                    echo $row['count'];
                    ?>  
                </span>
                <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li> &nbsp; <?php echo $row['count']; ?> products that needs reorder</li>
                    <li><a href="reorder.php">
                        <?php
                            $queryprod = mysqli_query($con,"SELECT prod_name FROM product WHERE prod_qty <= reorder AND branch_id = '$branch'")or die(mysqli_error());
                            while($rowprod=mysqli_fetch_array($queryprod)) :
                            ?>
                        <i class="glyphicon glyphicon-refresh text-danger">&nbsp;</i><?php echo $rowprod['prod_name'];?>
                         <?php endwhile; ?>
                        </a>
                    </li>
                    <li class="footer text-center"><a href="inventory.php">View all</a></li>
                </ul>
            </li>
            <li>
                <a href="requested_purchase.php" class="waves-effect">
                <i class="fa fa-arrows-alt text-success"></i> 
                <span class="hide-menu"> Purchase Request
                <span class="fa arrow"></span></span>
                </a>
            </li>
            <li>
                <a href="index.html" class="waves-effect">
                <i class="fa fa-bar-chart-o text-success"></i>
                <span class="hide-menu"> Report
                <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="inventory.php"> Inventory </a></li>
                    <li><a href="requested_purchase1.php">Purhcase Request History</a></li>
                    <li><a href="stockin1.php">Stockin History</a></li>
                    <li><a href="sales.php"> Sales </a></li>
                    <li><a href="receivables.php"> Account Receivables </a></li>
                    <li><a href="branch_income.php"> Branch Income </a></li>
                </ul>
            </li>
            <li>
                <a href="log.php" class="waves-effect">
                <i class="fa fa-list text-success"></i> 
                <span class="hide-menu"> Log History
                <span class="fa arrow"></span></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->