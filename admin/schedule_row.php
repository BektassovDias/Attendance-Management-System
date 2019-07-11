<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		//$ls = $_POST['time_in_name'];
		$sql = "select * from time_in  WHERE time_in.id= '$id'";// and time_in.time_in= '$time'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>