
<div class="col-md-4 mb-4">
    <div class="card shadow-sm border-0 rounded-3 h-100">
        {{-- Image --}}
        @if($destination->img1)
            <img src="{{ asset('storage/'.$destination->img1) }}" class="card-img-top rounded-top" alt="{{ $destination->nom }}">
        @else
            <img src="{{ asset('img/default.jpg') }}" class="card-img-top rounded-top" alt="Default">
        @endif

        {{-- Card Body --}}
        <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">{{ $destination->nom }}</h5>
            <p class="text-muted mb-1">
                <i class="bi bi-geo-alt-fill"></i> {{ $destination->ville }}, {{ $destination->province }}
            </p>
            <p class="card-text text-truncate" style="max-width: 100%;">{{ $destination->description }}</p>

            {{-- Footer --}}
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Updated {{ $destination->date_modification->format('d M Y') }}
                </small>
                <a href="{{ route('restaurants.show', $destination->id) }}" class="btn btn-sm btn-primary">
                    View
                </a>
            </div>
        </div>
    </div>
</div>
