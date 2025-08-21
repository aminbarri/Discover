


@extends('admin.appdash')

@section('main', 'Dashboard')
@section('content')
    <div class="container mt-4">
      <div class="row">

        <div class="col-md-4">
            <div class="card shadow text-center border-0">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person-fill"></i> Total Client</h5>
                <h2 class="display-5">{{ $total_client }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow text-center border-0">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-house-door-fill"></i> Total Hotles</h5>
                <h2 class="display-5">{{ $total_hotels }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow text-center border-0">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-shop-window"></i> Total Restaurant</h5>
                <h2 class="display-5">{{ $total_restarant }}</h2>
                </div>
            </div>
        </div>

      </div>
    </div>


@endsection
