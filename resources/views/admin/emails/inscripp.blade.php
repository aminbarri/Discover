@extends('admin.appdash')

@section('main', 'EMAIL')
@section('content')

    <div class="container">
        <img src="img\logo.png" alt="">
    <h3>Welcome {{$name}}</h3>
    <h3>Confirm your account</h3>
    <a href="{{$href}}" class="btn btn-primary">Confirm your account</a>
    </div>

@endsection
