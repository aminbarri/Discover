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
                    <a class="nav-link fw-medium {{ request()->routeIs('main') ? 'active' : '' }}" href="{{ route('main') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('hotels_index') ? 'active' : '' }}" href="{{ route('hotels_index') }}">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('dest_client') ? 'active' : '' }}" href="{{ route('dest_client') }}">Destination</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('restau_client') ? 'active' : '' }}" href="{{ route('restau_client') }}">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('voyage_index') ? 'active' : '' }}" href="{{ route('voyage_index') }}">Trip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->routeIs('message_create') ? 'active' : '' }}" href="{{ route('message_create') }}">Contact</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('login') }}">Log In</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @if (Auth::user()->type == 'admin')
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @endif

                @endguest
                @auth
                    <li>
                        <div class="dropdown dropstart cursor-pointer rounded-circle border ">
                            @if (auth()->user()->img)
                            <img class=" rounded-circle " style="width: 35px; height: 35px;" src="{{asset(auth()->user()->img)}}" alt="" id="dropdownUser12" data-bs-toggle="dropdown" aria-expanded="false">
                            @else
                            <i class="bi bi-person-circle m-2 fs-2 text-light cursor-pointer " id="dropdownUser12" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            @endif
                        </div>
                    </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
