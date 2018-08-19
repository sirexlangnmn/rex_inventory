<?php 
	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if(isset($_POST['insert'])) {
		$name    = $_POST['supplier_name'];
		$address = $_POST['supplier_address'];
		$contact = $_POST['supplier_contact'];

		// ========================================= 
	    // Date variable declaration
	    // ========================================= 
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");
		
		$query2 = mysqli_query($con,"SELECT * FROM supplier WHERE supplier_name = '$name' AND supplier_address = '$address'")or die(mysqli_error($con));
			$count = mysqli_num_rows($query2);

			if ($count > 0) {
				echo "<script type='text/javascript'>alert('Supplier already exist!');</script>";
				echo "<script>document.location='../supplier.php'</script>";  
			}
			else {			
				mysqli_query($con,"INSERT INTO supplier(supplier_name, supplier_address, supplier_contact) VALUES('$name', '$address', '$contact')")or die(mysqli_error($con));

				echo "<script type='text/javascript'>alert('New Supplier Added!');</script>";
				echo "<script>document.location='../supplier.php'</script>";  


				$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
				$remarks = "added new supplier " . $name . ".";  
					
				// ========================================= 
		    	// Insert the data to Log history
		    	// ========================================= 
				mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));

			}
	}
?>