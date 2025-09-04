@extends('app')
@section('main', 'Trips')

@section('content')
@include('layouts.hero', ['title' => 'voyages'])

<div class="container my-4" id="voyages">
    <div class="row">
       @foreach ($voyage as $voyages)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-3 h-100 d-flex flex-column">
                    <div class="position-relative">
                        @if($voyages->img)
                            <img src="{{ asset($voyages->img) }}" class="card-img-top rounded-top-3" style="height: 200px; object-fit: cover;" alt="Voyage Image">
                        @else
                            <img src="{{ asset('img/logo.png') }}" class="card-img-top rounded-top-3" style="height: 200px; object-fit: cover;" alt="Default Image">
                        @endif

                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-to-bottom from-transparent to-dark opacity-20 rounded-top-3"></div>
                    </div>

                    <div class="card-body d-flex flex-column p-3">
                        <h5 class="card-title fw-bold text-dark mb-3 text-center">
                            {{ $voyages->ville_depart }} → {{ $voyages->ville_arrive }}
                        </h5>

                        <div class="trip-details mb-3 flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-calendar-event text-primary me-2"></i>
                                <span class="text-muted">{{ $voyages->date_depart }}</span>
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-clock text-primary me-2"></i>
                                <span class="text-muted">{{ $voyages->heure_depart }}</span>
                            </div>

                            <div class="d-flex align-items-start">
                                <i class="bi bi-geo-alt text-primary me-2 mt-1"></i>
                                <span class="text-muted">{{ \Illuminate\Support\Str::limit($voyages->trajet, 30, '...') }}</span>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <hr class="my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-5">{{ $voyages->prix }} MAD</span>
                                <a href="{{ route('voyage_showsingle', $voyages->id_voy) }}"
                                class="btn btn-primary btn-sm px-3 py-2 rounded-pill">
                                    <i class="bi bi-eye me-1"></i>
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
