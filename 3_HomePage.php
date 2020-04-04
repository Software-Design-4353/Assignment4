<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    
<!--模版头-->

<head>
    <title> ZHL ENERGY | HOME</title>

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
            background-image: url("pic/Background.jpg");
            background-color: lightyellow;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-0 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-bold ">
            <img width="60" src="pic/Icon.png" class="">
            ZHL ENERGY | HOME
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <button class="btn btn-primary" onclick="window.location.href = '7_ProfileManagement.php';">Profile
                Management</button>
            <button class="btn btn-primary" onclick="window.location.href = '5_GetFuelRate.php';">Get Fuel Rate</button>
            <button class="btn btn-primary" onclick="window.location.href = '6_QuoteHistory.php';">Quote History</button>
        </nav>
        <button class="btn btn-outline-primary" onclick="window.location.href = '1_LoginPage.php';">Log
            Out</button>
    </div>
    <div>

        

        
    </div>
</body>

</html>