@extends('admin.appdash')

@section('main', 'Edit Reservation')
@section('content')


<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
    {{session()->get('message')}}
    </div>
@endif



<h2 class="mb-4">Reseration Edit</h2>
<form action="{{route('reservationh_update', $reservation->id_resh)}}" method="POST">
    @csrf
    @method('PUT')
    <!-- Phone Field -->
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $reservation->phone }}" required>
    </div>
    
    <!-- Type Field -->
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type" required>
            <option value="partagé" {{ $reservation->type == 'partagé' ? 'selected' : '' }}>Partagé</option>
            <option value="seul" {{ $reservation->type == 'seul' ? 'selected' : '' }}>Seul</option>
        </select>
    </div>
    
    <!-- Number of Persons Field -->
    <div class="form-group">
        <label for="nmbre_perssone">Number of Persons</label>
        <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ $reservation->nmbre_perssone }}" required>
    </div>
    
    <!-- Start Date Field -->
    <div class="form-group">
        <label for="date_debut">Start Date</label>
        <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $reservation->date_debut }}" required>
    </div>
    
    <!-- End Date Field -->
    <div class="form-group">
        <label for="date_fin">End Date</label>
        <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $reservation->date_fin}}" required>
    </div>
    <div class="form-group">
        <label for="statu">statu</label>
        <select class="form-control" id="statu" name="statu" >
            <option value="En cours" {{ $reservation->statu == 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Acceptée" {{ $reservation->statu == 'Acceptée' ? 'selected' : '' }}>Acceptée</option>
            <option value="Refusée" {{ $reservation->statu == 'Refusée' ? 'selected' : '' }}>Refusée</option>
        </select>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection