<?php 
	session_start();  // must be the very first thing in your document. Before any HTML tags.

	//--------------------------
	// I have to study it again.
	//--------------------------

	$id = $_SESSION['id'];	
	include('../includes/dbcon.php');

	date_default_timezone_set("Asia/Manila"); 
	$date   = date("Y-m-d H:i:s");


	$cid    = $_REQUEST['cid'];
	$branch = $_SESSION['branch'];
	
	$total = $_POST['total'];
	$cid = $_REQUEST['cid'];

		
	mysqli_query($con,"INSERT INTO sales(cust_id, user_id, amount_due, total, date_added, branch_id, modeofpayment) 
	VALUES('$cid', '$id', '$amount_due', '$total', '$date', '$branch', 'credit')")or die(mysqli_error($con));
		
		$sales_id = mysqli_insert_id($con); // Return the id used in the last query
		$_SESSION['sid'] = $sales_id; // $_SESSION, meaning the data/sales_id can go to any pages of application 
	

	$query = mysqli_query($con,"SELECT * FROM temp_trans WHERE branch_id = '$branch'")or die(mysqli_error($con));
	while ($row=mysqli_fetch_array($query)) {
		$pid   = $row['prod_id'];	
		$qty   = $row['qty'];
		$price = $row['price'];
		
		mysqli_query($con,"INSERT INTO sales_details(prod_id, qty, price, sales_id) VALUES('$pid', '$qty', '$price', '$sales_id')")or die(mysqli_error($con));
		
		mysqli_query($con,"UPDATE product SET prod_qty = prod_qty - '$qty' WHERE prod_id = '$pid' AND branch_id = '$branch'")or die(mysqli_error($con)); 
	}
		
	mysqli_query($con,"UPDATE customer SET balance = balance + '$total' WHERE cust_id = '$cid'")or die(mysqli_error($con)); 
	echo "<script>document.location='../credit_information.php?cid=$cid'</script>";  	

	$result = mysqli_query($con,"DELETE FROM temp_trans WHERE branch_id = '$branch'")or die(mysqli_error($con));
?>