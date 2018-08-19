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
                                            $queryb = mysqli_query($con,"SELECT * FROM branch WHERE branch_id = '$branch'")or die(mysqli_error());
                                            
                                                $rowb = mysqli_fetch_array($queryb);
                                                
                                            ?>          
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM sales NATURAL JOIN customer WHERE branch_id = '$branch' ORDER BY sales_id DESC LIMIT 0,1")or die(mysqli_error($con));
                                                $row = mysqli_fetch_array($query);
                                               
                                                $sales_id   = $row['sales_id'];
                                                $last       = $row['cust_last'];
                                                $first      = $row['cust_first'];
                                                $address    = $row['cust_address'];
                                                $contact    = $row['cust_contact'];
                                                $sid        = $row['sales_id'];
                                                $due        = $row['amount_due'];
                                                $discount   = $row['discount'];
                                                $grandtotal = $due - $discount;
                                                $tendered   = $row['cash_tendered'];
                                                $change     = $row['cash_change'];
                                            
                                                $query1 = mysqli_query($con,"SELECT * FROM payment WHERE sales_id = '$sales_id'")or die(mysqli_error($con));
                                                $row1 = mysqli_fetch_array($query1);
                                            
                                            ?>   
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
                                                    <td></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="4"></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Sold to: &nbsp;
                                                        <b><?php echo $last.", ".$first;?></b>
                                                    </td>
                                                    <td></td>
                                                    <td>Date: &nbsp;
                                                        <b><?php echo date("M d, Y");?> Time <?php echo date("h:i A");?></b>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Address: &nbsp;
                                                        <b><?php echo $address;?></b>
                                                    </td>
                                                    <td></td>
                                                    <td>TIN: &nbsp;
                                                        ________________________
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Business Style: &nbsp; ________________________</td>
                                                    <td></td>
                                                    <td>Terms: &nbsp; ________________________</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                        </table>
                                        <br /> 
                                        <br /> 
                                        <table class="table">
                                            <thead>
                                                <tr style="border: solid 1px #fff">
                                                    <th>QTY</th>
                                                    <th>UNIT</th>
                                                    <th>ARTICLES</th>
                                                    <th>Unit Price</th>
                                                    <th>AMOUNT</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = mysqli_query($con,"SELECT * FROM sales_details NATURAL JOIN product WHERE sales_id = '$sid'")or die(mysqli_error($con));
                                                        $grand = 0;
                                                    while($row = mysqli_fetch_array($query)) :
                                                            $total = $row['qty'] * $row['price'];
                                                            $grand = $grand + $total;
                                                    
                                                    ?>
                                                <tr style="border: solid 1px #fff">
                                                    <td><?php echo $row['qty'];?></td>
                                                    <td>pc/s</td>
                                                    <td><b><?php echo $row['prod_name'];?></b></td>
                                                    <td><?php echo number_format($row['price'],2);?></td>
                                                    <td><?php echo number_format($total,2);?></td>
                                                </tr>
                                                <?php endwhile; ?>  
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="5"></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3"></td>
                                                    <td class="text-right">Subtotal</td>
                                                    <td><b><?php echo number_format($grand,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3"></td>
                                                    <td class="text-right">Discount</td>
                                                    <td><b><?php echo number_format($discount,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3"></td>
                                                    <td class="text-right">TOTAL AMOUNT DUE</td>
                                                    <td><b><?php echo number_format($grand-$discount,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3"></td>
                                                    <td class="text-right">Cash Tendered</td>
                                                    <td><b><?php echo number_format($tendered,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td colspan="3"></td>
                                                    <td class="text-right">Change</td>
                                                    <td><b><?php echo number_format($change,2);?></b></td>
                                                </tr>
                                                <tr style="border: solid 1px #fff">
                                                    <td>Prepared by:</td>
                                                    <td colspan="2"></td>
                                                    <td>________________________________</td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                                    $query=mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id'")or die(mysqli_error($con));
                                                    $row=mysqli_fetch_array($query);
                                                    
                                                    ?>                      
                                                <tr style="border: solid 1px #fff">
                                                    <td><b><?php echo $row['name'];?></b></td>
                                                    <td colspan="2"></td>
                                                    <td><b>Customer's signature over printed name</b></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                    <a class="btn btn-primary btn-print" href="buyer.php"><i class="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
                </div>
            </div>
        </div>
        <?php  
            include('includes/script.php');
            ?>
    </body>
</html>