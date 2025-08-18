


@extends('admin.appdash')

@section('main', 'Profile')
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
            @if (!$profile->email_verified_at)
            <p class="mt-4"><a href="{{route('confirmation_email',['email' => $profile->email])}}" class="p-3 rounded-3 bg-success text-light text-decoration-none ">Verify Email</a></p>
            @endif


        </div>
    </div>
</div>

@endsection
