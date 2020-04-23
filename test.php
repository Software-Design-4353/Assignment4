<?php
    session_start();

        $deliveryDate = new DateTime('2020-04-22');
        $result = $deliveryDate->format('Y-m-d');

        echo $result;

    $array = explode("-",$result);
    $y = $array[0];
    $m = $array[1];
    $d = $array[2];

    echo $y;
    echo $m;
    echo $d;

        if(($m>6&&$m<9)||($m=6&&$d>19)||($m=9&&$d<23)){
        echo 0.04;
        }  

?>