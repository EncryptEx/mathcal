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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    </style>

</head>

<body>
    <div class="container">

        <h1 class="mt-4">The Mathematical Calendar</h1>
        <hr>
        <h2>The nearest math day is on:</h2>
        <div class="row">
            <div class="col-6">
                <h3 class="jumbo">
                    <!-- Formatted date -->
                    {{ date("l jS \of F Y", $nearest_day_timestamp) }} ({{ date("d/m/y",$nearest_day_timestamp) }})
                </h3>
                <b>All math combinations are listed here:</b>
                <ul>
                    @foreach ($nearest_day_options as $mathOption)
                    <li>{{ $mathOption }} </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <h3 id="countdown"></h3>
            </div>
            <div class="col-12">
                <h4>Math days in the following year:</h4>
                <div class="row">

                    @foreach ($other_days as $timestamp =>  $options)
                    <hr>
                    <div class="col-12 mb-2">
                        <b>{{ date("d/m/y", $timestamp) }}</b><br>
                        @foreach ($options as $option)
                        <p>{{ $option }}</p>
                        @endforeach
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    // Convert timestamp to JS timestamp (miliseconds)
    var countDownDate = {
        {
            $nearest_day_timestamp
        }
    }* 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);


        document.getElementById("countdown").innerHTML = "In: " + days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Enjoy the math day!";
        }
    }, 1000);
</script>

</html>