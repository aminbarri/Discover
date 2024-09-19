<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add  Voyage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
 
    <div class="container">
        <div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <h3 class="text-center">Add voyage</h3>
            <form method="POST" action="{{ route('voyage_store') }}" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="ville_depart" class="form-label">Ville Depart</label>
                    <input type="text" class="form-control" id="ville_depart" name="ville_depart" required>
                </div>
        
                <div class="mb-3">
                    <label for="ville_arrive" class="form-label">Ville Arrive</label>
                    <input type="text" class="form-control" id="ville_arrive" name="ville_arrive" required>
                </div>
        
                <div class="mb-3">
                    <label for="trajet" class="form-label">Trajet</label>
                    <textarea class="form-control" id="trajet" name="trajet" rows="3" required></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="date_depart" class="form-label">Date Depart</label>
                    <input type="date" class="form-control" id="date_depart" name="date_depart" required>
                </div>
        
                <div class="mb-3">
                    <label for="heure_depart" class="form-label">Heure Depart</label>
                    <input type="time" class="form-control" id="heure_depart" name="heure_depart" required>
                </div>
        
                <div class="mb-3">
                    <label for="dure" class="form-label">Dure </label>
                    <input type="number" class="form-control" id="dure" name="dure" required>
                </div>
        
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div>
        
                <div class="mb-3">
                    <label for="carte" class="form-label">Carte</label>
                    <input type="text" class="form-control" id="carte" name="carte">
                </div>
        
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                </div>
        
               
        
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
    

    @include('layouts.footer')
    </div>  
</body>
</html>
