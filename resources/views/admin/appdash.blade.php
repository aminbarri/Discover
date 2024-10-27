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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="d-flex flex-row container-t ">
       
    <div class="nav-list "> 
        <div class="nav-list-d">
            <span class='hide-text'>  <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" width= '108px'>
            
        </a></span>
        <i class="bi bi-arrow-bar-left"></i> <i class="bi bi-arrow-bar-right"></i>

        </div>
       
        @include('admin.list')
    </div>
      
     <div class=" content-elemen">
            @include('admin.navv')
        
      
            
            <div class="content">
                @yield('content')
            </div>
        
           
           
            
       
        
        @include('../layouts.footer')

      </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
  
</body>
</html>