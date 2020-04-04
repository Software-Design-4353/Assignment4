<?php
    session_start();
	include 'connection.php';
  if($_SERVER["REQUEST_METHOD"] == "GET"){
    	if(isset($_GET['fName'],$_GET['lName'],$_GET['addr1'],$_GET['addr2'],$_GET['city'],$_GET['state'],$_GET['zip'],$_GET['email'],$_GET['psw'])){
			$fName = $_GET['fName'];
			$lName = $_GET['lName'];
			$addr1 = $_GET['addr1'];
			$addr2 = $_GET['addr2'];
			$city = $_GET['city'];
			$state = $_GET['state'];
			$zip = $_GET['zip'];
			$email = $_GET['email'];
			$psw = $_GET['psw'];

		    $old_email=$_SESSION["email"];
		    
			//update UserInfo Table
			$query="UPDATE Users.UserInfo SET fName = '$fName',lName = '$lName',address1='$addr1',address2='$addr2',city='$city',state='$state',zip='$zip',Email = '$email', Password = '$psw' WHERE Email='$old_email'";
			if($mysqli->query($query)===TRUE)
			{}
			else
				echo "Updating Error";

			//update Table LoginInfo 
			$query="UPDATE Users.LogInInfo SET Email='$email', Password='$psw'  WHERE Email='$old_email'";
			if($mysqli->query($query)===TRUE)
			{
		        header("location:4_Profile Management.php");
		    }
			else
				echo "Updating Error";
        }
  }

?>
