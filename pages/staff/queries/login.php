<?php 
	session_start(); 

	include('../includes/dbcon.php'); 
 ?>
	
	
<body>

 <?php include('../includes/preloader.php'); ?>

</body>
</html>


<?php 
	if(isset($_POST['login'])) {
		$user_unsafe = $_POST['username'];
		$pass_unsafe = $_POST['password'];
		$branch      = $_POST['branch'];

		$user  = mysqli_real_escape_string($con, $user_unsafe);
		$pass1 = mysqli_real_escape_string($con, $pass_unsafe);

		/*$pass=md5($pass1);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;*/

		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");

		$user_query = mysqli_query($con, "SELECT * FROM user NATURAL JOIN branch WHERE username = '$user' AND password = '$pass1' AND branch_id = '$branch' AND status = 'active'")or die(mysqli_error($con));
			
		$user_row = mysqli_fetch_array($user_query);
           $id      = $user_row['user_id'];
           $name    = $user_row['name'];

           $counter = mysqli_num_rows($user_query);

           $id                 = $user_row['user_id'];
           $_SESSION['branch'] = $user_row['branch_id'];
           $_SESSION['skin']   = $user_row['skin'];

	  	if ($counter == 0) {	
		  	echo "<script type='text/javascript'>alert('Invalid Username or Password!');
		  	document.location='index.php'</script>";
		} 
		elseif ($counter > 0) {
		  	$_SESSION['id']   = $id;	
		  	$_SESSION['name'] = $name;		
		  
			$remarks = "has logged in the system at ";  
			mysqli_query($con, "INSERT INTO history_log (user_id,action,date)
								VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));

       
	 		echo "<script type='text/javascript'>alert('Successfully Login!');</script>";
			echo "<script type='text/javascript'>document.location='../category.php'</script>";
		}
	}	 
?>

	
