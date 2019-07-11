<?php
	include 'includes/session.php';

	if(isset($_POST['add_course'])){
		$course_name = $_POST['course_name'];
		$class_name = $_POST['class_name'];
		$teacher_id = $_POST['teacher_id'];
		$sql = "insert into course_class set course='".$course_name."', major='".$class_name."', teacher='".$teacher_id."' ";
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
	
	if(isset($_POST['delete_course'])){
		$course = $_POST['course'];
		$major = $_POST['major'];
		$sql = "delete from course_class where course='".$course."' ";
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