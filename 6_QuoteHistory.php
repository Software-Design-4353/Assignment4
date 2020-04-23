<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>ZHL ENERGY | QUOTE HISTORY</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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


    <br>
    <br>
    <table align = "center" border = "1px" style = "width:600px; line-height: 30px">
        <t>
            <th> Delivery Date </th>
            <th> Gallon Request</th>
            <th> Address </th>
            <th> Suggested Price  </th>
            <th> Total Amount</th>
        </t>
        <?php
            //connection
            include '0_Connection.php';
            $sql = "SELECT * FROM quotehistory";
            $result = $mysqli->query($sql);
            
            while($row = mysqli_fetch_assoc($result))
            {
        ?>
            <tr>
                <td><?php echo $row['deliveryDate']; ?></td>
                <td><?php echo $row['gallons']; ?></td>
                <td><?php echo $row['fullAddress']; ?></td>
                <td><?php echo $row['suggestedPrice']; ?></td>
                <td><?php echo $row['totalAmount']; ?></td>
            </tr>
        <?php

            }
        ?>
        
    </table>

    <?php 

    $mysqli->close();
	?>

</body>

</html>