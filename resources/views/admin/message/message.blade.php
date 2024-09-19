<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add  holet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
 
    <div class="container mt-5 ">
        <h2>Messages</h2>
    
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Send At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->sujet }}</td>
                        <td> <a href="{{ route('message_show', $message->id_mess) }}" class="">
                            <i class="bi bi-eye"></i> 
                        </a> </td>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    @include('layouts.footer')
    </div>  
</body>
</html>
