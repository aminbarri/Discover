
@extends('admin.appdash')

@section('main', 'List Destinations')
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
 
  

    <h2 class="mb-4">Destinations List</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($dest as $dests){
            @endphp
            <tr>
                <td>{{$dests->id_des}}</td>
                <td>{{$dests->nom}}</td>
              
                <td>
                  
                     <a href="{{route('dest_edit', $dests->id_des)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{ route('dest_destroy', $dests->id_des)}}" method="POST" style="display:inline-block;">
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