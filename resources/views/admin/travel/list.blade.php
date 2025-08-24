@extends('admin.appdash')

@section('main', 'List Voyage')
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
    <h2 class="mb-4">Voyage List</h2>
    <div class="mb-4 float-end">
        <a href="{{ route('voyage_create') }} " class="text-decoration-none text-light rounded-2 bg-success  p-3">Add Voyage</a>
    </div>
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
