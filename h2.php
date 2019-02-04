<?php
session_start();
$errors = ();

if(isset($_POST['login-submit'])){

	require 'dbh.inc.php';
	$mailuid = $_POST['mailuid'];
	$password=$_POST['pwd'];
	
	if(empty($mailuid)){

		array_push($errors, "email is required");
	}
	if(empty($password)){

		array_push($errors, "password is required");

	}

	if(count($errors)==0) {
		$query = "SELECT * from login where email = '$mailuid' AND password='$password'";
		$result = mysqli_query($dbname,$query);
		if(mysqli_num_rows($result) == 1){
		$_SESSION['username']=$username;			
		$_SESSION['success'] = "you are now logged in";
			header('location: #');
		}
		else{ array_push($errors, "wrong credentials");
			header('location: h1.php');
		}
}
}

			


