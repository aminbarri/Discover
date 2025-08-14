@extends('app')

@section('main', 'Hotel list')

@section('content')
    <div class="container my-5">
        @foreach ($restau as $restaurant)
            <div class="card mb-3 shadow-sm border-0" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div id="" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if($restaurant->img1)
                                    <div class="carousel-item active">
                                        <img src="{{ asset($restaurant->img1) }}" class="d-block w-100"
                                            alt="{{ $restaurant->nom }}">
                                    </div>
                                @endif
                                @if($restaurant->img2)
                                    <div class="carousel-item">
                                        <img src="{{ asset($restaurant->img2) }}" class="d-block w-100"
                                            alt="{{ $restaurant->nom }}">
                                    </div>
                                @endif
                                @if($restaurant->img3)
                                    <div class="carousel-item">
                                        <img src="{{ asset($restaurant->img3) }}" class="d-block w-100"
                                            alt="{{ $restaurant->nom }}">
                                    </div>
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselImages{{ $restaurant->id_rest }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselImages{{ $restaurant->id_rest }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mb-1">{{ $restaurant->nom }}</h5>
                            <h5 class="card-title mb-1">{{ $restaurant->id_rest }}</h5>
                            <p class="text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> {{ $restaurant->ville }},
                                {{ $restaurant->province }}</p>
                            <p class="card-text">{{ Str::limit($restaurant->description, 100) }}</p>
                            <p class="mb-2"><i class="bi bi-map"></i> <a href="{{ $restaurant->carte }}" target="_blank">Voir
                                    sur la carte</a></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">Ouvert</span>
                                <a href="{{route('show_single_rest', $restaurant->id_rest)}}"
                                    class="btn btn-primary btn-sm">Voir détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection