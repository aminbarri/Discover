
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
            </div>
        </div>
    </div>
@endsection
