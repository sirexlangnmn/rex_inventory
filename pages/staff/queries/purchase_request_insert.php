<?php 
	session_start();
	
	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	$branch = $_SESSION['branch'];

	include('../includes/dbcon.php');

	$pid     = $_POST['pid'];
	$serial  = $_POST['serial'];
	$reorder = $_POST['reorder'];

	// ============================
    // Date variable declaration
    // ============================
	date_default_timezone_set('Asia/Manila');
	$date    = date("Y-m-d");

		mysqli_query($con,"INSERT INTO purchase_request(prod_id, branch_id, qty, request_date, purchase_status)
		VALUES('$pid', '$branch', '$reorder', '$date', 'pending')")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Added new purchase request!');</script>";
		echo "<script>document.location='../requested_purchase.php'</script>";  



	$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
	$remarks = "request to purchase " . $reorder . " " . $serial . ".";  
	// ========================================= 
	// Insert the data to Log history
	// ========================================= 
	mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));
?>