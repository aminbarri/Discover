<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client list</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
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
  

    @include('layouts.footer')
    </div>  
</body>
</html>
