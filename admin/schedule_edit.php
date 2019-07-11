<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$stid = $_POST['main_id_send'];
		$time_in = $_POST['id_add'];
		$comment = $_POST['comment'];
		//$time_in = date('H:i:s', strtotime($time_in));
		//$time_out = $_POST['time_out'];
		//$time_out = date('H:i:s', strtotime($time_out));
		$sql = "UPDATE time_in SET comment = '$comment' WHERE id = '$stid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'The note added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location:attendance.php');

?>