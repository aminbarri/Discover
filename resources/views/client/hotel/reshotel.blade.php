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
     {{$hotel->nom}}
     <form action="{{ route('reservationh_store') }}" method="POST">
        @csrf
        
        <!-- Phone Field -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>
        
        <!-- Type Field -->
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="partagé" {{ old('type') == 'partagé' ? 'selected' : '' }}>Partagé</option>
                <option value="seul" {{ old('type') == 'seul' ? 'selected' : '' }}>Seul</option>
            </select>
        </div>
        
        <!-- Number of Persons Field -->
        <input type="number" class="form-control" id="nmbre_perssone" name="id_hotel" value="{{$hotel->id_hotel}}" hidden>
        <div class="form-group">
            <label for="nmbre_perssone">Number of Persons</label>
            <input type="number" class="form-control" id="nmbre_perssone" name="nmbre_perssone" value="{{ old('nmbre_perssone') }}" required>
        </div>
        
        <!-- Start Date Field -->
        <div class="form-group">
            <label for="date_debut">Start Date</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ old('date_debut') }}" required>
        </div>
        
        <!-- End Date Field -->
        <div class="form-group">
            <label for="date_fin">End Date</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ old('date_fin') }}" required>
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
