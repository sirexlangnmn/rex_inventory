<?php 
	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if(isset($_POST['insert'])) {
		$cat = $_POST['category'];

		// ============================
	    // Date variable declaration
	    // ============================
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");
		
		$query2 = mysqli_query($con,"SELECT * FROM category WHERE cat_name = '$cat'")or die(mysqli_error($con));
			$count=mysqli_num_rows($query2);

			if ($count > 0) {
				echo "<script type='text/javascript'>alert('Category already exist!');</script>";
				echo "<script>document.location='../category.php'</script>";  
			}
			else {			
				mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$cat')")or die(mysqli_error($con));

				echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
						  echo "<script>document.location='../category.php'</script>";  


				$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
				$remarks = "added category " . $cat . ".";  
					
				// ========================================= 
		    	// Insert the data to Log history
		    	// ========================================= 
				mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));

			}
	}
?>