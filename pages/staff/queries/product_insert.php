<?php 
	session_start();

	if(empty($_SESSION['id'])):
	header('Location:../../index.php');
	endif;

	if(empty($_SESSION['branch'])):
	header('Location:../../index.php');
	endif;

	$branch=$_SESSION['branch'];

	include('../includes/dbcon.php');

	if(isset($_POST['insert'])) {
		$name     = $_POST['prod_name'];
		$price    = $_POST['prod_price'];
		$desc     = $_POST['prod_desc'];
		$supplier = $_POST['supplier'];
		$reorder  = $_POST['reorder'];
		$category = $_POST['category'];
		$serial   = $_POST['serial'];

		// ========================================= 
	    // Date variable declaration
	    // ========================================= 
		date_default_timezone_set('Asia/Manila');
		$date = date("Y-m-d H:i:s");
		
		$query2 = mysqli_query($con,"SELECT * FROM product WHERE prod_name = '$name' AND branch_id = '$branch' AND serial = '$serial'")or die(mysqli_error($con));
			$count = mysqli_num_rows($query2);

			if ($count > 0) {
				echo "<script type='text/javascript'>alert('Product already exist!');</script>";
				echo "<script>document.location='../product.php'</script>";  
			}
			else {			

				$pic = $_FILES["image"]["name"];
					if ($pic == "") {
						$pic = "default.gif";
					}
					else {
						$pic   = $_FILES["image"]["name"];
						$type  = $_FILES["image"]["type"];
						$size  = $_FILES["image"]["size"];
						$temp  = $_FILES["image"]["tmp_name"];
						$error = $_FILES["image"]["error"];
					
						if ($error > 0){
							die("Error uploading file! Code $error.");
						}
						else {
						
							if($size > 100000000000) {//conditions for the file
								die("Format is not allowed or file size is too big!");
							}
							else {
								move_uploaded_file($temp, "../../../assets/plugins/images/product/".$pic);
							}
						}
					}	

				mysqli_query($con,"INSERT INTO product(prod_name, prod_price, prod_desc, prod_pic, cat_id, reorder, supplier_id, branch_id, serial)VALUES('$name', '$price', '$desc', '$pic', '$category', '$reorder', '$supplier', '$branch', '$serial')")or die(mysqli_error($con));

				echo "<script type='text/javascript'>alert('New Product Added!');</script>";
				echo "<script>document.location='../product.php'</script>";  


				$id      = $_SESSION['id'];  // Come's from session. ID of current User.		
				$remarks = "added new product " . $name . ".";  
					
				// ========================================= 
		    	// Insert the data to Log history
		    	// ========================================= 
				mysqli_query($con, "INSERT INTO history_log (user_id, action, date)VALUES('$id', '$remarks', '$date')")or die(mysqli_error($con));

			}
	}
?>