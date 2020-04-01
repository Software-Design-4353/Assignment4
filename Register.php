<?php
	
    $email = $_GET['email'];
	$password = $_GET['psw'];

	include 'connection.php';

	$query="INSERT INTO Users.LogInInfo(Email,Password,isIN) VALUES('$email','$password','1')";
	if($mysqli->query($query)===TRUE)
	{}
	else
		echo "LogInInfo updating error";

	$query="INSERT INTO Users.UserInfo(Email,Password) VALUES('$email','$password')";
	if($mysqli->query($query)===TRUE)
		header("Location:4_NewUserProfile.html");
	else
		echo "Registeration Error";
	$mysqli->close();
?>