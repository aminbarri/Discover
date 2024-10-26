


@extends('app')
@section('main', 'Voyage')
@section('content')
    <div class="">
        @php
    
    foreach ($voyage as $voyages){
  @endphp


  <a href="{{route('voyage_showsingle',$voyages->id_voy)}}"> <h2>{{  $voyages->id_voy}}</h2></a>
  
   @php
    }
   @endphp
    </div>
@endsection
