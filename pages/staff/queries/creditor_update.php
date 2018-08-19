<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../includes/dbcon.php');

if (isset($_POST['update'])) {
	$cid       = $_POST['cid'];
	$ci       = $_POST['ci'];
	$payslip  = $_POST['payslip'];
	$valid_id = $_POST['valid_id'];
	$cert     = $_POST['cert'];
	$cedula   = $_POST['cedula'];
	$income   = $_POST['income'];
	$name     = $_POST['name'];
	$date     = $_POST['date'];

		// ========================================= 
	    // If empty, system notify.
	    // ========================================= 
		if ($ci == "" AND $name == "" AND $date == "") {	
			  	echo "<script type='text/javascript'>alert('Incomplete data!');
			  	document.location='../creditor.php'</script>";
		} 
		// ========================================= 
	    // If carrying data, do the queries inside
	    // ========================================= 
		elseif ($ci == $ci AND $name == $name AND $date == $date) {
			// ========================================= 
	    	// Query to get the old data before updating.
	    	// I use the data to log history to compare before and after updating data.
	    	// ========================================= 
			$old_cust_query = mysqli_query($con, "SELECT * FROM customer WHERE cust_id = '$cid'")or die(mysqli_error($con));
				while($old_cust_row = mysqli_fetch_array($old_cust_query)) :
					$old_cust_id = $old_cust_row['cust_id'];

				  	$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
					$remarks = "update the data of user_id = " . $old_cust_id . ".";  
				
					// ========================================= 
					// Date variable declaration
					// ========================================= 
					date_default_timezone_set('Asia/Manila');
					$date = date("Y-m-d H:i:s");

					// ========================================= 
			    	// Insert the data to Log history
			    	// ========================================= 
					mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$cid', '$remarks', '$date')")or die(mysqli_error($con));




			// ========================================= 
		    // Update query
		    // ========================================= 
			mysqli_query($con,"UPDATE customer SET ci_remarks = '$ci', payslip = '$payslip', valid_id = '$valid_id', cert = '$cert', cedula = '$cedula', income = '$income', ci_name = '$name', ci_date = '$date' WHERE cust_id = '$cid'")or die(mysqli_error($con));
			
			echo "<script type='text/javascript'>alert('Successfully update creditor details!');</script>";
			echo "<script>document.location='../creditor.php'</script>";  

			endwhile;
		} 
}

?>

