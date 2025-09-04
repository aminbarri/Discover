@extends('app')

@section('main', 'Destination')

@section('content')

<div class="container my-5" >
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">

            {{-- Images Carousel --}}
            <div class="col-lg-5">
                <div id="destinationCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @if($destination->img1)
                            <div class="carousel-item active">
                                <img src="{{ asset($destination->img1) }}" class="d-block w-100 h-100 object-fit-cover" alt="Image 1">
                            </div>
                        @endif
                        @if($destination->img2)
                            <div class="carousel-item {{ !$destination->img1 ? 'active' : '' }}">
                                <img src="{{ asset($destination->img2) }}" class="d-block w-100 h-100 object-fit-cover" alt="Image 2">
                            </div>
                        @endif
                        @if($destination->img3)
                            <div class="carousel-item {{ (!$destination->img1 && !$destination->img2) ? 'active' : '' }}">
                                <img src="{{ asset($destination->img3) }}" class="d-block w-100 h-100 object-fit-cover" alt="Image 3">
                            </div>
                        @endif
                    </div>
                    @if($destination->img2 || $destination->img3)
                        <button class="carousel-control-prev" type="button" data-bs-target="#destinationCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#destinationCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    @endif
                </div>
            </div>

            {{-- Information --}}
            <div class="col-lg-7">
                <div class="card-body p-4">
                    <h2 class="fw-bold">{{ $destination->nom }}</h2>
                    <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt-fill"></i> {{ $destination->ville }}, {{ $destination->province }}
                    </p>

                    <hr>

                    <h5 class="fw-semibold">Description</h5>
                    <p class="text-justify">{{ $destination->description }}</p>

                    <h6 class="fw-semibold mt-3">Location</h6>
                    <p class="text-break">{{ $destination->location }}</p>

                    <p class="text-muted small mt-4">
                        Last updated: {{ $destination->date_modification }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
