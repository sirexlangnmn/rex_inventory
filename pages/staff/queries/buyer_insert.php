<?php 
	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if(isset($_POST['insert'])) {
		$branch  = $_SESSION['branch'];
		$last    = $_POST['last'];
		$first   = $_POST['first'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

		// ========================================= 
	    // Date variable declaration
	    // ========================================= 
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");
		
		$customer_query = mysqli_query($con,"SELECT * FROM customer WHERE cust_last = '$last' AND cust_first = '$first' AND branch_id = '$branch'")or die(mysqli_error($con));
		$count = mysqli_num_rows($customer_query);

			if ($count > 0) {
				echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
				echo "<script>document.location='../buyer.php'</script>";  
			}
			else {			
				mysqli_query($con,"INSERT INTO customer(cust_last, cust_first, cust_address, cust_contact, branch_id, balance, cust_pic)VALUES('$last', '$first', '$address', '$contact', '$branch', '0', 'default.gif')")or die(mysqli_error($con));

				echo "<script type='text/javascript'>alert('New Supplier Added!');</script>";
				echo "<script>document.location='../buyer.php'</script>";  


				$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
				$remarks = "added new buyer " . $last . " " . $firt . ".";  
					
				// ========================================= 
		    	// Insert the data to Log history
		    	// ========================================= 
				mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));

			}
	}
?>