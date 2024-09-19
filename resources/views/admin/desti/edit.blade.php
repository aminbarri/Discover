<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit  Destination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
 
    
    <div class="container mt-5">
        <h2>Edit Destination</h2>
        <form action="{{ route('dest_update',$destin->id_des) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
            <!-- Nom -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{$destin->nom}}">
            </div>

            <!-- Ville -->
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{$destin->ville}}">
            </div>

            <!-- Province -->
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province" value="{{$destin->province}}">
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{$destin->description}}</textarea>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{$destin->location}}">
            </div>

            <!-- Images -->
            <div class="form-group">
                <label for="img1">Image 1</label>
                <input type="file" class="form-control-file" id="img1" name="img1">
            </div>
            <div class="form-group">
                <label for="img2">Image 2</label>
                <input type="file" class="form-control-file" id="img2" name="img2">
            </div>
            <div class="form-group">
                <label for="img3">Image 3</label>
                <input type="file" class="form-control-file" id="img3" name="img3">
            </div>

        


         
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @include('layouts.footer')
    </div>  
</body>
</html>
