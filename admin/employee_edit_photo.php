<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$stid = $_POST['empid'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE students SET photo = '".$filename."' WHERE id = '".$stid."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to update photo first';
	}

	header('location: home.php');
?>