<?php
    session_start();
    include '0_Connection.php';

	if ($_SERVER["REQUEST_METHOD"] == "GET"){   
		if(isset($_GET['email']) && isset($_GET['psw'])) {
		    $email = $_GET['email'];
			$password = $_GET['psw'];

			$query="SELECT * FROM Users.UserInfo WHERE Email='$email'";
			
			//query
			if($result=$mysqli->query($query))
			{
			}
			else
				echo "Error Occurs! Try Again!";

			//check if the password or email correct
			$result_at = mysqli_fetch_assoc($result);
			if($result_at['Password']== $password){
		        // Set session variables
				header("Location:3_HomePage");
			}
			else
				echo "Wrong Email Address or Wrong Password! Try Again!";

			$_SESSION["email"] = $email;
		    $_SESSION["password"] = $password;
		    

			$mysqli->close();
		}
	}
?>
<!DOCTYPE html>
<html>

<!--模版头-->

<head>
  <title> ZHL ENERGY | WELCOME </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style>
    h5 {
      font-size: 2rem;
    }

    body {
      background-color: lightyellow;
    }

    input[type=email], input[type=password] {
  width: 25%;
  padding: 6px 10px;
  margin: 2px 0;
  display: inline-block;
  border: 3px solid #ccc;
}

  input[type=submit] {
  background-color: #87CEFA;
  color: white;
  padding: 10px 15px;
  margin: 2px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  font-size: 20px
}

input[type=submit]:hover {
  opacity: 0.8;
}
  </style>
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-0 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-bold ">
      <img width="60" src="pic/Icon.png" class="">
      ZHL ENERGY | WELCOME
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">

    </nav>

  </div>

  <!--模版尾-->
  <!--以下开始自由发挥：-->

  <div style="text-align:center;font-family:arial">
    <br>
    <p style="text-align:center;font-family:arial;color:#00008B;font-size:20px;">Use Your Email to Login</p>

    <form action="<?=$_SERVER['PHP_SELF']?>" method = "GET">
      User Name:<br>
      <input type="email" placeholder="Enter Email" name="email" required><br><br>

      User Password:<br>
      <input type="password" placeholder="Enter Password" name="psw" required> <br><br>

      <input type="submit" value="GO"> <br>

    </form>
      <br>
      <p>Are you new? <a href="2_RegisterPage.php">Join Now!</a></p>
  </div>

</body>

</html>