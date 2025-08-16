<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('main') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.mindd.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <div class="admin-layout d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="nav-list">
                @include('admin.secondList')
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="main-content d-flex flex-column">
            <!-- Top Navigation -->
            <div class="top-nav">
                @include('admin.navv')
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper ">
                <!-- Main Content -->
                <div class="content-element">
                    <div class="content p-4">
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                @include('../layouts.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
