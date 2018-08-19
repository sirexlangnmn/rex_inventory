<?php 
	session_start();

	if(empty($_SESSION['id'])):
		header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php'); 
?>
	
<body>

<?php
	$date = date("Y-m-d H:i:s");
	$id = $_SESSION['id'];
	$remarks = "has logged out the system at ";  
	mysqli_query($con, "INSERT INTO history_log(user_id, action, date)
		VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));
	
	session_destroy();
		
	echo '<meta http-equiv="refresh" content="2;url=../../../index.php">';
	 
?>
	 <?php include('../includes/preloader.php'); ?>

	
	<?php session_destroy(); ?>
</div>
