<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
    
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

    @include('layouts.footer')
    </div>  
</body>
</html>
