<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        @include('layouts.navbar')
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header custom-bg text-center">
                        <h4>Sign Up</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name='name'placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn custom-btn btn-block text-white">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        @include('layouts.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
