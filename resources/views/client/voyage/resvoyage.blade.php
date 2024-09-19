<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserv</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
     {{$voyage->trajet}}
     <form action="{{route('reservationv_store')}}" method="POST">
        @csrf
        
        <!-- Phone Field -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>
        
        <!-- Type Field -->
      
        
        <!-- Number of Persons Field -->
        <input type="number" class="form-control" id="id_voyage" name="id_voyage" value="{{$voyage->id_voy}}" hidden>
        <div class="form-group">
            <label for="nmbre_perssone">Number of Persons</label>
            <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
        </div>
        
        
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    </div>
    </div>
        @include('layouts.footer')
    </div>
      

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
