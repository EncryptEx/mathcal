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
                    {{ $nearest_day[0][0] }}  ({{ $shortDateFormat }})
                </h3>
                <b>All math combinations are listed here:</b>
                @foreach ($nearest_day as $mathOption)
                <p>{{ $mathOption[1] }} </p>
                @endforeach
            </div>
            <div class="col-6">
                countdown here
            </div>
        </div>
    </div>
</body>

</html>