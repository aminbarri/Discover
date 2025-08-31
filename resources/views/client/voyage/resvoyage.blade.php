@extends('app')

@section('main', 'Reservation Voyage')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">

            <div class="col-lg-5">
                @if($voyage->img)
                    <img src="{{ asset($voyage->img) }}" class="img-fluid h-100 object-fit-cover" alt="Voyage Image">
                @else
                    <img src="{{ asset('img/LOGO.PNG') }}" class="img-fluid h-100 object-fit-cover" alt="Default">
                @endif
            </div>

            <div class="col-lg-7">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-primary">
                        {{ $voyage->ville_depart }} → {{ $voyage->ville_arrive }}
                    </h3>
                    <p class="text-muted mb-2">
                        <i class="bi bi-calendar-event"></i> {{ $voyage->date_depart }}
                        <br>
                        <i class="bi bi-clock"></i> {{ $voyage->heure_depart }}
                        <br>
                        <i class="bi bi-hourglass-split"></i> Duration: {{ $voyage->dure }} hours
                    </p>

                    <h6 class="fw-semibold mt-3">Trip Details</h6>
                    <p class="text-break">{{ $voyage->trajet }}</p>

                    <h5 class="fw-bold text-success mt-3">{{ $voyage->prix }} MAD</h5>
                    @if ($available_seats < 10)
                    <p class="fw-bold text-danger">
                        Only {{ $available_seats }} seats left! Hurry up!
                    </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="card mt-4 shadow-sm border-0 rounded-3">
        <div class="card-body">
            <h4 class="fw-bold mb-3">Make a Reservation</h4>
            <form action="{{ route('reservationv_store') }}" method="POST">
                @csrf

                <input type="hidden" name="id_voyage" value="{{ $voyage->id_voy }}">

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nmbre_perssone" class="form-label">Number of Persons</label>
                    <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Reserve Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
