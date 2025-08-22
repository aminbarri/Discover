@extends('admin.appdash')

@section('main', 'holets')
@section('content')


<div class="container mt-5">
    <h2 class="mb-4">Hotel List</h2>
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
                    <form action="{{ route('hotels_destroy', $hotels->id_hotel)}}" method="POST" style="display:inline-block;">
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
