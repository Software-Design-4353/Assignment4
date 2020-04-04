<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<!--模版头-->

<head>
    <title>ZHL ENERGY | QUOTE HISTORY</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        h5 {
            font-size: 2rem;
        }

        body{
            background-color: lightyellow;
        }
    </style>

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-0 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-bold ">
            <img width="60" src="pic/Icon.png" class="">
            ZHL ENERGY | QUOTE HISTORY
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <button class="btn btn-primary" onclick="window.location.href = '3_HomePage.php';">Home</button>
            <button class="btn btn-primary" onclick="window.location.href = '7_ProfileManagement.php';">Profile
                Management</button>
            <button class="btn btn-primary" onclick="window.location.href = '5_GetFuelRate.php';">Get Fuel
                Rate</button>
        </nav>
        <button class="btn btn-outline-primary" onclick="window.location.href = '1_LoginPage.php';">Log Out</button>
    </div>


    <!--模版尾-->
    <!--以下开始自由发挥：-->

    <div>
      <br>
      <br>
      <h2 style="text-align:center"> Check Quote History</h2>
      <br>
      <table border="1" align="center">
            <tr>
            <th>NO.</th>
            <th>Gallon Requested:</th>
            <th>Delivery Date:</th>
            <th>Delivery Address:</th>
            <th>Price:</th>
            <th>Total Amount:</th>
            </tr>
            <tr>
            <td>1</td>
            <td>30</td>
            <td>April 2, 2020</td>
            <td>4800 Calhoun Rd, Houston, TX 77004</td>
            <td>$25</td>
            <td>30</td>
            </tr>
            </table>

    </div>
</body>

</html>