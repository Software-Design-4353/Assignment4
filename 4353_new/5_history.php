<?php
   session_start(); //initialize session variables
?>

<!DOCTYPE html>
<html>
<head>
<title>History</title>
<link rel="stylesheet"type="text/css"href="style.css">
</head>
<body>
	<div class="ui-container ui-big">
		<center>
			<table class="ui-table">
			  <tr>
				<th>Gallons Requested</th>
				<th>Address</th>
				<th>Delivery Date</th>
				<th>Suggest Price</th>
				<th>Total Amount Due</th>
			  </tr>
			      <?php
                       $email=_SESSION("email");
                       $sql="SELECT * FROM QuoteHistory WHERE Email='$email'";

                      //query
                      if($result=$mysqli->query($sql))
                      {
                      }
                      else
                        echo "Error Occurs! Try Again!";

                      while($row = mysqli_fetch_assoc($result){
                            echo("<tr>");
                            echo("<td>".$row["gallons"]."</td>"); //display gallons requested
                            echo("<td>".$row["Address"]."</td>"); //display address
                            echo("<td>".$row["deliverydate"]."</td>"); //display delivery date
                            echo("<td>$".$row["suggestedprice"]."</td>"); //display suggested price
                            echo("<td>$".$row["price"]."</td>"); //display total amount due
                            echo("</tr>");
                      }
                      
                       $mysqli->close();
			      
			      ?>
			</table>
//            <a href="index.php">Calculator</a>
//            <a href="logouthandler.php">Logout</a>
		</center>
	</div>
</body>
</html>

