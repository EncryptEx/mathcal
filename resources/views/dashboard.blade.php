<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Math Calendar</title>

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="text-gray-600 body-font bg-gray-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center ">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">

            <span class="ml-3 text-xl">Mathcal</span>
            <span class="ml-7 text-md text-gray-600">A Mathematical Calendar</span>
        </a>


</header>

<body>
    <div class="container mx-auto">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg  lg:w-fullmd:w-1/2 w-5/6 mb-10 md:mb-0">
                    <h1 id="firstCountdownValue" class="mx-auto title-font mb-0" style="font-size:250px;text-align:center;"></h1>
                    <h3 id="restCountdownValue" class="mx-auto font-medium text-3xl" style="margin-top:-70px; text-align:center;" :></h3>
                    <h3 class="mx-auto font-medium text-md" style="text-align:center;" :>till next math-day</h3>
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-0 font-medium text-gray-900">The nearest math-day is at:
                        <br class="hidden lg:inline-block"><span class="text-gray-500">{{ date("l, jS \of F Y", $nearest_day_timestamp) }}
                            <br class="hidden lg:inline-block">↳{{ date("d/m/y",$nearest_day_timestamp) }}</span>
                    </h1>
                    <h1 class="title-font sm:text-4xl text-3xl mx-8 mb-4 mt-0 font-medium text-gray-400">
                        @foreach ($nearest_day_options as $mathOption)
                        {{ $mathOption }}
                        <br class="hidden lg:inline-block">
                        @endforeach
                    </h1>
                    <p class="mb-2 leading-relaxed">Wanna see more?</p>
                    <div class="flex justify-center">
                        <a class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" href="#forecast">See forecast</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-gray-600 body-font">
            <div class="container px-20">
                <h2 class="text-3xl my-5 font-medium text-gray-900">What is a <i>"Math-day"</i> ?</h2>
                <p>A <i>Math-day</i> is a day in which its short date format combines itself creating a perfect mathematical condition.</p>
                <p>An example is 2/2/04, which can be expressed as 2+2=4, 2*2=4, 2²=4...</p>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-20 py-24 mx-auto flex flex-wrap">
                <h3 class="title-font sm:text-3xl text-2xl font-medium text-gray-900 mb-9" id="forecast">Other math days in the following year:</h3>
                @foreach ($other_days as $timestamp => $options)
                <div class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
                    <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm"> </div>
                    <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                        <!-- <div class="flex-shrink-0 w-24 h-24 bg-indigo-100 text-indigo-500 rounded-full inline-flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div> -->
                        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">{{ date("d/m/y", $timestamp) }}</h2>
                            @foreach ($options as $option)
                            <p class="leading-relaxed">{{ $option }}</p>
                            @endforeach
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </section>



    </div>
</body>
<script>
    // Convert timestamp to JS timestamp (miliseconds)
    var countDownDate = {{ $nearest_day_timestamp }}* 1000;

    // Update the count down every 1 second
    var x = setInterval(reloadCountdown, 1000);
    reloadCountdown();

    function reloadCountdown() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // display the first value bigger than the rest
        if (days != 0) {
            document.getElementById("firstCountdownValue").innerHTML = days + "d";
            document.getElementById("restCountdownValue").innerHTML = "and " + hours + "h " + minutes + "m " + seconds + "s ";
        } else if (hours != 0) {
            document.getElementById("firstCountdownValue").innerHTML = hours + "h";
            document.getElementById("restCountdownValue").innerHTML = "and " + minutes + "m " + seconds + "s ";
        } else if (minutes != 0) {
            document.getElementById("firstCountdownValue").innerHTML = minutes + "m";
            document.getElementById("restCountdownValue").innerHTML = "and " + seconds + "s ";
        } else {
            document.getElementById("firstCountdownValue").innerHTML = seconds + "s";
            document.getElementById("restCountdownValue").innerHTML = "";
        }


        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Enjoy the math day!";
        }
    }
</script>

<footer class="text-gray-600 body-font bg-gray-100">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <span class="ml-3 text-xl">Mathcal</span>
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2023 EncryptEx</p>
    </div>
</footer>

</html>