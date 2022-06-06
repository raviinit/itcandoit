<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><b>ITcandoit</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('coupons') }}">Coupons</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('users') }}">Users</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" style="float: right">
            <ul class="navbar-nav">
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</nav>
