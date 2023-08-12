<?php 

$startDate = new DateTime('now');
$daysOfLoop = 100;


# for(DateTime $date = $startDate; $date.Date <= $endDate.Date; $date = $date:.date_add(1))
for ($i=0; $i < $daysOfLoop; $i++) { 

    
    $date = date_add($startDate, new DateInterval('P1D'));

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