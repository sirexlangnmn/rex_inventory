<?php
 	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if (isset($_POST['update'])) {
		$supp_id  = $_POST['supplier_id'];
		$name = $_POST['supplier_name'];
		$address  = $_POST['supplier_address'];
		$contact = $_POST['supplier_contact'];

		// ========================================= 
	    // Date variable declaration
	    // ========================================= 
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");

			// ========================================= 
		    // If empty, system notify.
		    // ========================================= 
			if ($name AND $address AND $contact == "") {	
				  	echo "<script type='text/javascript'>alert('Invalid Data!');
				  	document.location='../supplier.php'</script>";
			} 
			// ========================================= 
		    // If carrying data, do the queries inside
		    // ========================================= 
			elseif ($name == $name AND $address == $address AND $contact == $contact) {
				// ========================================= 
		    	// Query to get the old data before updating.
		    	// I use the data to log history to compare before and after updating data.
		    	// ========================================= 
				$old_query = mysqli_query($con, "SELECT supplier_name FROM supplier WHERE supplier_id = '$supp_id'")or die(mysqli_error($con));
					while($old_row = mysqli_fetch_array($old_query)) :
						$old_sup_name = $old_row['supplier_name'];

					  	$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
						$remarks = "update " . $old_sup_name . " supplier record";  
					
						// ========================================= 
				    	// Insert the data to Log history
				    	// ========================================= 
						mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));


						// ========================================= 
		                // Update query
		                // ========================================= 
						mysqli_query($con, "UPDATE supplier SET supplier_name = '$name', supplier_address = '$address', supplier_contact = '$contact' WHERE supplier_id = '$supp_id'")or die(mysqli_error());

						echo "<script type='text/javascript'>alert('Successfully updated supplier record!');</script>";
						echo "<script>document.location='../supplier.php'</script>";  

			
		 			endwhile;
	 		} 
	}

 ?>

