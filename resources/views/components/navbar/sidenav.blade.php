<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-left"></i></div>
                    Back to Home
                </a>

                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link {{ request()->is('/admin') ? 'active' : '' }}" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Content Management</div>
                <a class="nav-link collapsed {{ request()->is('/admin') ? '' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Components
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ request()->is('admin/jumbotron') || request()->is('admin/about') || request()->is('admin/ourworks') ? 'show' : '' }}" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('admin/jumbotron') ? 'active' : '' }}" href="{{ route('jumbotron') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Jumbotron
                        </a>
                        <a class="nav-link {{ request()->is('admin/about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle me-1"></i></div>
                            About
                        </a>
                        {{-- <a class="nav-link {{ request()->is('admin/ourworks') ? 'active' : '' }}" href="{{ route('ouworks') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase me-1"></i></div>
                            Our Works
                        </a> --}}
                    </nav>
                </div>

                <a class="nav-link collapsed {{ request()->is('admin/services') ? '' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ request()->is('poster.admin') || request()->is('admin/agenda') || request()->is('admin/gallery') ? 'show' : '' }}" id="collapseServices" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('poster.admin') ? 'active' : '' }}" href="{{ route('poster.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Poster
                        </a>
                        <a class="nav-link {{ request()->is('gallery.admin') ? 'active' : '' }}" href="{{ route('gallery.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-image me-1"></i></div> <!-- Ikon gambar untuk Galeri -->
                            Gallery
                        </a>
                        <a class="nav-link {{ request()->is('agenda.admin') ? 'active' : '' }}" href="{{ route('agenda.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt me-1"></i></div> <!-- Ganti ikon dengan kalender untuk Agenda -->
                            Agenda
                        </a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link {{ request()->is('charts.html') ? 'active' : '' }}" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>

                <a class="nav-link {{ request()->is('tables.html') ? 'active' : '' }}" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin Agro Kreatif
        </div>
    </nav>
</div>
