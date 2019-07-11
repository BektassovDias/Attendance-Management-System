<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$card_id = $_POST['card_id'];
		$student_id = $_POST['student_id'];
		$major = $_POST['major'];
		
		$sql = "UPDATE students SET student_id = '$student_id', card_id = '$card_id', firstname = '$firstname', lastname = '$lastname', major = '$major' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select student to edit first';
	}

	header('location: home.php');
?>