<?php 
	session_start();

	$id     = $_SESSION['id'];
	$branch = $_SESSION['branch'];	

	include('../includes/dbcon.php');

	$cid  = $_POST['cid'];
	$name = $_POST['prod_name'];
	$qty  = $_POST['qty'];

		// query to get product price because we have to multiply it to the desired quantity of user	
		$query = mysqli_query($con,"SELECT prod_price, prod_id FROM product WHERE prod_id = '$name'")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
			$price = $row['prod_price'];
			
			$total = $price * $qty; // price product * to desired quantity of customer

		

		// to check. If there's existing temporary transaction, it needs to update. If none, insert new data.
		$query1 = mysqli_query($con,"SELECT * FROM temp_trans WHERE prod_id = '$name' AND branch_id = '$branch'")or die(mysqli_error());
		$count = mysqli_num_rows($query1);

		if ($count > 0) {
			mysqli_query($con,"UPDATE temp_trans SET qty = qty + '$qty', price = price + '$total' WHERE prod_id = '$name' AND branch_id = '$branch'")or die(mysqli_error());	
		}
		else {
			mysqli_query($con,"INSERT INTO temp_trans(prod_id, qty, price, branch_id)VALUES('$name', '$qty', '$price', '$branch')")or die(mysqli_error($con));
		}
		
		echo "<script>document.location='../credit_transaction.php?cid=$cid'</script>";  	


/*
		// if the credit status is approved, proceed to credit_transaction.php 
		// if not, proceed to cash_transaction.php 
		$query = mysqli_query($con, "SELECT credit_status FROM customer WHERE cust_id = '$cid'")or die(mysqli_error($con));
		$row = mysqli_fetch_array($query) ;
		$credit_status = $row['credit_status'];


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