<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserv</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
    
     <div class="post">
        @if($hotel->img1)
        <img src="{{ asset($hotel->img1) }}" alt="Hotel Image 1"  class="post-img">
        @endif
        <h2 class="post-title">{{ ($hotel->nom) }}</h2>
        <div class="post-meta">
            <i class="fas fa-star"></i> 4.3 (2.6K) · 2-star hotel · Fes, Morocco
        </div>
        <p class="post-content">
            MIA Hotels Fes offers straightforward lodging with free Wi-Fi, making it perfect for travelers who want an affordable, no-fuss experience. With spacious parking and proximity to local attractions, it's an ideal choice for families and tourists alike. Enjoy clean, comfortable rooms and convenient amenities without breaking the bank.
        </p>
       <a href="#reservation" class="reserver">reserver</a>
    </div>


     <div id="reservation">

     
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
    </div>
        @include('layouts.footer')
    </div>
      

    <script>
      $(".reserver").click(function() {
    var reservationDiv = $("#reservation");

    // Check if the display property is 'block'
    if (reservationDiv.css("display") === "block") {
        reservationDiv.css("display", "none");
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    } else {
        reservationDiv.show();
        $('html, body').animate({ scrollTop: $(document).height() }, 'slow');

    }
});
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 

</body>
</html>
