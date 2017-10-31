<header class="header clearfix">
    <nav>
        <ul class="nav nav-pills float-right">
            @if(Sentinel::check())
                <li class="nav-item">
                    <form action="/logout" method="POST" id="logout-form">
                        {{csrf_field()}}

                        <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif

        </ul>
    </nav>
    <h3 class="text-muted">
    @if(Sentinel::check())
        Hello,{{ Sentinel::getUser()->first_name }}
    @else
        Authentication with sentinel
    @endif
    </h3>
</header>