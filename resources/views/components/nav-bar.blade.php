<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('visitors.index') }}">CederLinks</a>
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
                        'Services' => 'visitors.services'
                    ];
                @endphp
                @foreach($links as $pageName => $route)
                    <li class="nav-item @if(Route::is($route)) active @endif">
                        <a href="{{ route($route) }}" class="nav-link">{{ $pageName }}</a>
                    </li>
                @endforeach
                <li class="nav-item"><a href="attorneys.html" class="nav-link">Team</a></li>
                <li class="nav-item"><a href="calender.html" class="nav-link">Missions</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Upcoming</a></li>
                <li class="nav-item"><a href="partners.html" class="nav-link">Partners</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-item cta">
                    <a id="auth-modal-show" href="/#" class="nav-link">Member Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
