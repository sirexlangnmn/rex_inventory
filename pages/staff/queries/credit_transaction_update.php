<?php 
	session_start();
	
	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');
	
	$id  = $_POST['id']; 	//transaction ID
	$qty = $_POST['qty'];
	$cid = $_POST['cid'];	// customer ID
	
	// update temporary transaction
	mysqli_query($con,"UPDATE temp_trans SET qty = '$qty' WHERE temp_trans_id = '$id'")or die(mysqli_error());

	echo "<script>document.location='../credit_transaction.php?cid=$cid'</script>";  


/*
	$query = mysqli_query($con, "SELECT credit_status FROM customer WHERE cust_id = '$cid'")or die(mysqli_error($con));
	$row = mysqli_fetch_array($query) ;
	$credit_status = $row['credit_status'];



	// if the credit status is approved, proceed to credit_transaction.php 
	// if not, proceed to cash_transaction.php 
	if ($credit_status = "Approved"){
		// back to the credit_transaction.php page together with the customer ID to resume the transaction
		echo "<script>document.location='../credit_transaction.php?cid=$cid'</script>";  
	}
	else {
		// back to the cash_transaction.php page together with the customer ID to resume the transaction
		echo "<script>document.location='../cash_transaction.php?cid=$cid'</script>";  		
	}
*/

?>
