
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
