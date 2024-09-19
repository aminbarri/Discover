<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('main')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100 ">
        @include('layouts.navbar')

        <div class="flex-grow-1">
            <div class="center_bar">
                <div class="left_side">
                    <h1>Welcome to the Home Page</h1>
                    <p>This is the home page content.</p>
                    <a href="#" class="explore-btn">Explore</a>
                </div>
                <div class="right_side">
                    <img src="img/back.jpg" alt="">
                </div>
            </div>

            <div class="midle_text">
                <h1>Visit Draa-Tafilalet to discover its natural diversity</h1>
            </div>

            <div class="container">
                <div class="article">
                    <img src="img/art.jpg" alt="">
                    <div class="des_title">
                        <h3>Draa-Tafilalet is a region in southeastern Morocco</h3>
                        <p>Draa-Tafilalet is a region in southeastern Morocco, known for its diverse landscapes, including vast deserts, oases, and the Atlas Mountains. It encompasses the provinces of Errachidia, Ouarzazate, Zagora, Tinghir, and Midelt.</p>
                        <a href="#" class="explore-btn">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="article">
                    
                    <div class="des_title">
                        <h3>Draa-Tafilalet is a region in southeastern Morocco</h3>
                        <p>Draa-Tafilalet is a region in southeastern Morocco, known for its diverse landscapes, including vast deserts, oases, and the Atlas Mountains. It encompasses the provinces of Errachidia, Ouarzazate, Zagora, Tinghir, and Midelt.</p>
                        <a href="#" class="explore-btn">Read More...</a>
                    </div>
                    <img src="img/art.jpg" alt="">
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
