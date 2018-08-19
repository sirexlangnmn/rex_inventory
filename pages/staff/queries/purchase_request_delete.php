<?php
session_start();
include('../includes/dbcon.php');

	$user_id=$_SESSION['id'];
	$id = $_POST['pr_id'];
	
	$query = mysqli_query($con,"SELECT prod_name, qty FROM product NATURAL JOIN purchase_request WHERE pr_id = '$id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
		$name = $row['prod_name'];
		$qty  = $row['qty'];

	$result = mysqli_query($con,"DELETE FROM purchase_request WHERE pr_id ='$id'")
	or die(mysqli_error());

	echo "<script type='text/javascript'>alert('Cancelled purchase request!');</script>";
	echo "<script>document.location='../requested_purchase.php'</script>"; 


	// ============================
    // Date variable declaration
    // ============================
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	
	$remarks="cancelled purchase request of $qty  $name.";
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date)VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));

?>