@extends('admin.appdash')

@section('main', 'edit plat')
@section('content')


<div class="container">
    <div class="form-container">
        <h2>edit Plat</h2>
         @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
   <form action="{{ route('plat_update',$plat->id_plat) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $plat->nom }}" required>

    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control " id="description" name="description" rows="3" required>{{ $plat->description }}</textarea>

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

    <button type="submit" class="btn btn-primary w-100">Add Plat</button>
</form>
    </div>
</div>


@endsection
