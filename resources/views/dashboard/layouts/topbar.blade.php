@section('topbar')
<header id="topbar" class="topbar sticky-top">
    <nav class="navbar">
        <div class="navbar-header">
            <div class="navbar-brand">
                <h2>Kreatip</h2>
            </div>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            </ul>
            <ul class="navbar-nav float-right">
                <li>
                    <a class="nav-link dropdown-toggle mr-3" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('storage/profile/img/' . Auth::user()->img) }}" class="rounded-circle"
                            width="40">
                        <span class="ml-2 d-none d-lg-inline-block">Hello, {{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/dashboard/profile"><i
                                class="far fa-user ml-1 mr-2"></i>Profile</a>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-power-off ml-1 mr-1"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
@endsection