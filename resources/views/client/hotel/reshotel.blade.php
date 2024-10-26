

@extends('app')

@section('main', 'Reservation Hotel')

@section('content')
<div class="container">
    
    <div class="post">
       @if($hotel->img1)
       <img src="{{ asset($hotel->img1) }}" alt="Hotel Image 1"  class="post-img">
       @endif
       <h2 class="post-title"></h2>
       <div class="post-meta">
          {{ ($hotel->classe) }}-star hotel · {{ ($hotel->ville) }}, Morocco
       </div>
       <p class="post-content">
           {{ ($hotel->location) }}
       </p>
      <a href="#reservation" class="reserver">reserver</a>
   </div>


    <div id="reservation">

    
    <form action="{{ route('reservationh_store') }}" method="POST">
       @csrf
       
       <!-- Phone Field -->
       <div class="form-group">
           <label for="phone">Phone</label>
           <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
       </div>
       
       <!-- Type Field -->
       <div class="form-group">
           <label for="type">Type</label>
           <select class="form-control" id="type" name="type" required>
               <option value="partagé" {{ old('type') == 'partagé' ? 'selected' : '' }}>Partagé</option>
               <option value="seul" {{ old('type') == 'seul' ? 'selected' : '' }}>Seul</option>
           </select>
       </div>
       
       <!-- Number of Persons Field -->
       <input type="number" class="form-control" id="nmbre_perssone" name="id_hotel" value="{{$hotel->id_hotel}}" hidden>
       <div class="form-group">
           <label for="nmbre_perssone">Number of Persons</label>
           <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
       </div>
       
       <!-- Start Date Field -->
       <div class="form-group">
           <label for="date_debut">Start Date</label>
           <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ old('date_debut') }}" required>
       </div>
       
       <!-- End Date Field -->
       <div class="form-group">
           <label for="date_fin">End Date</label>
           <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ old('date_fin') }}" required>
       </div>
       
       <!-- Submit Button -->
       <button type="submit" class="btn btn-primary">Submit</button>
   </form>

   </div>

   </div>
@endsection