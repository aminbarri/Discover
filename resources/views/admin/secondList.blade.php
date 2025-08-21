<!-- resources/views/components/sidebar.blade.php -->
<div class="d-flex flex-column flex-shrink-0 p-3  text-white sidebar" style="width: 280px; min-height: 100vh;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="bi bi-speedometer2 me-2"></i>
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>

    <!-- Dashboard -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i>
                Dashboard
            </a>
        </li>

        <!-- Users Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#usersCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-people me-2"></i>Users</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('showclient', 'profile') ? 'show' : '' }}" id="usersCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('showclient') }}" class="nav-link text-white-50 {{ request()->routeIs('showclient') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>View Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link text-white-50 {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="bi bi-person me-2"></i>Profile
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Hotels Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#hotelsCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-building me-2"></i>Hotels</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('hotels_show', 'hotels_index', 'hotels_create', 'hotels_edit') ? 'show' : '' }}" id="hotelsCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('hotels_show') }}" class="nav-link text-white-50 {{ request()->routeIs('hotels_show') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>Manage Hotels
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hotels_create') }}" class="nav-link text-white-50 {{ request()->routeIs('hotels_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Hotel
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Restaurants Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#restaurantsCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-egg-fill me-2"></i>Restaurants</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('restau', 'restau_client', 'restau_create', 'restau_edit', 'show_single_rest') ? 'show' : '' }}" id="restaurantsCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('restau') }}" class="nav-link text-white-50 {{ request()->routeIs('restau') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>Manage Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('restau_create') }}" class="nav-link text-white-50 {{ request()->routeIs('restau_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Restaurant
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Dishes Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#platsCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-egg-fried me-2"></i>Dishes</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('plat', 'plat_create', 'plat_edit', 'plat_list', 'addplt.show') ? 'show' : '' }}" id="platsCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('plat') }}" class="nav-link text-white-50 {{ request()->routeIs('plat') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>Manage Dishes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('plat_create') }}" class="nav-link text-white-50 {{ request()->routeIs('plat_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Dish
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Destinations Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#destinationsCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-geo-alt me-2"></i>Destinations</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('dest', 'dest_create', 'dest_edit') ? 'show' : '' }}" id="destinationsCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('dest') }}" class="nav-link text-white-50 {{ request()->routeIs('dest') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>Manage Destinations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dest_create') }}" class="nav-link text-white-50 {{ request()->routeIs('dest_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Destination
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Voyages Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#voyagesCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-bag me-2"></i>Voyages</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('voyage', 'voyage_index', 'voyage_create', 'voyage_edit', 'voyage_showsingle') ? 'show' : '' }}" id="voyagesCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('voyage') }}" class="nav-link text-white-50 {{ request()->routeIs('voyage') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>Manage Voyages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('voyage_create') }}" class="nav-link text-white-50 {{ request()->routeIs('voyage_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Voyage
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Reservations Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#reservationsCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-calendar-check me-2"></i>Reservations</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('reservationh_show', 'reservationh_edit', 'reservationv_show', 'reservationv_edit') ? 'show' : '' }}" id="reservationsCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('reservationh_show') }}" class="nav-link text-white-50 {{ request()->routeIs('reservationh_show') ? 'active' : '' }}">
                            <i class="bi bi-building me-2"></i>Hotel Reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reservationv_show') }}" class="nav-link text-white-50 {{ request()->routeIs('reservationv_show') ? 'active' : '' }}">
                            <i class="bi bi-bag me-2"></i>Voyage Reservations
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Messages Management -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#messagesCollapse" role="button" aria-expanded="false">
                <span><i class="bi bi-envelope me-2"></i>Messages</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse {{ request()->routeIs('message', 'message_show', 'message_create') ? 'show' : '' }}" id="messagesCollapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('message') }}" class="nav-link text-white-50 {{ request()->routeIs('message') ? 'active' : '' }}">
                            <i class="bi bi-eye me-2"></i>View Messages
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown">
            @if (auth()->user()->img)
             <img class=" rounded-circle me-2" style="width: 25px; height: 25px;" src="{{asset(auth()->user()->img)}}" alt="" id="dropdownUser12" data-bs-toggle="dropdown" aria-expanded="false">
            @else
             <i class="bi bi-person-circle me-2"></i>
            @endif
            <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Custom CSS for sidebar -->
<style>

.sidebar {
    background-color: #0f5132;
    z-index: 1000;
    overflow-y: auto;
    scrollbar-width: none;
    scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
}

.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    /* background-color: rgba(255, 255, 255, 0.2); */
    background-color: #4CAF50;

    border-radius: 3px;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.nav-link.active {
    background-color: #0d6efd !important;
}

.collapse .nav-link {
    padding-left: 2rem;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100% !important;
        min-height: auto;
    }
}
</style>
