@extends('app')
@section('main', 'Voyage')

@section('content')
<div class="container my-4">
    <div class="row">
        @foreach ($voyage as $voyages)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-3 h-100">

                    @if($voyages->img)
                        <img src="{{ asset($voyages->img) }}" class="card-img-top" alt="Voyage Image">
                    @else
                        <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $voyages->ville_depart }} → {{ $voyages->ville_arrive }}</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-calendar-event"></i> {{ $voyages->date_depart }}
                            <br>
                            <i class="bi bi-clock"></i> {{ $voyages->heure_depart }}
                            <br>
                            <i class="bi bi-geo"></i> {{ \Illuminate\Support\Str::limit($voyages->trajet, 30, '...') }}
                        </p>

                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">{{ $voyages->prix }} MAD</span>
                            <a href="{{ route('voyage_showsingle', $voyages->id_voy) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
