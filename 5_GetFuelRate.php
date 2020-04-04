<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<!--模版头-->

<head>
    <title> ZHL ENERGY | GET FUEL RATE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script type="text/javascript" src="Get_Rate.js"></script>
    <style>
        h5 {
          font-size: 2rem;
        }
    
        body {
          background-color: lightyellow;
        }
    
      input[type=numeric], input[type=date],input[type=text] {
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
  
  input[type=submit]:hover,button:hover {
    opacity: 0.8;
  }
      </style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-0 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-bold ">
            <img width="60" src="pic/Icon.png" class="">
            ZHL ENERGY | GET FUEL RATE
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <button class="btn btn-primary" onclick="window.location.href = '3_HomePage.php';">Home</button>
            <button class="btn btn-primary" onclick="window.location.href = '7_ProfileManagement.php';">Profile
                Management</button>
            <button class="btn btn-primary" onclick="window.location.href = '6_QuoteHistory.php';">Quote
                History</button>
        </nav>
        <button class="btn btn-outline-primary" onclick="window.location.href = '1_LoginPage.php';">Log Out</button>
    </div>

    <!--模版尾-->
    <!--以下开始自由发挥：-->

    <div>
      <br>
      <br>
      <h2 style="text-align:center"> Get Your Feul Rate</h2>
  
      <form action="5_GetFuelRate.php" method="get">
        <div style="text-align:center;font-family:arial">
  
          <label for="gallons">Gallon Requested: <br></label><br>
          <input type="numeric" name="gallons" placeholder="Enter a number" required>
          <br>

          <label for="deliveryDate">Delivery Date: <br></label><br>
          <input type="date" name="deliveryDate" placeholder="date" required>
          <br>


          <?php
        //connection
        include '0_Connection.php';

        $email=$_SESSION["email"];
        //get this users info from database
        $query = "SELECT * FROM Users.UserInfo WHERE Email='$email'";

        if($result=$mysqli->query($query))  //check if this query succeed
        {} //do nothing
        else
          echo "Could not access to Your profile!";

        //asign all the profile to each variabl
        $result_ar = mysqli_fetch_assoc($result);
  
        $addr1=$result_ar['address1'];
        $addr2=$result_ar['address2'];
        $city=$result_ar['city'];
        $state=$result_ar['state'];
        $zip=$result_ar['zip'];

        echo "<form action=\"8_ProfileUpdate.php\" method=\"get\">";

        //prefill the text box
        echo "<div style=\"text-align:center;font-family:arial\">";
        //fName

        //Addr1
        echo "<label for=\"addr1\">Address 1<br></label><br>";
        echo "<input type=\"text\"  name=\"addr1\" value='$addr1'><br>";
        //Addr2
        echo "<label for=\"addr2\">Address 2<br></label><br>";
        echo "<input type=\"text\"  name=\"addr2\" value='$addr2'><br>";
        //city
        echo "<label for=\"city\">City<br></label><br>";
        echo "<input type=\"text\"  name=\"city\" value='$city'><br>";
        //state
        echo "<label for=\"state\">State<br></label><br>";
        echo "<input type=\"text\"  name=\"state\" value='$state'><br>";

        //zip
        echo "<label for=\"zip\">Zip Code<br></label><br>";
        echo "<input type=\"text\" placeholder=\"Enter Zip Code\" name=\"zip\" value='$zip' required><br>";
    ?> 
  
          <input type="submit" value="Calculate"> <br>
          <br>
        
        <label for="price" style="color:red">Suggested Price:<br></label><br>
        <input type="numeric" placeholder="temp" name="price">
        <br>
        <br>
      
        <label for="totalAmount" style="color:red">Total Amount Due:<br></label><br>
        <input type="numeric" placeholder="temp" name="totalAmount">
        <br>
        <br>
      </div>
      </form>
  
    </div>

</body>

</html>