<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('visitors.index') }}">Ceder Links</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @php
                    $links = [
                        'Home' => 'visitors.index',
                        'About' => 'visitors.about',
                        'Services' => 'visitors.services',
                        'Team' => 'visitors.team',
                        'Partners' => 'visitors.partners',
                        'Contact' => 'visitors.contact'
                    ];
                @endphp
                @foreach($links as $pageName => $route)
                    <li class="nav-item @if(Route::is($route)) active @endif">
                        <a href="{{ route($route) }}" class="nav-link">{{ $pageName }}</a>
                    </li>
                @endforeach

                @guest
                    <li class="nav-item cta">
                        <a href="/#" class="nav-link _auth-modal-show">Member Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="border-bottom: 1px solid #f2f2f2; padding-left: 5px">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->type === "admin" || Auth::user()->type === "superadmin")
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Administrate</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
