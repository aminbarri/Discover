@extends('admin.appdash')

@section('main', 'Client List')
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
    <h1>Client Information</h1>

    <table class="table table-bordered mt-4">
        <thead class="thead-light">
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Email Verified At</strong></td>
                <td><strong>Created At</strong></td>
                <td><strong>Edit</strong></td>
                <td><strong>Delete</strong></td>
            </tr>
        </thead>
        @php
                foreach($client as $clients){
        @endphp
        <tbody>
            <tr>
                <td>{{ $clients->id }}</td>
                <td>{{ $clients->name }}</td>
                <td>{{ $clients->email }}</td>
                <td>{{ $clients->email_verified_at ?'Verified' :'Not Verified'}}</td>
                <td> {{ \Carbon\Carbon::parse($clients->created_at)->format('Y-m-d H:i')}}</td>
                <td><a class="text-decoration-none text-warning" href="{{route('update_account',$clients->id)}}"><i class="bi bi-pencil-square"></i></a> </td>
                <td>
                <button type="button" class="btn btn-link text-danger p-0 m-0" data-bs-toggle="modal" data-bs-target="#deleteClientModal{{ $clients->id }}">
                    <i class="bi bi-archive-fill"></i>
                </button>
                <div class="modal fade" id="deleteClientModal{{ $clients->id }}"  tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong>{{ $clients->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('delete_client', $clients->id) }}" method="POST">
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
