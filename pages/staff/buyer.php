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
                        <h4 class="page-title">Buyer</h4>
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
                            <li class="active">Buyer</li>
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
                            <button class="fcbtn btn btn-success btn-outline btn-1e" data-toggle="modal" data-target="#modal-buyer-insert">
                            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Add Supplier"></i> Add New Buyer</button>
                            <?php include('modal_buyer_insert.php'); ?>
                        </div>
                        <div class="white-box">
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Customer Last Name</th>
                                            <th>Customer First Name</th>
                                            <th>Address</th>
                                            <th>Contact #</th>
                                            <th>Credit Status</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Picture</th>
                                            <th>Status</th>
                                            <th>Customer Last Name</th>
                                            <th>Customer First Name</th>
                                            <th>Address</th>
                                            <th>Contact #</th>
                                            <th>Credit Status</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM customer WHERE branch_id = '$branch'")or die(mysqli_error());
                                            $i = 1;
                                            while($row = mysqli_fetch_array($query)) {
                                            $cid = $row['cust_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['cust_id'];?></td>
                                            <td><img style="width:80px;height:60px" src="../../assets/plugins/images/customer/<?php echo $row['prod_pic'];?>"></td>
                                            <td>
                                              <?php 
                                                if ($row['credit_status'] == "Approved") 
                                                  echo "<span class='label label-success'>Approved</span>";
                                                else
                                                  echo "<span class='label label-danger'>Pending</span>";
                                              ?>      
                                            </td>
                                            <td><?php echo $row['cust_last'];?></td>
                                            <td><?php echo $row['cust_first'];?></td>
                                            <td><?php echo $row['cust_address'];?></td>
                                            <td><?php echo $row['cust_contact'];?></td>
                                            <td>
                                              <?php 
                                                if ($row['balance'] == 0) 
                                                    echo "<span class='label label-danger'>Inactive</span>";
                                                else
                                                    echo "<span class='label label-info'>Active</span>";
                                                ?>      
                                            </td>
                                            <td><?php echo number_format($row['balance'],2);?></td>
                                            <td>
                                                <a href="#" data-target="#modal-buyer-update<?php echo $row['supplier_id'];?>" data-toggle="modal" style="color:#fff;" class="btn btn-outline-success waves-effect waves-light" onclick="return confirm('Update this data?')">
                                                    <i class="glyphicon glyphicon-edit text-blue" data-toggle="tooltip" data-placement="top" title="Update Buyer Details"></i>
                                                </a>
                                                  <?php include('modal_buyer_update.php'); ?>

                                                  <a href="cash_transaction.php?cid=<?php echo $cid; ?>" class="btn btn-outline-success waves-effect waves-light">
                                                    <i class="fa fa-mail-forward (alias) text-blue" data-toggle="tooltip" data-placement="top" title="Update Buyer Details"></i>
                                                  </a>


                                                  <a href="#" data-target="#" data-toggle="modal" style="color: red;" class="btn btn-outline-danger waves-effect waves-light" onclick="return confirm('Delete Button Under Development.')"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete Buyer Record"></i></a>
                                            </td>
                                            
                                        </tr>
                                        <?php $i++;}?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========================================= -->
                <!-- /.Work field -->
                <!-- ========================================= -->
               
            </div> <!-- /.container-fluid -->
            <?php include('includes/footer.php'); ?>
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
   <?php 
        include('includes/script.php');
        include('components/datatables.php'); 
        include('components/validator.php'); 
    ?>
</body>
</html>