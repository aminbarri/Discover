@extends('admin.appdash')

@section('main', 'List Voyage')
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
 
  

    <h2 class="mb-4">voyage List</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Trajet</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($voyage as $voyages){
            @endphp
            <tr>
                <td>{{$voyages->id_voy}}</td>
                <td>{{$voyages->trajet}}</td>
              
                <td>
                  
                     <a href="{{ route('voyage_edit', $voyages->id_voy)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{ route('voyage_destroy', $voyages->id_voy)}}" method="POST" style="display:inline-block;">
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