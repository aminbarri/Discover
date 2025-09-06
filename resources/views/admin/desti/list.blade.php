
@extends('admin.appdash')

@section('main', 'List Destinations')
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
    <h2 class="mb-4">Destinations List</h2>
    <div class="mb-4 float-end">
        <a href="{{ route('dest_create') }} " class="text-decoration-none text-light rounded-2 bg-success  p-3">Add Destination</a>
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
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteDestModal{{ $dests->id_des }}">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
                <div class="modal fade" id="deleteDestModal{{ $dests->id_des }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this destination?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('dest_destroy', $dests->id_des) }}" method="POST">
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
