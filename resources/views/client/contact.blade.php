<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('main')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        @include('layouts.navbar')
        <div class="container">
        <div class="form-container  mt-4">
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <form action="{{ route('message_store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group mb-3">
                <label for="sujet">Sujet</label>
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Enter the subject" value="{{ old('sujet') }}" required>
                @error('sujet')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group mb-3">
                <label for="content">Message</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter your message" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
          </div>
    </div>
        @include('layouts.footer')
    </div>
      

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
