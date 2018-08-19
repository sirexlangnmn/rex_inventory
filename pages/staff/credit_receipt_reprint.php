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
            
            $branch = $_SESSION['branch'];  // branch_id
            $id = $_SESSION['id']; // user_id
            
            if(isset($_REQUEST['sid'])) { // sales_id
                        $sid=$_REQUEST['sid'];
                      }
                      else {
                        $sid=$_POST['sid'];
                      }
            
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
                                                    <td>Branch: &nbsp; <b><?php echo $rowb['branch_name'];?></b></td>
                                                    <td  colspan="2"></td>
                                                    <td>SALES INVOICE &nbsp;
                                                        <b style="font-size: 16px;color: red"> No. <?php echo $row1['or_no'];?></b>
                                                    </td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Address: &nbsp;
                                                        <b><?php echo $rowb['branch_address'];?></b>
                                                    </td>
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3">
                                                        Contact #: &nbsp;
                                                        <b><?php echo $rowb['branch_contact'];?></b>
                                                    </td>
                                                    <td>Date: &nbsp; 
                                                        <b><?php echo date("d M, Y");?></b>
                                                    </td>
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
                                                    <td>Customer's Name</td>
                                                    <td><b><?php echo $last.", ".$first;?></b></td>
                                                    <td>Term</td>
                                                    <td><b><?php echo $row['term'];?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Contact #</td>
                                                    <td><b><?php echo $contact;?></b></td>
                                                    <td>Payable for</td>
                                                    <td><b><?php echo $row['payable_for'];?> month/s</b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Complete Address</td>
                                                    <td><b><?php echo $address;?></b></td>
                                                    <td>Due Date</td>
                                                    <td><b><?php echo $row['due_date'];?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Co-Maker</td>
                                                    <td><b><?php echo $row['comaker'];?></b></td>
                                                    <td>Amount Due</td>
                                                    <td><b>₱ &nbsp; <?php echo number_format($row['due'],2);?></b></td>
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
                                            </tbody>
                                        </table>
                                        <h4 class="text-center">CUSTOMER’S UNDERTAKING AND RESPONSIBILITIES</h4>
                                        <p><b>1.)</b> Item delivered is understood to be in order and without defect if the customer has affixed his/ her signature below.</p>
                                        <p><b>2.)</b> To pay the monthly installment on time and in case of default, a 3% monthly penalty on present balance will be impose.</p>
                                        <p><b>3.)</b> Payments to the office or collectors should be receipted or documented by an AHIRA MARKETING official receipt. Payments with no receipts and unauthorized receipts will not be honored.</p>
                                        <p><b>4.)</b> Not to lend, hire, sell, or pledge the PRODUCT until the balance is fully paid.</p>
                                        <p><b>5.)</b> Not to remove/ transfer the product from the residence or place agreed upon without the consent of AHIRA MARKETING.</p>
                                        <p><b>6.)</b> Failure to pay two (2) or more monthly installments, the unit/ product will be voluntarily deposited, and the customer shall allow AHIRA MARKETING REPRESENTATIVE to enter the premises and pull out the unit/ product.</p>
                                        <p><b>7.)</b> In cases of legal matters, all legal expenses (filling fees, attorney’s fees, ETC.) pertaining to legal problems will be shouldered by the customer.</p>
                                        <p><b>8.)</b> Strictly NO REFUNDS of whatever payments made if the unit/ product will be repossessed.</p>
                                        <p>I acknowledge and fully understood and read the contents of this undertaking listed above from numbers 1 to 8. And below I affix my signature for conformity and acceptance of my obligation.</p>
                                        <table class="table">
                                            <tr style="border: solid 1px #fff">
                                                <td>Prepared by:</td>
                                                <td></td>
                                                <td></td>
                                                <td>________________________________</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                                $query = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id'")or die(mysqli_error($con));
                                                $row = mysqli_fetch_array($query);
                                                ?>                      
                                            <tr style="border: solid 1px #fff">
                                                <td><b><?php echo $row['name'];?></b></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>Customer's signature over printed name</b></td>
                                                <td></td>
                                            </tr>
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
                    <a class="fcbtn btn btn-success btn-outline btn-1e" href="creditor.php"><i class="glyphicon glyphicon-arrow-left"></i> Back to Creditors Page</a>
                </div>
            </div>
        </div>
        <?php  
            include('includes/script.php');
            ?>
    </body>
</html>