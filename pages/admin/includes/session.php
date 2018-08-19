<?php 
	session_start(); 
	include('includes/dbcon.php');
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
		<script>
		window.location = "index.php";
		</script>
	<?php } 
		

		$session_id = $_SESSION['id'];

		$user_query = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$session_id'")or die(mysql_error());
		$user_row = mysqli_fetch_array($user_query);
		$user_username = $user_row['name'];

?>