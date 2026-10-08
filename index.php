<?php

include 'calculation.php';

?>

<!DOCTYPE html>
<head>
    <title>Electricity Bill Calculator</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Calculate House Electricity Bill</h1>

    <?php 
        if($error != "")
            echo "<p style='color:red;'>warning: " . $error . "</p>";
    ?>

<div style="margin-bottom: 30px">
    <table border="1" cellpadding="2">
    <tr>
        <th>Block Tariff (per month)</th>
        <th>Unit</th>
        <th>Rate</th>
    </tr>
    <tr>
        <td>For the first 200 kWh (1-200 kWh) per month</td>
        <td>1-200 kWh</td>
        <td>0.218</td>
    </tr>
    <tr>
        <td>For the next 100 kWh (201-300 kWh) per month</td>
        <td>201-300 kWh</td>
        <td>0.344</td>
    </tr>
    <tr>
        <td>For the next 300 kWh (301-600 kWh) per month</td>
        <td>301-600 kWh</td>
        <td>0.516</td>
    </tr>
    <tr>
        <td>For the next 300 kWh (600-900 kWh) per month</td>
        <td>600-900 kWh</td>
        <td>0.546</td>
    </tr>
    <tr>
        <td>For the next kWh (901 kWh onwards) per month</td>
        <td>> 901 kWh</td>
        <td>0.571</td>
    </tr>
    <tr>
        <td colspan="3">The minimum monthly chafe is RM300. Usage more than 600kWh is charged 6% SST.</td>
    </tr>       
    </table>
</div>

<div style="margin-bottom: 30px">
    <form method="post">
        Enter your first 200 kWh (1-200 kWh) per month :
        <input type="text" name="block1" value=""><br></br>

        Enter next 100 kWh (201-300 kWh) per month :
        <input type="text" name="block2" value=""><br></br>

        Enter next 300 kWh (301-600 kWh) per month :
        <input type="text" name="block3" value=""><br></br>

        Enter next 300 kWh (601-900 kWh) per month :
        <input type="text" name="block4" value=""><br></br>

        Enter next kWh (901 kWh onwards) per month :
        <input type="text" name="block5" value=""><br></br>

        <input type="submit" name="calculate" value="Calculate Bill">
        <input type="reset" value="Reset">
    </form>
</div>

    <hr>

    <h2>Your Electricity Bill</h2>

</body>

<?php
    if(isset($_POST['calculate']) && $error == "") {

        echo "1 - 200 kWh: " . $block1 . " kWh x 0.218 = RM " . number_format($charge1, 2) . "<br>";
        echo "201 - 300 kWh: " . $block2 . " kWh x 0.344 = RM " . number_format($charge2, 2) . "<br>";
        echo "301 - 600 kWh: " . $block3 . " kWh x 0.516 = RM " . number_format($charge3, 2) . "<br>";
        echo "601 - 900 kWh: " . $block4 . " kWh x 0.546 = RM " . number_format($charge4, 2) . "<br>";
        echo "901 kWh onwards: " . $block5 . " kWh x 0.571 = RM " . number_format($charge5, 2) . "<br>";

        echo "<br></br>"; 

        echo "Total electrcity consumption: " . $totalkWh . " kWh<br>";
        echo "Total consumption: RM " . number_format($totalCharge, 2) . "<br>";
        echo "SST (6%): RM " . number_format($sst, 2) . "<br>";
        echo "<b>Total Current Bill: RM " . number_format($totalBill, 2) . "</b><br>";

    }
?>

</html>