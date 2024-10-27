


@extends('admin.appdash')

@section('main', 'Profile')
@section('content')
<div class="container mt-5">
    <h1>Admin Information</h1>

    <div class="card mt-4">
        <div class="card-header">
            profile Details
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $profile->id }}</p>
            <p><strong>Name:</strong> {{ $profile->name }}</p>
            <p><strong>Email:</strong> {{ $profile->email }}</p>
            <p><strong>Email Verified At:</strong> {{ $profile->email_verified_at ?? 'Not Verified' }}</p>
            <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($profile->created_at)->format('Y-m-d H:i') }}</p>
            
        </div>
    </div>
</div>

@endsection