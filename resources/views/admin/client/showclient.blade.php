@extends('admin.appdash')

@section('main', 'client list')
@section('content')
<div class="container mt-5">
    <h1>Client Information</h1>

    <table class="table table-bordered mt-4">
        <thead class="thead-light">
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Email Verified At</strong></td>
                <td><strong>Created At</strong></td>

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

            </tr>
           
            @php
              }
            @endphp
        </tbody>
    </table>
</div>
@endsection