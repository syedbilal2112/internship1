<?php 
	include "conn.php";

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$branch = $_POST['branch'];
	
	$query = "UPDATE `students` SET `student_name` = '$name',`student_email` = '$email',`student_address` = '$address', `student_branch` = '$branch' WHERE `id` = $id";
	$result = mysqli_query($con,$query);

	if($result){
		// echo "successfully inserted";
		header("location: index.php");
	}
	else{
		echo "failed to insert";
	}

 ?>