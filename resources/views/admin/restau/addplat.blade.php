@extends('admin.appdash')

@section('main', 'add plat')
@section('content')

<div class="container">
    <div class="form-container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div>
     <h3 class="text-center">list plat of resturant: {{ $restau->nom }}</h3>
     <span class="a-add">
        <a href="{{route('addplt.show',$restau->id_rest)}}" class="add_plat">Add a plat</a>
     </span>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                @php
                    foreach ($plat as $plats){
                @endphp
                <tr>
                    <td>{{$plats->id_plat}}</td>
                    <td>{{$plats->nom}}</td>
                </tr>
                @php
               }
                @endphp
             </tbody>
         </table>
            </div>


     </div>
</div>


@endsection
