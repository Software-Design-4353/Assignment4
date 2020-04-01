<?php	
    $email = $_GET['email'];
	$password = $_GET['psw'];

	include 'connection.php';

	$query="SELECT Password FROM Users.UserInfo WHERE Email='$email'";
	
	//query
	if($result=$mysqli->query($query))
	{	
	}
	else
		echo "Error Occurs! Try Again!";

	//check if the password or email correct
	$result_at = mysqli_fetch_assoc($result);
	if($result_at['Password']==$password){
		$update="UPDATE Users.LogInInfo SET isIN=1 WHERE Email='$email'";
		if($mysqli->query($update)===TRUE)
		{}
		else
			echo "Login Updating Failed!";
		header("Location:3_Home Page.html");
	}
	else
		echo "Wrong Email Address or Wrong Password! Try Again!";
	$mysqli->close();
?>