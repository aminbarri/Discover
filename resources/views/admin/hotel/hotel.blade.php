


@extends('admin.appdash')

@section('main', 'Add  Holet')
@section('content')

<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Add New Hotel</h2>
        <form action="{{ route('hotels_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nom">Hotel Name</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter hotel name">
            </div>

            <div class="form-group mb-3">
                <label for="ville">City</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Enter city">
            </div>

            <div class="form-group mb-3">
                <label for="carte">Map URL</label>
                <input type="text" class="form-control" id="carte" name="carte" placeholder="Enter map URL">
            </div>

            <div class="form-group mb-3">
                <label for="chambre">Number of Rooms</label>
                <input type="number" class="form-control" id="chambre" name="chambre" placeholder="Enter number of rooms">
            </div>

            <div class="form-group mb-3">
                <label for="classe">Class</label>
                <input type="number" class="form-control" id="classe" name="classe" placeholder="Enter class rating">
            </div>

            <div class="form-group mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
            </div>

            <div class="form-group mb-3">
                <label for="prix">Price</label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Enter price">
            </div>

            <div class="form-group mb-3">
                <label for="img1">Image 1</label>
                <input type="file" class="form-control" id="img1" name="img1">
            </div>

            <div class="form-group mb-3">
                <label for="img2">Image 2</label>
                <input type="file" class="form-control" id="img2" name="img2">
            </div>

            <div class="form-group mb-3">
                <label for="img3">Image 3</label>
                <input type="file" class="form-control" id="img3" name="img3">
            </div>

            <button type="submit" class="btn btn-primary w-100">Add</button>
        </form>
    </div>
</div>


@endsection
