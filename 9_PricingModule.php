<?php
    session_start();
	include '0_Connection.php';
  if($_SERVER["REQUEST_METHOD"] == "GET"){
    	if(isset($_GET['addr1'],$_GET['addr2'],$_GET['city'],$_GET['state'],$_GET['zip'],$_GET['email'],$_GET['clientType'])){

			$addr1 = $_GET['addr1'];
			$addr2 = $_GET['addr2'];
			$city = $_GET['city'];
			$state = $_GET['state'];
            $zip = $_GET['zip'];
            $email = $_GET['email'];
            $clientType = $_GET['clientType'];

            $wholeAddress = "$addr1"+", "+"$addr2"+", "+"$city"+"$state"+" "+"$zip"; 
            $deliveryDate;
            $gallons;

            $localFactor=0.04; //out of state
            $historyFactor=0; //no history
            $gallonFactor=0.03; //order less or equal than 1000 gallons
            $fluctuation=0.03; //except summer(June 20 to September 22)

            //For Texas        
            if($state='TX'){
            $localFactor=0.02;
            }

            //For old clients
            if($clientType=1){
            $historyFactor=0.01;
            }

            //For order more than 1000 gallons
            if($gallons>1000){
            $gallonFactor=0.02;
            }

            //For Summer
            $m=date("n",$deliveryDate);
            $d=date("j",$deliveryDate);

            if(($m>6&&$m<9)||($m=6&&$d>19)||($m=9&&$d<23)){
            $fluctuation=0.04;
            }

            //Current Price = 1.5, Company Profit Rate = 0.1
            $suggestPrice=1.5+1.5*(0.1+$localFactor-$historyFactor+$gallonFactor+$fluctuation);

            $totalAmount=$suggestPrice*$gallons;

            //update Tables

            $query="INSERT INTO Users.quotehistory SET Email = '$email', Address = '$wholeAddress', gallons = '$gallons', deliverydate = '$deliveryDate', suggestedprice = '$suggestPrice', price = '$totalAmount'";
            $query="UPDATE Users.UserInfo SET clientType = '1' WHERE Email='$email'"; //change client type to old client (value = 1)

			if($mysqli->query($query)===TRUE)
			{
				header("location:5_GetFuelRate.php");
			}
			else{
				echo "Error";
			}
		}	
  }

?>