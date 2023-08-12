<?php



function getMathDays(DateTime $start, int $iterationDays, bool $findOnlyFirst = False)
{

    $date = $start;
    $endNow = false;
    for ($i = 0; $i < $iterationDays; $i++) {
        $date = date_add($date, new DateInterval('P1D')); # Add 1 day

        $day = (int)($date->format('d'));
        $month = (int)($date->format('m'));
        $year = (int)($date->format('y'));

        if ($day + $month == $year) {
            echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "+" . $month . "=" . $year . "\n";
            $endNow = true;
        }
        if (-$day + $month == $year) {
            echo $date->format("l jS \of F Y") . " is a mathematical day! --> -" . $day . "+" . $month . "=" . $year . "\n";
            $endNow = true;
        }
        if ($day - $month == $year) {
            echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "-" . $month . "=" . $year . "\n";
            $endNow = true;
        }
        if ($day * $month == $year) {
            echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "*" . $month . "=" . $year . "\n";
            $endNow = true;
        }
        if ($day / $month == $year) {
            echo $date->format("l jS \of F Y") . " is a mathematical day! --> " . $day . "/" . $month . "=" . $year . "\n";
            $endNow = true;
        }

        if($findOnlyFirst && $endNow){
            return;
        }
    }
}

getMathDays(new DateTime('now'), 1000, true);
