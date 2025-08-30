<nav class="navbar navbar-expand-lg navbar-custom navbar-light">
    <div class="container">
        <a class="navbar-brand ps-3 ps-md-0" href="{{ route('main') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler pe-3" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ps-3 ps-md-0" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('main') ? 'active' : '' }}" href="{{ route('main') }}">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('hotels_index') ? 'active' : '' }}" href="{{ route('hotels_index') }}">HOTELS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('dest_client') ? 'active' : '' }}" href="{{ route('dest_client') }}">DESTINATION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('restau_client') ? 'active' : '' }}" href="{{ route('restau_client') }}">RESTAURANT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('voyage_index') ? 'active' : '' }}" href="{{ route('voyage_index') }}">VOYAGE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('message_create') ? 'active' : '' }}" href="{{ route('message_create') }}">CONTACT</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('login') }}">SE CONNECTER</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            LOG OUT
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @if (Auth::user()->type == 'admin')
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('dashboard') }}">
                                DASHBOARD
                            </a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
