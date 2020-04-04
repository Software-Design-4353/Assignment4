<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET"){
    	if(isset($_GET['fName'],$_GET['lName'],$_GET['addr1'],$_GET['addr2'],$_GET['city'],$_GET['state'],$_GET['zip'])){
    		//get info from html file
			$fName = $_GET['fName'];
			$lName = $_GET['lName'];
			$addr1 = $_GET['addr1'];
			$addr2 = $_GET['addr2'];
			$city = $_GET['city'];
			$state = $_GET['state'];
			$zip = $_GET['zip'];
		    $email= $_SESSION["email"];
		    
		//connection
			include '0_Connection.php';
		    
		//add info into Users database
			$query="UPDATE Users.UserInfo SET fName = '$fName',lName = '$lName',address1='$addr1',address2='$addr2',city='$city',state='$state',zip='$zip' WHERE Email='$email'";

		//check if inserted successfully
		    if($mysqli->query($query)===TRUE){
		        header("Location:3_HomePage.php");
		    }else
				echo "Registeration Error";
			$mysqli->close();
    	}
    }
?>

<!DOCTYPE html>
<html>

<!--模版头-->

<head>
  <title>ZHL ENERGY | PROFILE MANAGEMENT</title>

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
  
    input[type=email], input[type=password],input[type=text] {
    width: 25%;
    padding: 6px 10px;
    margin: 2px 0;
    display: inline-block;
    border: 3px solid #ccc;
  }
  
    input[type=submit]{
    background-color: #87CEFA;
    color: white;
    padding: 10px 15px;
    margin: 2px 0;
    border: none;
    cursor: pointer;
    width: 20%;
    font-size: 20px
  }

  .selection{
  width: 10%;
  padding: 6px 10px;
  margin: 2px 0;
  display: inline-block;
  border: 3px solid #ccc;
}
  
  input[type=submit]:hover,button:hover {
    opacity: 0.8;
  }
    </style>
</head>

<body>

  <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-0 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-bold ">
      <img width="60" src="pic/Icon.png" class="">
      ZHL ENERGY | PROFILE MANAGEMENT
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
    </nav>
    <button class="btn btn-outline-primary" onclick="window.location.href = '1_LoginPage.php';">Log Out</button>
  </div>

  <!--模版尾-->
  <!--以下开始自由发挥：-->

  <div>
    <br>
    <br>
    <p style="text-align:center;font-family:arial;color:#00008B;font-size:20px;">New user must complete profile.</p>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="GET">
      <div style="text-align:center;font-family:arial">
        <label for="fName">First Name<br></label><br>
        <input type="text" placeholder="Enter Your First Name" name="fName" required>
        <br>
        <label for="lName">Last Name<br></label><br>
        <input type="text" placeholder="Enter Your Last Name" name="lName" required>
        <br>
        <label for="addr1">Address 1<br></label><br>
        <input type="text" placeholder="Enter Address1" name="addr1" required>
        <br>
        <label for="addr2">Address 2(Optional)<br></label><br>
        <input type="text" placeholder="Enter Address2" name="addr2">
        <br>
        <label for="city">City<br></label><br>
        <input type="text" placeholder="Enter City" name="city" required>
        <br>
        <label for="state">State<br></label><br>
        <select name="state" class="selection">
          <option value="AL">AL（Alabama）</option>
          <option value="AK">AK (Alaska)</option>
          <option value="AZ">AZ (Arizona)</option>
          <option value="AR">AR (Arkansas)</option>
          <option value="CA">CA (California)</option>
          <option value="CO">CO (Colorado)</option>
          <option value="CT">CT (Connecticut)</option>
          <option value="DE">DE (Delaware)</option>
          <option value="DC">DC (District Of Columbia)</option>
          <option value="FL">FL (Florida)</option>
          <option value="GA">GA (Georgia)</option>
          <option value="HI">HI (Hawaii)</option>
          <option value="ID">ID (Idaho)</option>
          <option value="IL">IL (Illinois)</option>
          <option value="IN">IN (Indiana)</option>
          <option value="IA">IA (Iowa)</option>
          <option value="KS">KS (Kansas)</option>
          <option value="KY">KY (Kentucky)</option>
          <option value="LA">LA (Louisiana)</option>
          <option value="ME">ME (Maine)</option>
          <option value="MD">MD (Maryland)</option>
          <option value="MA">MA (Massachusetts)</option>
          <option value="MI">MI (Michigan)</option>
          <option value="MN">MN (Minnesota)</option>
          <option value="MS">MS (Mississippi)</option>
          <option value="MO">MO (Missouri)</option>
          <option value="MT">MT (Montana)</option>
          <option value="NE">NE (Nebraska)</option>
          <option value="NV">NV (Nevada)</option>
          <option value="NH">NH (New Hampshire)</option>
          <option value="NJ">NJ (New Jersey)</option>
          <option value="NM">NM (New Mexico)</option>
          <option value="NY">NY (New York)</option>
          <option value="NC">NC (North Carolina)</option>
          <option value="ND">ND (North Dakota)</option>
          <option value="OH">OH (Ohio)</option>
          <option value="OK">OK (Oklahoma)</option>
          <option value="OR">OR (Oregon)</option>
          <option value="PA">PA (Pennsylvania)</option>
          <option value="RI">RI (Rhode Island)</option>
          <option value="SC">SC (South Carolina)</option>
          <option value="SD">SD (South Dakota)</option>
          <option value="TN">TN (Tennessee)</option>
          <option value="TX">TX (Texas)</option>
          <option value="UT">UT (Utah)</option>
          <option value="VT">VT (Vermont)</option>
          <option value="VA">VA (Virginia)</option>
          <option value="WA">WA (Washington)</option>
          <option value="WV">WV (West Virginia)</option>
          <option value="WI">WI (Wisconsin)</option>
          <option value="WY">WY (Wyoming)</option>
        </select>
        <br>
        <label for="zip">Zip Code<br></label><br>
        <input type="text" placeholder="Enter Zip Code" name="zip" required>
        <br>
        <br>

        <input type="submit" value="Submit"> <br>
        <br>
        <br>
      </div>
    </form>

  </div>


</body>

</html>
