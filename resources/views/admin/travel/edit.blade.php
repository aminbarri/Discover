@extends('admin.appdash')

@section('main', 'Edit  Voyage')
@section('content')

<div class="container">
    <div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h3 class="text-center">Edit voyage</h3>
        <form method="POST" action="{{ route('voyage_update',$voyage->id_voy) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ville_depart" class="form-label">Ville Depart</label>
                <input type="text" class="form-control" id="ville_depart" name="ville_depart" value="{{$voyage->ville_depart}}">
            </div>

            <div class="mb-3">
                <label for="ville_arrive" class="form-label">Ville Arrive</label>
                <input type="text" class="form-control" id="ville_arrive" name="ville_arrive" value="{{$voyage->ville_arrive}}">
            </div>

            <div class="mb-3">
                <label for="trajet" class="form-label">Trajet</label>
                <textarea class="form-control" id="trajet" name="trajet" rows="3" required>{{$voyage->trajet}}</textarea>
            </div>

            <div class="mb-3">
                <label for="date_depart" class="form-label">Date Depart</label>
                <input type="date" class="form-control" id="date_depart" name="date_depart" value="{{$voyage->date_depart}}">
            </div>

            <div class="mb-3">
                <label for="heure_depart" class="form-label">Heure Depart</label>
                <input type="time" class="form-control" id="heure_depart" name="heure_depart" value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $voyage->heure_depart)->format('H:i') }}">
            </div>

            <div class="mb-3">
                <label for="dure" class="form-label">Dure </label>
                <input type="number" class="form-control" id="dure" name="dure" value="{{$voyage->dure}}">
            </div>

            <div class="mb-3">
                <label for="available_seats" class="form-label">Available Seats</label>
                <input type="number" class="form-control" id="available_seats" name="available_seats" value="{{$voyage->available_seats}}">
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>

            <div class="mb-3">
                <label for="carte" class="form-label">Carte</label>
                <input type="text" class="form-control" id="carte" name="carte" value="{{$voyage->carte}}">
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" step="0.01" value="{{$voyage->prix}}">
            </div>



            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Edit</button>
            </div>
        </form>
    </div>
</div>


@endsection
