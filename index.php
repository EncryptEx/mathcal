<?php
// global variables
$endNowIfFirst = false;
$mathDays = [];

/** 
 * Function called every time a mathematical day is found.
 * @author EncryptEx
 * @return void
 */
function pushMathDay(DateTime $date, string $mathFormat){
    global $endNowIfFirst, $mathDays;
    $timestampDate = date_timestamp_get($date);
    $formattedDate = $date->format("l jS \of F Y");

    echo $formattedDate . " is a mathematical day! --> " . $mathFormat . "\n";

    // get the array from that day, if none, create one
    $extractArrayFromTimestamp = $mathDays[$timestampDate] ?? [];
    // append math data
    array_push($extractArrayFromTimestamp, [$formattedDate, $mathFormat]);
    // override
    $mathDays[$timestampDate] = $extractArrayFromTimestamp;

    $endNowIfFirst = true;
    return;
}


/** 
 * Retrieves mathematical days from a certain range of dates
 * @author EncryptEx
 * @return array With timestamps as keys and values as arrays of mathematical combinations
 */
function getMathDays(DateTime $start, int $iterationDays, bool $findOnlyFirst = False)
{
    global $endNowIfFirst, $mathDays;
    $date = $start;
    $result = [];
    $mathFormat = "";
    for ($i = 0; $i < $iterationDays; $i++) {
        $date = date_add($date, new DateInterval('P1D')); # Add 1 day

        $day = (int)($date->format('d'));
        $month = (int)($date->format('m'));
        $year = (int)($date->format('y'));


        if ($day + $month == $year) {
            $mathFormat = $day . "+" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }
        if (-$day + $month == $year) {
            $mathFormat = "-" . $day . "+" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
            
        }
        if ($day - $month == $year) {
            $mathFormat = $day . "-" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day * $month == $year) {
            $mathFormat = $day . "*" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day / $month == $year) {
            $mathFormat = $day . "/" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }
        if (pow($day,$month) == $year) {
            $mathFormat = $day . "^" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day*sqrt($month) == $year) {
            $mathFormat = $day . "√" . $month . "=" . $year;
            pushMathDay($date, $mathFormat);
        }


        if ($day == $month + $year) {
            $mathFormat = $day . "=" . $month . "+" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day == $month - $year) {
            $mathFormat = $day . "=" . $month . "-" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day == -$month + $year) {
            $mathFormat = $day . "=-" . $month . "+" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day == $month * $year) {
            $mathFormat = $day . "=" . $month . "*" . $year;
            pushMathDay($date, $mathFormat);
        }
        if ($day == $month / $year) {
            $mathFormat = $day . "=" . $month . "/" . $year;
            pushMathDay($date, $mathFormat);
        }

        if($findOnlyFirst && $endNowIfFirst){
            return $mathDays;
        }
    }
    return $mathDays;
}

getMathDays(new DateTime('now'), 1000, false);
