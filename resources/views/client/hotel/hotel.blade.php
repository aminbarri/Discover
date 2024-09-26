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
    @include('layouts.navbar')
    @php
    
    foreach ($hotel as $hotels){
  @endphp


 
<div class="hotel-container">
    <!-- Hotel Title -->
    <h1>{{ $hotels->nom }}</h1>
    
    <p><strong>Ville:</strong> {{ $hotels->ville }}</p>
    
    
    <p><strong>Classe:</strong> {{ $hotels->classe }} stars</p>
    
    <!-- Price -->
    <p><strong>Prix par nuit:</strong> {{ $hotels->prix }} MAD</p>
    
    <!-- Hotel Images -->
    <div class="hotel-images">
        @if($hotels->img1)
            <img src="{{ asset($hotels->img1) }}" alt="Hotel Image 1">
        @endif
    
    </div>
    
    <!-- Reserve Button -->
    <a href="{{ route('reserver_hotel', $hotels->id_hotel) }}" class="btn-reserve">Reserve Now</a>
 
   
</div>
@php
}
@endphp
    </div>
        @include('layouts.footer')
    </div>
      

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
