<?php
	include 'includes/session.php';

	if(isset($_POST['stureg'])){
		$cardid = $_POST['cardid'];
		$stuid = $_POST['stuid'];
		//$photo = $_POST['photo'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$major = $_POST['major'];
		$photo = $_FILES['photo']['name'];
		if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = "profile.jpg";
			}
		
		//$filename = $_FILES['photo']['name'];
		//if(!empty($filename)){
			//move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		//}
		//else
		//{
		//$filename = "hello";
		//}
		$sql = "insert into students set student_id='".$stuid."',card_id='".$cardid."',firstname='".$firstname."', lastname='".$lastname."', major='".$major."', photo='".$filename."' ";
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

	header('location:../student-reg.php');

?>