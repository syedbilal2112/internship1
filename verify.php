<?php 
	include "conn.php";

	$password = $_POST['password'];
	$email = $_POST['email'];
	$query="SELECT password FROM `users` WHERE `email`='$email'";
	session_start();
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   	$db_password=$row[0];
   	if(password_verify($password, $db_password)){
   		$_SESSION[$email]=$email; 
   		// header("location: index.php?email=$email");
         echo "success";
   	}
   else{
   	$message="password or email address incorrect";
   		// header("location: login.php?message=$message");
      echo "failed";
   }
   	
?>