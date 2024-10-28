@extends('admin.appdash')

@section('main', 'Reservation')
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
  
  

    <h2 class="mb-4">Reseration List</h2>
    <div class="listyu">
        
    <span class="encours">En cours</span>
    <span class="accepte">Acceptée</span>
    <span class="refuse">Refusée</span>
    </div>
    <table class="table htl-re table_css " id='accepter'  >
        <thead class="thead_border">
            <tr>
                <th>ID</th>
                <th>Phone</th>
                <th>email</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($accepte as $reserations){
            @endphp
            <tr>
                <td>{{$reserations->id_resh}}</td>
                <td>{{$reserations->phone}}</td>
                <td>{{$reserations->email}}</td>
              
                <td>
                  
                     <a href="{{ route('reservationh_edit',$reserations->id_resh)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{route('reservation_destroy',$reserations->id_resh)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
               
            </tr>
            @php
           }
            @endphp
         </tbody>
    </table>
    <table class="table htl-re table_css " id='refuse' style="display: none;">
        <thead class="thead_border">
            <tr>
                <th>ID</th>
                <th>Phone</th>
                <th>email</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($refuse as $reserations){
            @endphp
            <tr>
                <td>{{$reserations->id_resh}}</td>
                <td>{{$reserations->phone}}</td>
                <td>{{$reserations->email}}</td>
              
                <td>
                  
                     <a href="{{ route('reservationh_edit',$reserations->id_resh)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{route('reservation_destroy',$reserations->id_resh)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
               
            </tr>
            @php
           }
            @endphp
         </tbody>
    </table>
    <table class="table htl-re table_css " id='enours'  style="display: none;" >
        <thead class="thead_border">
            <tr>
                <th>ID</th>
                <th>Phone</th>
                <th>email</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($reseration as $reserations){
            @endphp
            <tr>
                <td>{{$reserations->id_resh}}</td>
                <td>{{$reserations->phone}}</td>
                <td>{{$reserations->email}}</td>
              
                <td>
                  
                     <a href="{{ route('reservationh_edit',$reserations->id_resh)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{route('reservation_destroy',$reserations->id_resh)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
               
            </tr>
            @php
           }
            @endphp
         </tbody>
    </table>
</div>


@endsection