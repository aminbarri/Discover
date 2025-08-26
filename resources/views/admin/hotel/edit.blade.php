@extends('admin.appdash')

@section('main', 'Edit Hotel')
@section('content')


<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Edit Hotel</h2>
        <form action="{{ route('hotels_update', $hotels->id_hotel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nom">Hotel Name</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{$hotels->nom}}">
            </div>

            <div class="form-group mb-3">
                <label for="ville">City</label>
                <input type="text" class="form-control" id="ville" name="ville" value="{{$hotels->ville}}">
            </div>

            <div class="form-group mb-3">
                <label for="carte">Map URL</label>
                <input type="text" class="form-control" id="carte" name="carte" value="{{$hotels->carte}}">
            </div>

            <div class="form-group mb-3">
                <label for="chambre">Number of Rooms</label>
                <input type="number" class="form-control" id="chambre" name="chambre" value="{{$hotels->chambre}}">
            </div>

            <div class="form-group mb-3">
                <label for="classe">Class</label>
                <input type="number" class="form-control" id="classe" name="classe" value="{{$hotels->classe}}">
            </div>

            <div class="form-group mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{$hotels->location}}">
            </div>

            <div class="form-group mb-3">
                <label for="prix">Price</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{$hotels->prix}}">
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
            <div class="form-group mb-3">
            <label for="">Living room</label>
            <select name="living_room" class="form-select" aria-label="Large select example">
                <option value="1" {{ $hotels->living_room != 0 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $hotels->living_room == 0 ? 'selected' : '' }}>No</option>
            </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Kitchen</label>
                <select name="kitchen" class="form-select" aria-label="Large select example">
                    <option value="1" {{ $hotels->kitchen != 0 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $hotels->kitchen == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Parking</label>
                <select name="free_parking" class="form-select" aria-label="Large select example">
                    <option value="1" {{ $hotels->free_parking != 0 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $hotels->free_parking == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Swimming Pool</label>
                <select name="swimming_pool" class="form-select" aria-label="Large select example">
                    <option value="1" {{ $hotels->swimming_pool != 0 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $hotels->swimming_pool == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Refrigerator</label>
                <select name="refrigerator" class="form-select" aria-label="Large select example">
                    <option value="1" {{ $hotels->refrigerator != 0 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $hotels->refrigerator == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Pets</label>
                <select name="pets_allowed" class="form-select" aria-label="Large select example">
                    <option value="1" {{ $hotels->pets_allowed != 0 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $hotels->pets_allowed == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>

@endsection
