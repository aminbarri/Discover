<nav class="navbar navbar-expand-lg navbar-custom navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main') }}">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hotels_index') }}">HOTELS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DESTINATION</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="#">RESTAURANT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">CONTACT</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">SE CONNECTER</a>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        LOG OUT
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
               @endguest
            </ul>
        </div>
    </div>
</nav>