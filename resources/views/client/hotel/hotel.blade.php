
@extends('app')

@section('main', 'Hotel list')

@section('content')
        



        <div class="container my-5">
        @php
    
        foreach ($hotel as $hotels){
        @endphp

        <a href="{{ route('reserver_hotel', $hotels->id_hotel) }}" class=" a-link my-2">
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
            @php
                }
            @endphp
        </div>

          
        
  

@endsection