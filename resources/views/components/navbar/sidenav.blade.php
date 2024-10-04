            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="/">
                        <div class="sb-nav-link-icon"><i class="fas fa-arrow-left"></i></div>
                        Back to Home
                    </a>
                    <div class="sb-sidenav-menu-heading">Main</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Content Management</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link py-2 ps-4" href="/landing"><i class="fas fa-rocket me-2"></i> Landing Page</a>
                            <a class="nav-link py-2 ps-4" href="layout-sidenav-light.html"><i class="fas fa-sun me-2"></i> Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed py-2 ps-4" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                <i class="fas fa-user-lock me-2"></i> Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link py-2 ps-5" href="login.html"><i class="fas fa-sign-in-alt me-2"></i> Login</a>
                                    <a class="nav-link py-2 ps-5" href="register.html"><i class="fas fa-user-plus me-2"></i> Register</a>
                                    <a class="nav-link py-2 ps-5" href="password.html"><i class="fas fa-key me-2"></i> Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed py-2 ps-4" href="#" data-bs-toggle="collapse " data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                <i class="fas fa-exclamation-triangle me-2"></i> Error Pages <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link py-2 ps-5" href="401.html"><i class="fas fa-ban me-2"></i> 401 Page</a>
                                    <a class="nav-link py-2 ps-5" href="404.html"><i class="fas fa-question-circle me-2"></i> 404 Page</a>
                                    <a class="nav-link py-2 ps-5" href="500.html"><i class="fas fa-bug me-2"></i> 500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
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

            <script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mendapatkan path dari URL saat ini
    function getCurrentPath() {
        return window.location.pathname;
    }

    // Fungsi untuk mengatur menu aktif
    function setActiveMenu() {
        const currentPath = getCurrentPath();
        const menuItems = document.querySelectorAll('.nav-link');

        menuItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('active');
            }
        });

        // Untuk sub-menu
        if (currentPath.includes('/landing')) {
            document.querySelector('#menu-landing').classList.add('active');
            document.querySelector('#collapseLayouts').classList.add('show');
        } else if (currentPath.includes('/layout-sidenav-light')) {
            document.querySelector('#menu-light-sidenav').classList.add('active');
            document.querySelector('#collapseLayouts').classList.add('show');
        }
        // Tambahkan kondisi lain untuk sub-menu yang lain jika diperlukan
    }

    // Panggil fungsi setActiveMenu saat halaman dimuat
    setActiveMenu();
});
</script>