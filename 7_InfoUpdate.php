<?php
	include 'connection.php';

	$fName = $_GET['fName'];
	$lName = $_GET['lName'];
	$addr1 = $_GET['addr1'];
	$addr2 = $_GET['addr2'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zip'];
	$email = $_GET['email'];
	$psw = $_GET['psw'];

	//update UserInfo Table
	$query="UPDATE Users.UserInfo SET fName = '$fName',lName = '$lName',address1='$addr1',address2='$addr2',city='$city',state='$state',zip='$zip',Email = '$email', Password = 'psw' WHERE Email=(SELECT Email FROM Users.LogInInfo WHERE isIN = 1)";
	if($mysqli->query($query)===TRUE)
	{}
	else
		echo "Updating Error";

	//update Table LoginInfo 
	$query="UPDATE Users.LogInInfo SET Email='$email', Password='$psw' WHERE isIN = 1";
	if($mysqli->query($query)===TRUE)
	{}
	else
		echo "Updating Error";
?>
