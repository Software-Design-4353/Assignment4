<?php
    session_start();
  //calculation and store history not yet add, read history please see 6_QuoteHistory

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
            <button class="btn btn-primary" onclick="window.location.href = '7_ProfileManagement.php';">Profile Management</button>
            <button class="btn btn-primary" onclick="window.location.href = '6_QuoteHistory.php';">Quote History</button>
        </nav>
        <button class="btn btn-outline-primary" onclick="window.location.href = '1_LoginPage.php';">Log Out</button>
    </div>

    <!--模版尾-->
    <!--以下开始自由发挥：-->

    <div>
      <br>
      <br>
      <h2 style="text-align:center"> Get Your Feul Rate</h2><br>
  
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

        //assign values

        $result_ar = mysqli_fetch_assoc($result);
        $addr1=$result_ar['address1'];
        $addr2=$result_ar['address2'];
        $city=$result_ar['city'];
        $state=$result_ar['state'];
        $zip=$result_ar['zip'];
        $email=$result_ar['Email'];
        $clientType=$result_ar['clientType'];

        $gallons=null;
        $deliveryDate=0000-00-00;

        $suggestedPrice=null;
        $totalAmount=null;

        echo "<form action=\"9_PricingModule.php\" method=\"get\">";

        echo "<div style=\"text-align:center;font-family:arial\">";

        //Addr1
        echo "<label for=\"addr1\">Address 1<br></label><br>";
        echo "<input type=\"text\"  name=\"addr1\" value='$addr1' readonly><br>";
        //Addr2
        echo "<label for=\"addr2\">Address 2<br></label><br>";
        echo "<input type=\"text\"  name=\"addr2\" value='$addr2' readonly><br>";
        //city
        echo "<label for=\"city\">City<br></label><br>";
        echo "<input type=\"text\"  name=\"city\" value='$city' readonly><br>";
        //state
        echo "<label for=\"state\">State<br></label><br>";
        echo "<input type=\"text\"  name=\"state\" value='$state' readonly><br>";
        //zip
        echo "<label for=\"zip\">Zip Code<br></label><br>";
        echo "<input type=\"text\" name=\"zip\" value='$zip' readonly><br><br>";

        //client type
        echo "<input type=\"hidden\" name=\"clientType\" value='$clientType' readonly>";
        //email
        echo "<input type=\"hidden\" name=\"email\" value='$email' readonly>";

        //////////////////////

        //get this readyQuote from database
        $query = "SELECT * FROM Users.readyquote WHERE Email='$email'";

        if($result=$mysqli->query($query))  //check if this query succeed
        {} //do nothing
        else
          echo "Could not access to Your file!";

        //assign values

        $result_ar = mysqli_fetch_assoc($result);
        $Mark=$result_ar['Mark'];
        
        if($Mark==1){
        $email=$result_ar['Email'];
        $fullAddress=$result_ar['fullAddress'];
        $gallons=$result_ar['gallons'];
        $deliveryDate=$result_ar['deliverydate'];
        $suggestedPrice=$result_ar['suggestedprice'];
        $totalAmount=$result_ar['totalAmount'];
        }        


        //input gallons
        echo  "<label for=\"gallons\" style=\"color:red\">Gallon Requested: <br></label><br>";
        if($Mark==1){
          echo  "<input type=\"numeric\" name=\"gallons\" placeholder=\"Enter Number\" value='$gallons' readonly><br><br>";  
        }else{
          echo  "<input type=\"numeric\" name=\"gallons\" placeholder=\"Enter Number\" value='$gallons' required><br><br>";  
        }
     
        //input delivery date
        echo  "<label for=\"deliveryDate\" style=\"color:red\">Delivery Date: <br></label><br>";
        if($Mark==1){
          echo  "<input type=\"date\" name=\"deliveryDate\" placeholder=\"date\" value='$deliveryDate' readonly><br><br>";
        }else{
          echo  "<input type=\"date\" name=\"deliveryDate\" placeholder=\"date\" value='$deliveryDate' required><br><br>";
        }


        //////////////////////
        
        //submit button
        if($Mark==1){
          echo "<input type=\"submit\" style = \"background-color: gray\" value=\"Get Price\" DISABLED/><br><br>"; //ban the get price
        }else{
          echo "<input type=\"submit\" value=\"Get Price\"><br><br>";
        }
        
        //show suggest price
        echo "<label for=\"price\" style=\"color:red\">Suggested Price: $<br></label><br>";
        echo "<input type=\"numeric\" name=\"suggestedPrice\" id=\"suggestedPrice\" placeholder=\"00.00\" value='$suggestedPrice' readonly><br><br>";

        //show total amount
        echo "<label for=\"totalAmount\" style=\"color:red\">Total Amount Due: $<br></label><br>";
        echo "<input type=\"numeric\" name=\"totalAmount\" id=\"totalAmount\" placeholder=\"00.00\" value='$totalAmount' readonly><br><br>";

        echo "</div>";
        echo "</form>";

        //submit button
        echo "<form action=\"6_QuoteHistory.php\" method=\"post\">";
        echo "<div style=\"text-align:center;font-family:arial\">";

        $query = "SELECT * FROM Users.readyquote WHERE Email='$email'";

        if($result=$mysqli->query($query))  //check if this query succeed
        {} //do nothing
        else
          echo "Could not access to Your file!";

        //assign values

        if($Mark==0){
          echo "<input type=\"submit\" style = \"background-color: gray\" value=\"Submit Quote\" DISABLED/><br><br>";
        }else{
          echo "<input type=\"submit\" value=\"Submit Quote\"><br><br>";

          $query="INSERT INTO Users.quotehistory(Email,Address,gallons,deliverydate,suggestedprice,price) VALUES('$email','$fullAddress','$gallons','$deliveryDate','$suggestedPrice','$totalAmount')";
          if($mysqli->query($query)===TRUE)
          {}
          else{
            echo "Error";
          }

          
          $query="UPDATE Users.readyquote SET Mark = 0 WHERE Mark=1";//reset readyQuote table
          if($mysqli->query($query)===TRUE)
          {}
          else{
            echo "Error";
          }

          $query="UPDATE Users.UserInfo SET clientType = 1 WHERE Email='$email'"; //change client type to old client (value = 1)
          if($mysqli->query($query)===TRUE)
          {}
          else{
            echo "Error";
          }

        }

    ?>

      </div>
      </form>
  
    </div>

</body>

</html>