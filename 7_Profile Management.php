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
      <button class="btn btn-primary" onclick="window.location.href = '3_Home Page.html';">Home</button>
      <button class="btn btn-primary" onclick="window.location.href = '5_Get Fuel Rate.html';">Get Fuel Rate</button>
      <button class="btn btn-primary" onclick="window.location.href = '6_Quote History.html';">Quote History</button>
    </nav>
    <button class="btn btn-outline-primary" onclick="window.location.href = '1_Login Page.html';">Log Out</button>
  </div>

  <!--模版尾-->
  <!--以下开始自由发挥：-->

  <div>
    <br>
    <br>
    <p style="text-align:center;font-family:arial;color:#00008B;font-size:20px;">My Personal Infomation</p>
    <?php
        //connection
        include 'connection.php';

        //get this users info from database
        $query = "SELECT * FROM Users.UserInfo WHERE Email = (SELECT Email from Users.LogInInfo WHERE isIN = 1)";

        if($result=$mysqli->query($query))  //check if this query succeed
        {} //do nothing
        else
          echo "Could not access to Your profile!";

        //asign all the profile to each variabl
        $result_ar = mysqli_fetch_assoc($result);
        $email=$result_ar['Email'];
        $psw=$result_ar['Password'];
        $fName=$result_ar['fName'];
        $lName=$result_ar['lName'];
        $addr1=$result_ar['address1'];
        $addr2=$result_ar['address2'];
        $city=$result_ar['city'];
        $state=$result_ar['state'];
        $zip=$result_ar['zip'];

        echo "<form action=\"InfoUpdate.php\" method=\"get\">";

        //prefill the text box
        echo "<div style=\"text-align:center;font-family:arial\">";
        //fName
        echo "<label for=\"fName\">First Name</label>";
        echo "<input type=\"text\"  name=\"fName\" value='$fName' required><br>";
        //lName
        echo "<label for=\"lName\">Lase Name</label>";
        echo "<input type=\"text\"  name=\"lName\" value='$lName' required><br>";
        //Addr1
        echo "<label for=\"addr1\">Address1</label>";
        echo "<input type=\"text\"  name=\"addr1\" value='$addr1' required><br>";
        //Addr2
        echo "<label for=\"addr2\">Address2</label>";
        echo "<input type=\"text\"  name=\"addr2\" value='$addr2'><br>";
        //city
        echo "<label for=\"city\">City</label>";
        echo "<input type=\"text\"  name=\"city\" value='$city' required><br>";
        //state
        echo "<label for=\"state\">State</label>";
        echo "<select name=\"state\" class=\"selection\"";
        echo "<option value=\"\"></option>";
        echo "<option value='$state'selected>".$state."</option>";
        echo "<option value=\"AL\">AL（Alabama)</option>";
        echo "<option value=\"AK\">AK (Alaska)</option>";
        echo "<option value=\"AZ\">AZ (Arizona)</option>";
        echo "<option value=\"AR\">AR (Arkansas)</option>";
        echo "<option value=\"CA\">CA (California)</option>";
        echo "<option value=\"CO\">CO (Colorado)</option>";
        echo "<option value=\"CT\">CT (Connecticut)</option>";
        echo "<option value=\"DE\">DE (Delaware)</option>";
        echo "<option value=\"DC\">DC (District Of Columbia)</option>";
        echo "<option value=\"FL\">FL (Florida)</option>";
        echo "<option value=\"GA\">GA (Georgia)</option>";
        echo "<option value=\"HI\">HI (Hawaii)</option>";
        echo "<option value=\"ID\">ID (Idaho)</option>";
        echo "<option value=\"IL\">IL (Illinois)</option>";
        echo "<option value=\"IN\">IN (Indiana)</option>";
        echo "<option value=\"IA\">IA (Iowa)</option>";
        echo "<option value=\"KS\">KS (Kansas)</option>";
        echo "<option value=\"KY\">KY (Kentucky)</option>";
        echo "<option value=\"LA\">LA (Louisiana)</option>";
        echo "<option value=\"ME\">ME (Maine)</option>";
        echo "<option value=\"MD\">MD (Maryland)</option>";
        echo "<option value=\"MA\">MA (Massachusetts)</option>";
        echo "<option value=\"MI\">MI (Michigan)</option>";
        echo "<option value=\"MN\">MN (Minnesota)</option>";
        echo "<option value=\"MS\">MS (Mississippi)</option>";
        echo "<option value=\"MO\">MO (Missouri)</option>";
        echo "<option value=\"MT\">MT (Montana)</option>";
        echo "<option value=\"NE\">NE (Nebraska)</option>";
        echo "<option value=\"NV\">NV (Nevada)</option>";
        echo "<option value=\"NH\">NH (New Hampshire)</option>";
        echo "<option value=\"NJ\">NJ (New Jersey)</option>";
        echo "<option value=\"NM\">NM (New Mexico)</option>";
        echo "<option value=\"NY\">NY (New York)</option>";
        echo "<option value=\"NC\">NC (North Carolina)</option>";
        echo "<option value=\"ND\">ND (North Dakota)</option>";
        echo "<option value=\"OH\">OH (Ohio)</option>";
        echo "<option value=\"OK\">OK (Oklahoma)</option>";
        echo "<option value=\"OR\">OR (Oregon)</option>";
        echo "<option value=\"PA\">PA (Pennsylvania)</option>";
        echo "<option value=\"RI\">RI (Rhode Island)</option>";
        echo "<option value=\"SC\">SC (South Carolina)</option>";
        echo "<option value=\"SD\">SD (South Dakota)</option>";
        echo "<option value=\"TN\">TN (Tennessee)</option>";
        echo "<option value=\"TX\">TX (Texas)</option>";
        echo "<option value=\"UT\">UT (Utah)</option>";
        echo "<option value=\"VT\">VT (Vermont)</option>";
        echo "<option value=\"VA\">VA (Virginia)</option>";
        echo "<option value=\"WA\">WA (Washington)</option>";
        echo "<option value=\"WV\">WV (West Virginia)</option>";
        echo "<option value=\"WI\">WI (Wisconsin)</option>";
        echo "<option value=\"WY\">WY (Wyoming)</option> ";
        echo "</select><br>";
        //zip
        echo "<label for=\"zip\">Zip Code</label>";
        echo "<input type=\"text\" placeholder=\"Enter Zip Code\" name=\"zip\" value='$zip' required><br>";
        //Email
        echo "<label for=\"email\">Email</label>";
        echo "<input type=\"email\"  name=\"email\" value='$email' required><br>";
        //Password
        echo "<label for=\"psw\">Password</label>";
        echo "<input type=\"text\"  name=\"psw\" value='$psw' required><br>";

        echo "<input type=\"submit\" value=\"Save\">"; 
        echo "</div>";
        echo "</form>";

    ?> 
  </div>
</body>
</html>
