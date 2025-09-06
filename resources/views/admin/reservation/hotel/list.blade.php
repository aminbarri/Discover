@extends('admin.appdash')

@section('main', 'Reservation')
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
    <h2 class="mb-4">Reseration List</h2>
    <div class="listyu">

    <span class="encours">En cours</span>
    <span class="accepte">Acceptée</span>
    <span class="refuse">Refusée</span>
    </div>
    <table class="table htl-re table_css " id='enours'  >
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
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservationModal{{ $reserations->id_resh }}">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>

                    <div class="modal fade" id="deleteReservationModal{{ $reserations->id_resh }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this reservation?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('reservation_destroy', $reserations->id_resh) }}" method="POST" style="display:inline-block;">
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
    <table class="table htl-re table_css " id='accepter'   style="display: none;">
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
                       <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservationModal{{ $reserations->id_resh }}">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>

                    <div class="modal fade" id="deleteReservationModal{{ $reserations->id_resh }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this reservation?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('reservation_destroy', $reserations->id_resh) }}" method="POST" style="display:inline-block;">
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
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservationModal{{ $reserations->id_resh }}">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>

                    <div class="modal fade" id="deleteReservationModal{{ $reserations->id_resh }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this reservation?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('reservation_destroy', $reserations->id_resh) }}" method="POST" style="display:inline-block;">
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
