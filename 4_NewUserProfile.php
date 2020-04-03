<?php
//get info from html file
	$fName = $_GET['fName'];
	$lName = $_GET['lName'];
	$addr1 = $_GET['addr1'];
	$addr2 = $_GET['addr2'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zip'];

//connection
	include 'connection.php';

//add info into Users database
	$query="UPDATE Users.UserInfo SET fName = '$fName',lName = '$lName',address1='$addr1',address2='$addr2',city='$city',state='$state',zip='$zip' WHERE Email=(SELECT Email FROM Users.LogInInfo WHERE isIN = '1')";

//check if inserted successfully
	if($mysqli->query($query)===TRUE)
		header("Location:3_Home Page.html");
	else
		echo "Registeration Error";
	$mysqli->close();
?>
