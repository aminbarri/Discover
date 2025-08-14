
@extends('app')

@section('main', 'Restaurant Details')

@section('content')
<div class="container my-4">
    <div class="card shadow border-0">
        <div class="row g-0">
            <!-- Images -->
            <div class="col-md-5">
                <div id="carouselRestaurant" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if($restau->img1)
                            <div class="carousel-item active">
                                <img src="{{ asset($restau->img1) }}" class="d-block w-100" alt="{{ $restau->nom }}">
                            </div>
                        @endif
                        @if($restau->img2)
                            <div class="carousel-item">
                                <img src="{{ asset($restau->img2) }}" class="d-block w-100" alt="{{ $restau->nom }}">
                            </div>
                        @endif
                        @if($restau->img3)
                            <div class="carousel-item">
                                <img src="{{ asset($restau->img3) }}" class="d-block w-100" alt="{{ $restau->nom }}">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestaurant" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRestaurant" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <!-- Details -->
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title">{{ $restau->nom }}</h2>
                    <p class="text-muted">
                        <i class="bi bi-geo-alt-fill"></i>
                        {{ $restau->ville }}, {{ $restau->province }}
                    </p>
                    <p class="card-text">{{ $restau->description }}</p>
                    <p><strong>Location:</strong> {{ $restau->location }}</p>
                </div>
            </div>
        </div>

        <!-- List of plats -->
        <div class="p-4">
            <h4 class="mb-3">Plats disponibles</h4>
            <div class="row g-3">
                @forelse ($plats as $plat)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            @if($plat->img1)
                                <img src="{{ asset($plat->img1) }}" class="card-img-top" alt="{{ $plat->nom }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image">
                            @endif
                            <div class="card-body">
                                <h6 class="card-title">{{ $plat->nom }}</h6>
                                <p class="card-text small">{{ Str::limit($plat->description, 60) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">Aucun plat trouvé pour ce restaurant.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
