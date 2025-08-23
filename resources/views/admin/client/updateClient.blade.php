


@extends('admin.appdash')

@section('main', 'Update account')
@section('content')

<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Update User</h2>
        <form action="{{route('edit_account',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name"> Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name}}">
            </div>

            <div class="form-group mb-3">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}">
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            @if ($user->id !=  auth()->user()->id)
            <div class="form-group mb-3">
                <label for="img">Image 1</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            @endif

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>


@endsection
