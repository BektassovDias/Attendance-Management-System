<?php
	include 'includes/session.php';

	if(isset($_POST['add_class'])){
		$class_name = $_POST['class'];
		$sql = "insert into classes set class='".$class_name."' ";
		if($conn->query($sql)){
			$_SESSION['success'] = 'The data added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location:home.php');

?>