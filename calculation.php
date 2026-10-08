<?php

$error = "";

// what user type in each box

$block1 = "";
$block2 = "";
$block3 = "";    
$block4 = "";
$block5 = "";

if(isset($_POST['calculate'])) {

//get data from the form user enter
    $block1 = $_POST['block1'];
    $block2 = $_POST['block2'];
    $block3 = $_POST['block3'];
    $block4 = $_POST['block4'];
    $block5 = $_POST['block5'];

//an empty box means no value inputted, so set 0
    if($block1 == ""){
        $block1 = 0;
    }

     if($block2 == ""){
        $block2 = 0;
    }

     if($block3 == ""){
        $block3 = 0;
    }

     if($block4 == ""){
        $block4 = 0;
    }

     if($block5 == ""){
        $block5 = 0;
    }

    //validation
    if(!is_numeric($block1) || !is_numeric($block2) || !is_numeric($block3) || !is_numeric($block4) || !is_numeric($block5)){
    $error = "Please enter a valid number.";
} 
    
else if ($block1 < 0 || $block2 < 0 || $block3 < 0 || $block4 < 0 || $block5 < 0) {
    $error = "KWh cannot be negative number.";
} 
    
else if ($block1 > 200 || $block2 > 100 || $block3 > 300 || $block4 > 300) {
    $error = "KWh cannot exceed the specified range.";
} 

else if ($block1 + $block2 + $block3 + $block4 + $block5 == 0) {
    $error = "Please enter your electricity usage.";
}

else {
    // charge for each block
    $charge1 = $block1 * 0.218;
    $charge2 = $block2 * 0.344;
    $charge3 = $block3 * 0.516;
    $charge4 = $block4 * 0.546;
    $charge5 = $block5 * 0.571;

    $totalkWh = $block1 + $block2 + $block3 + $block4 + $block5;
    $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

    if($totalCharge < 3.00){
        $totalCharge = 3.00;
    }

    if($totalkWh > 600){
        $sst = $totalCharge * 0.06;
        $totalCharge = $totalCharge + $sst;
    } 
    else {
        $sst = 0;
    }

    // final bill
    $totalBill = $totalCharge + $sst;
}
}

?>