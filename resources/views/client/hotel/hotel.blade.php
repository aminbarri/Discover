@extends('app')

@section('main', 'Hotel list')

@section('content')




    <div class="container my-5">
        @php

        foreach ($hotel as $hotels) {
        @endphp

        <a href="{{ route('reserver_hotel', $hotels->id_hotel) }}" class="text-decoration-none">
            <div class="card mb-3 shadow-sm rounded-3 overflow-hidden hotel-card">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        @if($hotels->img1)
                            <img src="{{ asset($hotels->img1) }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Hotel Image">
                        @else
                            <img src="{{ asset('img/default-hotel.jpg') }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Hotel Image">
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="col-md-8 d-flex flex-column justify-content-between p-3">
                        <div>
                            <h5 class="fw-bold text-dark">{{ $hotels->nom }}</h5>
                            <p class="mb-1 text-muted">
                                <i class="bi bi-geo-alt"></i> {{ $hotels->ville }}
                            </p>

                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">{{ $hotels->classe }} ★</span>
                                <small class="text-muted">· {{ rand(100,1500) }} avis</small>
                            </div>

                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                <span><i class="bi bi-wifi"></i> Wi-Fi gratuit</span>
                                <span><i class="bi bi-car-front"></i> Parking gratuit</span>
                                <span><i class="bi bi-cup-hot"></i> Petit déjeuner</span>
                                <span><i class="bi bi-water"></i> Piscine</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-end mt-3">
                            <div>
                                <span class="fw-bold fs-5 text-dark">MAD {{ $hotels->prix }}</span>
                                <small class="text-muted"> / nuit</small>
                            </div>
                            <span class="badge bg-primary fs-6">Excellent</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        @php
            }
        @endphp
    </div>





@endsection
