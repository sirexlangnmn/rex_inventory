<?php 
	session_start();

	$id = $_SESSION['id'];  // ID of current User. Come's from session.

	include('../includes/dbcon.php');

	if(isset($_POST['insert'])) {
		$cid    = $_POST['cid'];		// customer ID
		$branch = $_SESSION['branch'];  // this is branch ID

		$discount   = $_POST['discount'];
		$amount_due = $_POST['amount_due'];
		$tendered   = $_POST['tendered'];
		$change     = $_POST['change'];
		
		$total = $amount_due - $discount;

	    // Date variable declaration
		date_default_timezone_set("Asia/Manila"); 
		$date   = date("Y-m-d H:i:s");


		mysqli_query($con,"INSERT INTO sales(cust_id, user_id, discount, amount_due, total, date_added, modeofpayment, cash_tendered, cash_change, branch_id)VALUES('$cid', '$id', '$discount', '$amount_due', '$total', '$date', 'Cash', '$tendered', '$change', '$branch')")or die(mysqli_error($con));
		
		$sales_id = mysqli_insert_id($con);
		$_SESSION['sid'] = $sales_id;
	
			$query = mysqli_query($con,"SELECT * FROM temp_trans WHERE branch_id = '$branch'")or die(mysqli_error($con));
			while ($row = mysqli_fetch_array($query)) {
				$pid  = $row['prod_id'];	
	 			$qty  = $row['qty'];
				$price= $row['price'];
				
				// To recorde sales details
				mysqli_query($con,"INSERT INTO sales_details(prod_id, qty, price, sales_id)VALUES('$pid', '$qty', '$price', '$sales_id')")or die(mysqli_error($con));


				// To update the product quantity. Because the item was sold
				mysqli_query($con,"UPDATE product SET prod_qty = prod_qty - '$qty' WHERE prod_id = '$pid' AND branch_id = '$branch'") or die(mysqli_error($con)); 
			}
		


		$query1 = mysqli_query($con,"SELECT or_no FROM payment NATURAL JOIN sales WHERE modeofpayment = 'Cash' ORDER BY payment_id DESC LIMIT 0,1")or die(mysqli_error($con));

				$row1 = mysqli_fetch_array($query1);
					$or = $row1['or_no'];	
						if ($or == 0) {
							$or = 1901;
						}
						else {
							$or = $or + 1;
						}

		mysqli_query($con,"INSERT INTO payment(cust_id, user_id, payment, payment_date, branch_id, payment_for, due, status, sales_id, or_no)VALUES('$cid', '$id', '$total', '$date', '$branch', '$date', '$total', 'Paid', '$sales_id', '$or')")or die(mysqli_error($con));
			echo "<script>document.location='../receipt.php?cid=$cid'</script>";  	
	
	
		// Once transaction was competed, temporary transaction must delete.
		$result = mysqli_query($con,"DELETE FROM temp_trans WHERE branch_id='$branch'")or die(mysqli_error($con));
		echo "<script>document.location='../receipt.php?cid=$cid'</script>";  


	
		$remarks = "sales " . $total . ".";  

    	// Insert the data to Log history
		mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));	
		}
	
?>