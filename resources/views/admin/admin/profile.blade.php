


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
        <div class="card-body d-flex flex-row">
            <div class="w-50">
                <p><strong>ID:</strong> {{ $profile->id }}</p>
                <p><strong>Name:</strong> {{ $profile->name }}</p>
                <p><strong>Email:</strong> {{ $profile->email }}</p>
                <p><strong>Email Verified At:</strong> {{ $profile->email_verified_at ?? 'Not Verified' }}</p>
                <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($profile->created_at)->format('Y-m-d H:i') }}</p>
                <div class="d-flex flex-row ">
                @if (!$profile->email_verified_at)
                <a href="{{route('confirmation_email',['email' => $profile->email])}}" class="me-5 p-3 rounded-3 bg-success text-light text-decoration-none ">Verify Email</a>
                @endif
                <a class="p-3 rounded-3 bg-success text-light text-decoration-none" href="{{route('update_account',$profile->id)}}">Update Profile</a>

                </div>
            </div>
            <div class="w-50">
                @if ($profile->img)
                 <img class=" rounded-5" style="width: 175px" src="{{asset($profile->img)}}" alt="">
                @endif
                <form action="{{route('update_img',$profile->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3 mt-2">
                    <label for="img" class="form-label"> {{$profile->img ? "Update Profile":"Add image Profile"}}</label>
                    <input class="form-control" type="file" id="img" name="img">
                    <button class="btn mt-2 btn-secondary " type="submit" >{{$profile->img ? "Update":"Add"}}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection
