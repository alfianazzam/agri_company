<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Agro Kreatif</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}" 
                        style="{{ Request::is('/') ? 'color: white;' : '' }}">
                        Beranda
                    </a>
                </li>
                
                <li>
                    <a href="/about">Tentang kami</a>
                </li>

               <li class="dropdown">
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



                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Gallery</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/gallery">Galleries</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">News</a>
                    <ul class="dropdown-menu">
                        <li><a href="/poster">Poster</a></li>
                        <li><a href="/agenda">Agenda</a></li>
                    </ul>
                </li>
                    <!-- Tambahkan item navigasi lain di sini -->
                    <!-- User authentication menu -->
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

                    <li>
                        <a class="nav-link" href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>


            </ul>
        </div>
    </div>
</nav>
