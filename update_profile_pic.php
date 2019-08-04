<?php 
	include "conn.php";

	$id = $_POST['id'];
	$profile = $_POST['profile'];
	
	$query = "UPDATE `students` SET `student_profile_pic` = '$profile' WHERE `id` = $id";
	$result = mysqli_query($con,$query);

	if($result){
		echo "successfully inserted";
		// header("location: index.php");
	}
	else{
		echo "failed to insert";
	}

 ?>