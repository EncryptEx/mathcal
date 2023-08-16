<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathDays extends Controller
{
    // global variables
    public $endNowIfFirst = false;
    public $mathDays = [];

    /**
     * Function called every time a mathematical day is found.
     * @author EncryptEx
     * @return void
     */
    public function pushMathDay(\DateTime $date, string $mathFormat)
    {

        $timestampDate = date_timestamp_get($date);
        // echo $formattedDate . " is a mathematical day! --> " . $mathFormat . "\n";

        // get the array from that day, if none, create one
        $extractArrayFromTimestamp = $this->mathDays[$timestampDate] ?? [];
        // append math data
        array_push($extractArrayFromTimestamp, $mathFormat);
        // override
        $this->mathDays[$timestampDate] = $extractArrayFromTimestamp;

        $this->endNowIfFirst = true;
        return;
    }


    /**
     * Retrieves mathematical days from a certain range of dates
     * @author EncryptEx
     * @return array With timestamps as keys and values as arrays of mathematical combinations
     */
    public function getMathDays(\DateTime $start, int $iterationDays, bool $findOnlyFirst = false)
    {
        $date = $start;
        $result = [];
        $mathFormat = "";
        for ($i = 0; $i < $iterationDays; $i++) {
            $date = date_add($date, new \DateInterval('P1D')); # Add 1 day

            $day = (int)($date->format('d'));
            $month = (int)($date->format('m'));
            $year = (int)($date->format('y'));


            if ($day + $month == $year) {
                $mathFormat = $day . "+" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if (-$day + $month == $year) {
                $mathFormat = "-" . $day . "+" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day - $month == $year) {
                $mathFormat = $day . "-" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day * $month == $year) {
                $mathFormat = $day . "*" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day / $month == $year) {
                $mathFormat = $day . "/" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if (pow($day, $month) == $year) {
                $mathFormat = $day . "^" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day * sqrt($month) == $year) {
                $mathFormat = $day . "√" . $month . "=" . $year;
                $this->pushMathDay($date, $mathFormat);
            }


            if ($day == $month + $year) {
                $mathFormat = $day . "=" . $month . "+" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day == $month - $year) {
                $mathFormat = $day . "=" . $month . "-" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day == -$month + $year) {
                $mathFormat = $day . "=-" . $month . "+" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day == $month * $year) {
                $mathFormat = $day . "=" . $month . "*" . $year;
                $this->pushMathDay($date, $mathFormat);
            }
            if ($day == $month / $year) {
                $mathFormat = $day . "=" . $month . "/" . $year;
                $this->pushMathDay($date, $mathFormat);
            }

            if ($findOnlyFirst && $this->endNowIfFirst) {
                return $this->mathDays;
            }
        }
        return $this->mathDays;
    }
}
