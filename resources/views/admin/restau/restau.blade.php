@extends('admin.appdash')

@section('main', 'Add  Restaurant')
@section('content')

<div class="container">
    <div class="form-container card shadow-sm p-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h3 class="text-center">Add Restaurant</h3>
        <form action="{{ route('restau_store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nom">Restaurant Name</label>
                <input type="text" class="form-control" id="nom" name="nom" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="ville">City</label>
                <input type="text" class="form-control" id="ville" name="ville" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" maxlength="1000" required>
            </div>

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

            <div class="form-group">
                <label for="carte">Menu (Carte)</label>
                <input type="text" class="form-control" id="carte" name="carte" maxlength="1000" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Add Restaurant</button>
        </form>
    </div>
</div>


@endsection
