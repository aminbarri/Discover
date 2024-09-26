<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('main')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100 ">
        @include('layouts.navbar')

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

        @include('layouts.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
