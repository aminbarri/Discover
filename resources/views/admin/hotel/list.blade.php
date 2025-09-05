@extends('admin.appdash')

@section('main', 'Holets')
@section('content')


<div class="container mt-5">
    <h2 class="mb-4">Hotel List</h2>
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
    <div class="mb-4 float-end">
        <a href="{{ route('hotels_create') }} " class="text-decoration-none text-light rounded-2 bg-success  p-3">Add Hotel</a>
    </div>
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
                foreach ($hotel as $hotels){
            @endphp
            <tr>
                <td>{{$hotels->id_hotel}}</td>
                <td>{{$hotels->nom}}</td>
                <td>
                <a href="{{ route('hotels_edit', $hotels->id_hotel)}}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                </td>
                <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $hotels->id_hotel }}">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
                <div class="modal fade" id="deleteModal{{ $hotels->id_hotel }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong>{{ $hotels->nom }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('hotels_destroy', $hotels->id_hotel)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                </div>
                </div>

                </td>

            </tr>
            @php
           }
            @endphp
         </tbody>
    </table>
</div>


@endsection
