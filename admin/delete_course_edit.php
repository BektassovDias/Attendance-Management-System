<?php
	include 'includes/session.php';
	if(isset($_POST['delete_course'])){
		$course = $_POST['course'];
		$sql = "delete from course_class where id='".$course."' ";
		if($conn->query($sql)){
			$_SESSION['success'] = 'The data deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	
	else{
		$_SESSION['error'] = 'Fill up the form first 2';
	}

	header('location:home.php');

?>