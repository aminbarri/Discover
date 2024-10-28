


@extends('admin.appdash')

@section('main', 'EMAIL verification')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header bg-success text-white text-center">
                    Email Verified
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Your email has been successfully verified!</h4>
                    <p class="card-text">You can now access all the features of your account.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Go to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
