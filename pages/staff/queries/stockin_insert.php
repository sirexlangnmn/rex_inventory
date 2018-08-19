<?php 
	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	$id = $_SESSION['id'];

	include('../includes/dbcon.php');
	
	if(isset($_POST['insert'])) {
		$branch = $_SESSION['branch'];
		$name   = $_POST['prod_name'];
		$qty    = $_POST['qty'];
	
	// ========================================= 
    // Date variable declaration
    // ========================================= 
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:s");
	
	
	$query = mysqli_query($con, "SELECT prod_name FROM product WHERE prod_id = '$name'")or die(mysqli_error());
    $row = mysqli_fetch_array($query);
		$product = $row['prod_name'];


	$remarks = "added $qty of $product";  
	mysqli_query($con, "INSERT INTO history_log(user_id,action,date)VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
	
	
	mysqli_query($con, "UPDATE product SET prod_qty = prod_qty + '$qty' WHERE prod_id = '$name' AND branch_id = '$branch'")or die(mysqli_error($con)); 
		
	mysqli_query($con, "INSERT INTO stockin(prod_id, qty, date_delivered, branch_id)VALUES('$name', '$qty', '$date', '$branch')")or die(mysqli_error($con));


	echo "<script type='text/javascript'>alert('Added new $qty stocks of $product!');</script>";
	echo "<script>document.location='../stockin.php'</script>";  
	}
?>