<?php
    session_start();

	include '0_Connection.php';

  if($_SERVER["REQUEST_METHOD"] == "GET"){
      if(isset($_GET['addr1'],$_GET['addr2'],$_GET['city'],$_GET['state'],$_GET['zip'],
      $_GET['email'],$_GET['clientType'],$_GET['gallons'],$_GET['deliveryDate'])){

			$addr1 = $_GET['addr1'];
			$addr2 = $_GET['addr2'];
			$city = $_GET['city'];
			$state = $_GET['state'];
      $zip = $_GET['zip'];
      $email = $_GET['email'];
      $clientType = $_GET['clientType'];
      $gallons = $_GET['gallons'];
      $deliveryDate = $_GET['deliveryDate'];
      
      if($addr2==null){
        $arr = array($addr1, ', ', $city, ', ', $state, ' ', $zip);
      }else{
        $arr = array($addr1, ', ', $addr2, ', ', $city, ', ', $state, ' ', $zip);
      }
      $fullAddress = implode('',$arr);

      echo $fullAddress;

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
      //$m=3;
      //$d=8;

      //if(($m>6&&$m<9)||($m=6&&$d>19)||($m=9&&$d<23)){
      //$fluctuation=0.04;
      //}

      //Current Price = 1.5, Company Profit Rate = 0.1
      $suggestedPrice=1.5+1.5*(0.1+$localFactor-$historyFactor+$gallonFactor+$fluctuation);
      $totalAmount=$suggestedPrice*$gallons;

      //update Table
      $query="UPDATE Users.readyquote SET Email = '$email', fullAddress = '$fullAddress', gallons = '$gallons', deliveryDate = '$deliveryDate', suggestedPrice = '$suggestedPrice', totalAmount = '$totalAmount', Mark = 1 WHERE Mark=0";

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