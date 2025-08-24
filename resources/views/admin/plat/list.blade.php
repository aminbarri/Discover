@extends('admin.appdash')

@section('main', 'List plat')
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
    <h2 class="mb-4">Plat List</h2>
    <div class="mb-4 float-end">
        <a href="{{ route('plat_create') }} " class="text-decoration-none text-light rounded-2 bg-success  p-3">Add Plat</a>
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
                foreach ($plat as $plats){
            @endphp
            <tr>
                <td>{{$plats->id_plat}}</td>
                <td>{{$plats->nom}}</td>

                <td>

                     <a href="{{ route('plat_edit', $plats->id_plat)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>




                </td>
                <td>
                    <form action="{{ route('plat_destroy', $plats->id_plat)}}" method="POST" style="display:inline-block;">
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
