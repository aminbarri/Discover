@extends('app')

@section('main', 'Reservation Voyage')

@section('content')
    <div class="">
        <div class="container">
            {{$voyage->trajet}}
            <form action="{{route('reservationv_store')}}" method="POST">
               @csrf
               
               <!-- Phone Field -->
               <div class="form-group">
                   <label for="phone">Phone</label>
                   <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
               </div>
               
               <!-- Type Field -->
             
               
               <!-- Number of Persons Field -->
               <input type="number" class="form-control" id="id_voyage" name="id_voyage" value="{{$voyage->id_voy}}" hidden>
               <div class="form-group">
                   <label for="nmbre_perssone">Number of Persons</label>
                   <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
               </div>
               
               
               
               <!-- Submit Button -->
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       
       
       
           </div>
    </div>
@endsection