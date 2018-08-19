<?php
 	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if (isset($_POST['update'])) {
		$cat_id   = $_POST['cat_id'];
		$category = $_POST['category'];

		// ========================================= 
	    // Date variable declaration
	    // ========================================= 
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");

			// ========================================= 
		    // If empty, system notify.
		    // ========================================= 
			if ($category == "") {	
				  	echo "<script type='text/javascript'>alert('Complete the data!');
				  	document.location='../category.php'</script>";
			} 
			// ========================================= 
		    // If carrying data, do the queries inside
		    // ========================================= 
			elseif ($category == $category) {
				// ========================================= 
		    	// Query to get the old data before updating.
		    	// I use the data to log history to compare before and after updating data.
		    	// ========================================= 
				$old_cat_query = mysqli_query($con, "SELECT cat_name FROM category WHERE cat_id = '$cat_id'")or die(mysqli_error($con));
					while($old_cat_row = mysqli_fetch_array($old_cat_query)) :
						$old_cat = $old_cat_row['cat_name'];

					  	$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
						$remarks = "update category  " . $old_cat . " to " . $category . ".";  
					
						// ========================================= 
				    	// Insert the data to Log history
				    	// ========================================= 
						mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));


						// ========================================= 
		                // Update query
		                // ========================================= 
						mysqli_query($con, "UPDATE category SET cat_name = '$category' WHERE cat_id = '$cat_id'")or die(mysqli_error());

						echo "<script type='text/javascript'>alert('Successfully updated category!');</script>";
						echo "<script>document.location='../category.php'</script>";  

			
		 			endwhile;
	 		} 
	}

 ?>

