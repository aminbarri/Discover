<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserv</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div>
    @include('layouts.navbar')
    @php
    
    foreach ($hotel as $hotels){
  @endphp


 

<div class="container my-5">
    <a href="{{ route('reserver_hotel', $hotels->id_hotel) }}" class=" a-link ">
        <div class=" d-flex align-items-center con"> 
            @if($hotels->img1)
            <img src="{{ asset($hotels->img1) }}" alt="Hotel Image 1" class="hotel-img">
            @endif
            <div class="hotel-info">
                <div class="basic-info">
                    
                <h5 class="hotel-name">{{ $hotels->nom }}</h5>
                <div class="hotel-price">
                MAD {{ $hotels->prix }}
            </div>
                 </div>
                <div class="rating">
                    <span>4.3</span>
                    <span>(2.6K)</span>
                    <span class="text-muted">· {{ $hotels->classe }}-star hotel</span>
                </div>
                <p>{{ $hotels->ville }}</p>
                <div class="hotel-amenities">
                    <span><i class="fas fa-parking"></i> Free parking</span>
                    <span><i class="fas fa-wifi"></i> Free Wi-Fi</span>
                </div>
                
            </div>
            
          
        </div>
        </a>
    </div>

            @php
            }
        @endphp
        @include('layouts.footer')
    </div>
      

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
