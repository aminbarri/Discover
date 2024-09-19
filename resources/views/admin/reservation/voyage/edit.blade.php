<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
    
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif

       @if (session('success'))
        <div class="alert alert-success">
        {{session()->get('message')}}
        </div>
       @endif
      
      
    
        <h2 class="mb-4">Reseration Edit</h2>
        <form action="{{route('reservationv_update', $reserations->id_vor)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value=" {{$reserations->phone}} " required>
            </div>
            
            <!-- Type Field -->
          
            
            <!-- Number of Persons Field -->
            <div class="form-group">
                <label for="nmbre_perssone">Number of Persons</label>
                <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ $reserations->nmbre_perssone}}" required>
            </div>
            
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
    

    @include('layouts.footer')
    </div>  
</body>
</html>
