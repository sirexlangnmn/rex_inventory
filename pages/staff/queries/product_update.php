<?php
 	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../../index.php');
	endif;

	include('../includes/dbcon.php');

	if (isset($_POST['update'])) {
		$prod_id  = $_POST['prod_id'];
		$name     = $_POST['prod_name'];
		$supplier = $_POST['supplier'];
		$price    = $_POST['prod_price'];
		$reorder  = $_POST['reorder'];
		$category = $_POST['category'];
		$serial   = $_POST['serial'];
		$desc     = $_POST['desc'];
		
		$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{	
				if ($_POST['image1']<>""){
					$pic=$_POST['image1'];
				}
				else
					$pic="default.gif";
			}
			else
			{
				$pic = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../../../assets/plugins/images/product/".$pic);
				      }
					}
			
			}

		

			// ========================================= 
		    // If empty, system notify.
		    // ========================================= 
			if ($name AND $supplier AND $price AND $reorder AND $category AND $serial AND $desc == "") {	
				  	echo "<script type='text/javascript'>alert('Incomplete data!');
				  	document.location='../product.php'</script>";
			} 
			// ========================================= 
		    // If carrying data, do the queries inside
		    // ========================================= 
			elseif ($name == $name AND $supplier == $supplier AND $price == $price) {
				// ========================================= 
		    	// Query to get the old data before updating.
		    	// I use the data to log history to compare before and after updating data.
		    	// ========================================= 
				$old_query = mysqli_query($con, "SELECT prod_name FROM product WHERE prod_id = '$prod_id'")or die(mysqli_error($con));
					while($old_row = mysqli_fetch_array($old_query)) :
						$old_prod_name = $old_row['prod_name'];

					  	$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
						$remarks = "update " . $old_prod_name . " product record";  
						// ========================================= 
					    // Date variable declaration
					    // ========================================= 
						date_default_timezone_set('Asia/Manila');
						$date = date("Y-m-d H:i:s");
					
						// ========================================= 
				    	// Insert the data to Log history
				    	// ========================================= 
						mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));
		 			endwhile;



				// ========================================= 
	            // Update query
	            // ========================================= 
				mysqli_query($con,"UPDATE product SET prod_name = '$name', prod_price = '$price', reorder = '$reorder', supplier_id = '$supplier', cat_id = '$category', prod_pic = '$pic', serial = '$serial', prod_desc = '$desc' WHERE prod_id = '$prod_id'")or die(mysqli_error($con));

				echo "<script type='text/javascript'>alert('Successfully updated product record!');</script>";
				echo "<script>document.location='../product.php'</script>";  

			

	 		} 
	}

 ?>

