<?php 
	include "conn.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$branch = $_POST['branch'];
	
	$query = "INSERT INTO `students` (`student_name`,`student_email`,`student_address`, `student_branch`) VALUES('$name','$email','$address','$branch')";
	$result = mysqli_query($con,$query);

	if($result){
		echo "successfully inserted";
	}
	else{
		echo "failed to insert";
	}

 ?>