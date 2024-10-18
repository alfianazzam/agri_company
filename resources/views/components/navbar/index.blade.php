<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<a class="navbar-brand" href="{{ url('/') }}" style="display: flex; align-items: center;">
    <img src="{{ asset('storage/' . $company->logo_url) }}" alt="Logo" style="height: 3rem; margin-right: 1.5rem;">
    <b>Agro</b> <span style="font-weight: 100; font-size: 2rem;">Kreatif</span>
</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" style="{{ Request::is('/') ? 'color: white;' : '' }}">
                        Home
                    </a>
                </li>
                
                <li class="{{ Request::is('about') ? 'active' : '' }}">
                    <a href="/about">About</a>
                </li>

                <li class="dropdown {{ Request::is('project') ? 'active' : '' }}">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Project</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/project">All Projects</a>
                        </li>
                        @foreach (App\Models\Project::all() as $projects)
                        <li>
                            <a href="/project/{{ $projects->id }}">{{ $projects->jumbotron_title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown {{ Request::is('gallery') ? 'active' : '' }}">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Gallery</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/gallery">Galleries</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ Request::is('poster') || Request::is('agenda') ? 'active' : '' }}">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">News</a>
                    <ul class="dropdown-menu">
                        <li><a href="/poster">Poster</a></li>
                        <li><a href="/agenda">Agenda</a></li>
                    </ul>
                </li>

                @if (Auth::check())
                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li class="dropdown-item p-2">
                            <a class="mb-0">Welcome, {{ Auth::user()->name }}</a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </li>
                @else
                @if (request()->hasCookie('user_email'))
                    {{ Cookie::queue(Cookie::forget('user_email')) }}
                @endif
                <li>
                    <a class="btn" href="{{ url('/register') }}" style="{{ Request::is('register') ? 'color: white;' : '' }}">
                        Sign Up
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown search-item">
                    <a class="nav-link" href="#" id="search-toggle" role="button">
                        <i class="fa fa-search"></i>
                    </a>
                    <div id="search-form" class="widget" style="display: none; min-width: 300px; background-color: rgba(255, 255, 255, 0); border-radius: 8px; padding:10px;">
                        <form role="form" action="{{ route('search') }}" method="GET">
                            <div class="search-box">
                                <input class="form-control" type="text" name="query" placeholder="Search..." required>
                                <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.getElementById('search-toggle');
    const searchForm = document.getElementById('search-form');

    // Click event to toggle the search box
    searchToggle.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default anchor click behavior
        if (searchForm) {
            // Toggle display of the search form
            searchForm.style.display = (searchForm.style.display === 'none' || searchForm.style.display === '') ? 'block' : 'none';
        } else {
            console.error('Search form element not found');
        }
    });
});
</script>