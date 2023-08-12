<?php 

$date = new DateTime('now');
$daysOfLoop = 1000;


for ($i=0; $i < $daysOfLoop; $i++) { 

    
    $date = date_add($date, new DateInterval('P1D')); # Add 1 day

    $day = (int)($date->format('d'));
    $month = (int)($date->format('m'));
    $year = (int)($date->format('y'));
    if($day + $month == $year) {
    echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "+" . $month . "=" . $year . "\n";
    }
    if(-$day + $month == $year) {
        echo $date->format("l jS \of F Y") . " is a mathematical day! --> -" . $day . "+" . $month . "=" . $year . "\n";
        }
    if($day - $month == $year) {
        echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "-" . $month . "=" . $year . "\n";
    }
    if($day * $month == $year) {
        echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "*" . $month . "=" . $year . "\n";
    }
    if($day / $month == $year) {
        echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "/" . $month . "=" . $year . "\n";
    }
    

}