@extends('app')

@section('main', 'Reservation Hotel')

@section('content')
    <div class="hotel-details container my-4">
    <!-- Images -->
    <div class="row g-2 mb-4">
        <div class="col-md-8">
            <img src="{{ asset($hotel->img1) }}" class="img-fluid rounded w-100" alt="{{ $hotel->nom }}">
        </div>
        <div class="col-md-4 d-flex flex-column gap-2">
            @if($hotel->img2)
                <img src="{{ asset($hotel->img2) }}" class="img-fluid rounded" alt="Image 2">
            @endif
            @if($hotel->img3)
                <img src="{{ asset($hotel->img3) }}" class="img-fluid rounded" alt="Image 3">
            @endif
        </div>
    </div>

    <!-- Infos principales -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h2 class="fw-bold">{{ $hotel->nom }}</h2>
            <p class="mb-1">
                <span class="badge bg-warning text-dark">{{ $hotel->classe }} ★</span>
                · {{ $hotel->ville }}, Maroc
            </p>
        </div>
        {{-- <div>
            <a href="#reservation" class="btn btn-primary btn-lg">Réserver</a>
        </div> --}}
    </div>

    <!-- Note et avis -->
    <div class="d-flex align-items-center mb-3">
        <span class="badge bg-success fs-6 me-2">8.6</span>
        <strong>Excellent</strong>
        <small class="text-muted ms-2">(1 120 avis)</small>
    </div>

    <!-- Description -->
    <div class="mb-4">
        <h5>À propos de cet hébergement</h5>
        <p>{{ $hotel->location }}</p>
    </div>

    <!-- Services -->
    <div class="row text-muted mb-4">
        <div class="row text-muted mb-4">
        @if($hotel->living_room)
            <div class="col-md-3"><i class="bi bi-house-door"></i> Coin salon</div>
        @endif

        @if($hotel->kitchen)
            <div class="col-md-3"><i class="bi bi-cup-straw"></i> Cuisine</div>
        @endif

        @if($hotel->free_parking)
            <div class="col-md-3"><i class="bi bi-car-front"></i> Parking gratuit</div>
        @endif

        @if($hotel->swimming_pool)
            <div class="col-md-3"><i class="bi bi-water"></i> Piscine</div>
        @endif

        @if($hotel->refrigerator)
            <div class="col-md-3"><i class="bi bi-archive"></i> Réfrigérateur</div>
        @endif

        @if($hotel->pets_allowed)
            <div class="col-md-3"><i class="bi bi-paw"></i> Animaux acceptés</div>
        @endif
    </div>

    </div>

    <!-- Carte -->
    <div class="mb-4">
        <h5>Localisation</h5>
        <div class="map-container rounded overflow-hidden" >
            <a href="{!! $hotel->carte !!}">discover</a>
        </div>
    </div>

    <!-- Prix -->
    <div class="d-flex justify-content-between align-items-center border-top pt-3">
        <h4 class="fw-bold">Prix : <span class="text-primary">MAD {{ $hotel->prix }}</span> / nuit</h4>
        <a href="#reservation" class="btn btn-success reserver">Réserver maintenant</a>
    </div>
</div>


<!-- Reservation Form -->
<div id="reservation" class="container my-5">
    <div class="card shadow-sm p-4">
        <h4 class="mb-3">Réserver cet hôtel</h4>
        <form action="{{ route('reservationh_store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_hotel" value="{{ $hotel->id_hotel }}">

            <div class="row g-3">
                <!-- Phone -->
                <div class="col-md-6">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="{{ old('phone') }}" required>
                </div>

                <!-- Type -->
                <div class="col-md-6">
                    <label for="type" class="form-label">Type de chambre</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="partagé" {{ old('type') == 'partagé' ? 'selected' : '' }}>Partagé</option>
                        <option value="seul" {{ old('type') == 'seul' ? 'selected' : '' }}>Seul</option>
                    </select>
                </div>

                <!-- Number of Persons -->
                <div class="col-md-6">
                    <label for="nmbre_perssone" class="form-label">Nombre de personnes</label>
                    <input type="number" class="form-control" id="nmbre_perssone"
                           name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
                </div>

                <!-- Start Date -->
                <div class="col-md-6">
                    <label for="date_debut" class="form-label">Date d'arrivée</label>
                    <input type="date" class="form-control" id="date_debut"
                           name="date_debut" value="{{ old('date_debut') }}" required>
                </div>

                <!-- End Date -->
                <div class="col-md-6">
                    <label for="date_fin" class="form-label">Date de départ</label>
                    <input type="date" class="form-control" id="date_fin"
                           name="date_fin" value="{{ old('date_fin') }}" required>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100">Confirmer la réservation</button>
            </div>
        </form>
    </div>
</div>

@endsection
