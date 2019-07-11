<?php
	
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$photo = "profile.jpg";
		$email = $_POST['email'];
		$date = date('h:i:s');

		
		$password = password_hash($password, PASSWORD_DEFAULT);
		//$sql = "INSERT INTO admin (username, password, firstname, lastname, photo, created_on ) VALUES ($username, $password, $firstname, $lastname, $photo, $date);";
		$sql = "insert into admin set username='".$username."', firstname='".$firstname."', lastname='".$lastname."', password='".$password."', photo='".$photo."', created_on=current_date(), email='".$email."'";
		$query = $conn->query($sql);

		
		
		
	}
	
	

	header('location: index.php');

?>