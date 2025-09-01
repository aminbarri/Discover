@extends('app')

@section('main', 'Destination list')

@section('content')
@include('layouts.hero', ['title' => 'destinations'])

<div class="container my-4" id="destinations">
    @foreach ($destination as $dest)
        <div class="card shadow-lg border-0 rounded-3 mt-3">
            <div class="row g-0">
            <div class="col-md-5">
                <div id="carouselImages" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @if($dest->img1)
                            <div class="carousel-item active">
                                <img src="{{ asset($dest->img1) }}" class="d-block w-100 h-100 object-fit-cover rounded-start" alt="Image 1">
                            </div>
                        @endif
                        @if($dest->img2)
                            <div class="carousel-item {{ !$dest->img1 ? 'active' : '' }}">
                                <img src="{{ asset($dest->img2) }}" class="d-block w-100 h-100 object-fit-cover rounded-start" alt="Image 2">
                            </div>
                        @endif
                        @if($dest->img3)
                            <div class="carousel-item {{ (!$dest->img1 && !$dest->img2) ? 'active' : '' }}">
                                <img src="{{ asset($dest->img3) }}" class="d-block w-100 h-100 object-fit-cover rounded-start" alt="Image 3">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title fw-bold">{{ $dest->nom }}</h2>
                    <p class="text-muted mb-1">
                        <i class="bi bi-geo-alt-fill"></i> {{ $dest->ville }}
                    </p>
                    <p class="card-text mt-3">{{ \Illuminate\Support\Str::limit($dest->description, 70) }}</p>

                    <a href="{{ route('show_destination', $dest->id_des) }}" class="text-decoration-none ">Read More</a>
                </div>
            </div>

        </div>
        </div>
    @endforeach
</div>
@endsection
