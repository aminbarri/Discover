@extends('admin.appdash')

@section('main', 'client list')
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
                <form action="{{ route('delete_client', $clients->id) }}"  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <td>
                    <button type="submit" class="btn btn-link text-danger p-0 m-0" onclick="return confirm('Are you sure you want to delete this client?')">
                        <i class="bi bi-archive-fill"></i>
                    </button>
                </td>
                </form>
            </tr>

            @php
              }
            @endphp
        </tbody>
    </table>
</div>
@endsection
