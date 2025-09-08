
@extends('app')

@section('main', 'Home')
@section('content')
    <div class="center_bar">
        <div class="d-flex flex-column min-vh-100 ">
            <div class="flex-grow-1">
                <div class="center_bar">
                    <div class="left_side">
                        <h1 class="bebas-neue-regular">Your Journey Starts Here</h1>
                        <p>Unveil the culture, history, and breathtaking landscapes of Draa-Tafilalet.</p>
                        <a href="/destinationclient" class="explore-btn">Explore</a>
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
                            <a href="/voyages" class="explore-btn">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="article">

                        <div class="des_title">
                            <h3>Experience Authentic Morocco</h3>
                            <p>Travel through the heart of Draa-Tafilalet – where history meets nature.</p>
                            <a href="/voyages" class="explore-btn">Read More...</a>
                        </div>
                        <img src="img/sahara.jpg" alt="">
                    </div>
                </div>
                <div class="container mt-2">
                    <h4>Find things to do by interest</h4>
                    <p>Whatever you're into, we’ve got it</p>
                </div>
                <div class="container d-flex flex-row justify-content-between mt-3">
                    <a  href="/hotels" class="card_of_hero" style=" background-image: url('/img/hotels.jpg');">
                        <h1 class="inside_card_hero">Hotels</h1>
                    </a>
                    <a  href="/restau_client" class="card_of_hero" style=" background-image: url('/img/restaurants.jpg');">
                        <h1 class="inside_card_hero">Restaurants</h1>
                    </a>
                    <a  href="/destinationclient"    class="card_of_hero" style=" background-image: url('/img/destinations.jpg');">
                        <h1 class="inside_card_hero">Destinations</h1>
                    </a>
                    <a  href="/voyages"    class="card_of_hero" style="margin-right:0px; background-image: url('/img/voyages.jpg');">
                        <h1 class="inside_card_hero">Voyages</h1>
                    </a>
                </div>
                <div class="container mt-5">
                    <h1 class="text-center mb-3">Where to?</h1>
                    <ul class=" list-unstyled d-flex flex-row justify-content-around">
                        <li class="list_search "><a href="#all" class="text-decoration-none active">Search All</a></li>
                        <li class="list_search "><a href="#hotels" class="text-decoration-none ">Hotels</a></li>
                        <li class="list_search "><a href="#trip" class="text-decoration-none ">Trip</a></li>
                        <li class="list_search "><a href="#restau" class="text-decoration-none ">Restaurants</a></li>
                    </ul>
                    <div>
                        <form action="" id="form_search" class="text-center mt-5 position-relative">
                            <input name="search" type="text" id="searchInput" placeholder="Search for hotels, destinations, restaurants..." class="search_input">
                            <button  class="search_button" >Search</button>
                            <div id="results"></div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll(".list_search a").forEach(link => {
        link.addEventListener("click", function() {
            document.querySelectorAll(".list_search a").forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
        });


        const BASE_URL = "{{ config('app.url') }}";
        $('#searchInput').on('input', function() {
            $('.search_button').hide();
            $('#results').show();
            $('.search_input').css('border-radius', '20px 20px 0 0');
            // $('#form_search').css('background-color': '#f7f7f7');
            let query = $(this).val();
            if (query.length > 2) { // start searching after 3 chars
                $.ajax({
                    url: BASE_URL + "/search_in_all/" + encodeURIComponent(query),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        let resultsDiv = $('#results');
                        resultsDiv.empty();

                        if(data.length === 0){
                            resultsDiv.html('<p>No results found</p>');
                            return;
                        }

                        data.forEach(function(hotel){
                            resultsDiv.append(`
                                <div class="d-flex flex-row ">
                                   <div><img src="${BASE_URL}/${hotel.img1}" alt="${hotel.nom}" width="150" height="100"></div>
                                    <p>${hotel.nom}</p>
                                </div>
                            `);
                        });
                    },
                    error: function(xhr){
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#results').empty();
            }
        });

    </script>
@endsection
