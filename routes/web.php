<?php

use App\Http\Controllers\MathDays;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $now = new DateTime('yesterday midnight');
    $mathdaysclass = new MathDays();

    // get the math events of the next 100 days
    $mathDaysArray = $mathdaysclass->getMathDays($now, 365, false);

    // get the nearest day and remove from total li// get the nearest day and remove from total list
    reset($mathDaysArray);
    $indexTmp = key($mathDaysArray);
    $nearest_day = $mathDaysArray[$indexTmp];
    unset($mathDaysArray[$indexTmp]);

    // $shortDateFormat = Date("d/m/y", $indexTmp);


    return view('dashboard', [
        'nearest_day_options' => $nearest_day,
        'nearest_day_timestamp' => $indexTmp,
        'other_days' => $mathDaysArray
    ]);
});
