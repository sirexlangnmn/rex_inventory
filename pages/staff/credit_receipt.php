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
            $sid = $_SESSION['sid']; // sales_id = it start from credit_insert.php
            
            include('includes/style.php');
            //--------------------------------------------------------------
            // I have to study this page to understand better how it works
            //--------------------------------------------------------------
            ?>
    <body>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="container">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <form method="post" action="">
                                        <?php
                                            $id     = $_SESSION['id'];
                                            $branch = $_SESSION['branch'];
                                                $queryb = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error());
                                              
                                                    $rowb = mysqli_fetch_array($queryb);
                                                    
                                            ?>          
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM sales NATURAL JOIN customer NATURAL JOIN term WHERE branch_id = '$branch' AND sales_id = '$sid'")or die(mysqli_error($con));
                                                $row = mysqli_fetch_array($query);
                                            
                                                $last     = $row['cust_last'];
                                                $first    = $row['cust_first'];
                                                $address  = $row['cust_address'];
                                                $contact  = $row['cust_contact'];
                                                $down     = $row['down'];
                                                $interest = $row['interest'];
                                                $user_id  = $row['user_id'];
                                                
                                                $query1 = mysqli_query($con,"SELECT * FROM payment WHERE sales_id = '$sid' ORDER BY payment_id DESC LIMIT 0,1")or die(mysqli_error($con));                
                                                    $row1 = mysqli_fetch_array($query1);   
                                            
                                            
                                            ?>   
                                        <!------------------------------------>    
                                        <!--Company Details-->
                                        <!------------------------------------>
                                        <table class="table">
                                            <thead>
                                                <tr style="border: solid 1px #fff">
                                                    <th colspan="3">
                                                        <h5><b><?php echo $rowb['branch_name'];?></b></h5>
                                                    </th>
                                                    <th><b><u>SALES INVOICE</u></b></th>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th colspan="3">
                                                        <p><?php echo $rowb['branch_address'];?></p>
                                                    </th>
                                                    <th><span style="font-size: 16px;color: red">No. <?php echo $row1['or_no'];?></span></th>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th colspan="3">
                                                        <p>Contact #: <?php echo $rowb['branch_contact'];?></p>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!------------------------------------>
                                        <!--/.Company Details-->
                                        <!------------------------------------>
                                        <br />
                                        <!------------------------------------>
                                        <!--Creditors Details-->
                                        <!------------------------------------>
                                        <table class="table">
                                            <thead>
                                                <tr style="border: solid 1px #fff">
                                                    <th>Customer's Name</th>
                                                    <th><?php echo $last.", ".$first;?></th>
                                                    <th>Term</th>
                                                    <th><?php echo $row['term'];?> </th>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th>Contact #</th>
                                                    <th><?php echo $contact;?></th>
                                                    <th>Payable for</th>
                                                    <th><?php echo $row['payable_for'];?> month/s</th>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th>Complete Address</th>
                                                    <th><?php echo $address;?></th>
                                                    <th>Due Date</th>
                                                    <th><?php echo $row['due_date'];?></th>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th>Co-Maker</th>
                                                    <th><?php echo $row['comaker'];?></th>
                                                    <th>Amount Due</th>
                                                    <th>P<?php echo number_format($row['due'],2);?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!------------------------------------>
                                        <!--Creditors Details-->
                                        <!------------------------------------>
                                        <br /> 
                                        <!------------------------------------>
                                        <!--Product Details-->
                                        <!------------------------------------>
                                        <table class="table">
                                            <thead>
                                                <tr style="border: solid 1px #fff">
                                                    <th>QTY</th>
                                                    <th>UNIT</th>
                                                    <th>ARTICLES</th>
                                                    <th>Unit Price</th>
                                                    <th class="text-right">AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query1 = mysqli_query($con,"SELECT * FROM sales NATURAL JOIN sales_details NATURAL JOIN product WHERE sales_id = '$sid'")or die(mysqli_error());
                                                        $grand = 0;
                                                      while($row1 = mysqli_fetch_array($query1)) :
                                                            $code = $row1['serial'];
                                                            $total = $row1['qty'] * $row1['price'];
                                                            $grand = $grand + $total;
                                                        $due = $row1['amount_due'];   
                                                    ?>
                                                <tr style="border: solid 1px #fff">
                                                    <td><?php echo $row1['qty'];?></td>
                                                    <td>pc/s</td>
                                                    <td class="record"><?php echo $row1['prod_name'];?></td>
                                                    <td><?php echo number_format($row1['price'],2);?></td>
                                                    <td style="text-align:right"><?php echo number_format($total,2);?></td>
                                                </tr>
                                                <?php endwhile; ?>      
                                                <tr style="border: solid 1px #fff">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">TOTAL AMOUNT DUE</td>
                                                    <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">Interest</td>
                                                    <td style="text-align:right"><?php echo number_format($interest,2);?></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">Downpayment</td>
                                                    <td style="text-align:right"><?php echo number_format($row['down'],2);?></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>Remaining Balance</b></td>
                                                    <td style="text-align:right"><b><?php 
                                                        $total = $grand + $interest-$row['down'];
                                                        echo number_format($total,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <th>Prepared by:</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>_________________________</th>
                                                    <th></th>
                                                </tr>
                                                <?php
                                                    $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error($con));
                                                    $row=mysqli_fetch_array($query);
                                                    
                                                    ?>                      
                                                <tr style="border: solid 1px #fff">
                                                    <th><?php echo $row['name'];?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Customer's Signature</th>
                                                    <th></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!------------------------------------>
                                        <!--/.Products Details-->
                                        <!------------------------------------>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                    <a class="btn btn-primary btn-print" href="creditor.php"><i class="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
                </div>
            </div>
        </div>
        <?php  
            include('includes/script.php');
            ?>
    </body>
</html>