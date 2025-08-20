<nav class="navbar custom-navbar">
        <div class=" flex-row d-flex w-100">
            <div class="nav-list-d">
                <a class="navbar-brand" href="#">
                 <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo" width= '108px'>
                </a>
            </div>
            <div class="dropdown dropstart">
                @if ($profile->img)
                 <img class=" rounded-circle " style="width: 50px; height: 50px;" src="{{asset(auth()->user()->img)}}" alt="" id="dropdownUser12" data-bs-toggle="dropdown" aria-expanded="false">
                @else
                <i class="bi bi-person-circle m-2 fs-2 text-light cursor-pointer " id="dropdownUser12" data-bs-toggle="dropdown" aria-expanded="false"></i>
                @endif
                <ul class="dropdown-menu  text-small shadow">
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
    </nav>
<style>
    .cursor-pointer{
        cursor: pointer;
    }
</style>
