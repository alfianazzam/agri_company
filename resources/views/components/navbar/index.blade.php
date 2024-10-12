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
                             <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Tentang kami</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Static Image Header</a>
                            <ul class="dropdown-menu">
                                <li><a href="index_mp_fullscreen_static.html">Fulscreen</a></li>
                                <li><a href="index_mp_classic_static.html">Classic</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Flexslider Header</a>
                            <ul class="dropdown-menu">
                                <li><a href="index_mp_fullscreen_flexslider.html">Fulscreen</a></li>
                                <li><a href="index_mp_classic_flexslider.html">Classic</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Video Background Header</a>
                            <ul class="dropdown-menu">
                                <li><a href="index_mp_fullscreen_video_background.html">Fulscreen</a></li>
                                <li><a href="index_mp_classic_video_background.html">Classic</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Text Rotator Header</a>
                            <ul class="dropdown-menu">
                                <li><a href="index_mp_fullscreen_text_rotator.html">Fulscreen</a></li>
                                <li><a href="index_mp_classic_text_rotator.html">Classic</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Gradient Overlay Header</a>
                            <ul class="dropdown-menu">
                                <li><a href="index_mp_fullscreen_gradient_overlay.html">Fulscreen</a></li>
                                <li><a href="index_mp_classic_gradient_overlay.html">Classic</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Proyek</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">About</a>
                            <ul class="dropdown-menu">
                                <li><a href="about1.html">About 1</a></li>
                                <li><a href="about2.html">About 2</a></li>
                                <li><a href="about3.html">About 3</a></li>
                                <li><a href="about4.html">About 4</a></li>
                                <li><a href="about5.html">About 5</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
                            <ul class="dropdown-menu">
                                <li><a href="service1.html">Service 1</a></li>
                                <li><a href="service2.html">Service 2</a></li>
                                <li><a href="service3.html">Service 3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Pricing</a>
                            <ul class="dropdown-menu">
                                <li><a href="pricing1.html">Pricing 1</a></li>
                                <li><a href="pricing2.html">Pricing 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Gallery</a>
                            <ul class="dropdown-menu">
                                <li><a href="gallery_col_2.html">2 Columns</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Contact</a>
                            <ul class="dropdown-menu">
                                <li><a href="contact1.html">Contact 1</a></li>
                                <li><a href="contact2.html">Contact 2</a></li>
                                <li><a href="contact3.html">Contact 3</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Restaurant menu</a>
                            <ul class="dropdown-menu">
                                <li><a href="restaurant_menu1.html">Menu 2 Columns</a></li>
                                <li><a href="restaurant_menu2.html">Menu 3 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="login_register.html">Login / Register</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="404.html">Page 404</a></li>
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
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Article</a>
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
