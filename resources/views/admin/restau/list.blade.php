@extends('admin.appdash')

@section('main', 'List Restaurant')
@section('content')


<div class="container mt-5">
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
    <h2 class="mb-4">RESTAURANT List</h2>
    <div class="mb-4 float-end">
        <a href="{{ route('restau_create') }} " class="text-decoration-none text-light rounded-2 bg-success  p-3">Add Restaurant</a>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>List of plat</th>

            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            @php
                foreach ($restau as $restaus){
            @endphp
            <tr>
                <td>{{$restaus->id_rest}}</td>
                <td>{{$restaus->nom}}</td>

                <td>

                     <a href="{{ route('restau_edit', $restaus->id_rest)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>




                </td>
                <td>
                    <form action="{{ route('restau_destroy', $restaus->id_rest)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{route('plat_list',$restaus->id_rest)}}">show</a>
                </td>

            </tr>
            @php
           }
            @endphp
         </tbody>
    </table>
</div>


@endsection
