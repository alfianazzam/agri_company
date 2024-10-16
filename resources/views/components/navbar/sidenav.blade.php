<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-left"></i></div>
                    Back to Home
                </a>

                <a class="nav-link {{ request()->is('/admin') ? 'active' : '' }}" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                    Message Dashboard
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
                            <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div> <!-- Ganti dengan ikon gambar -->
                            Jumbotron
                        </a>
                        <a class="nav-link {{ request()->is('admin/about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div> <!-- Ganti dengan ikon kartu alamat -->
                            About
                        </a>
                        <a class="nav-link {{ request()->is('admin/feature') ? 'active' : '' }}" href="{{ route('feature.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div> <!-- Ganti dengan ikon bintang -->
                            Features
                        </a>
                        <a class="nav-link {{ request()->is('admin/testimonial') ? 'active' : '' }}" href="{{ route('testimonial.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div> <!-- Ganti dengan ikon komentar -->
                            Testimonial
                        </a>
                        <a class="nav-link {{ request()->is('admin/team-member') ? 'active' : '' }}" href="{{ route('team.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div> <!-- Ganti dengan ikon pengguna -->
                            Team Members
                        </a>
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
                            <div class="sb-nav-link-icon"><i class="fas fa-image me-1"></i></div> 
                            Gallery
                        </a>
                        <a class="nav-link {{ request()->is('agenda.admin') ? 'active' : '' }}" href="{{ route('agenda.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt me-1"></i></div> 
                            Agenda
                        </a>
                        <a class="nav-link {{ request()->is('project.admin') ? 'active' : '' }}" href="{{ route('project.admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase me-1"></i></div>
                            Project
                        </a>
                    </nav>
                </div>

                <a class="nav-link {{ request()->is('company.index') ? 'active' : '' }}" href="{{ route('company.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                    Configuration
                </a>
            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin Agro Kreatif
        </div>
    </nav>
</div>
