
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        @vite(['css/styles.css', 'js/scripts.js'])
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="{{ asset('summernote/summernote-bs5.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('summernote/plugin/databasic/summernote-ext-databasic.css') }}" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        @include('components.navbar.admin')

        <div id="layoutSidenav">

            @include('components.navbar.sidenav')

            <div id="layoutSidenav_content">

                @yield('content') <!-- This will be filled by child views -->

                @include('components.footer.admin')

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="charts/chart-area-demo.js"></script>
    <script src="charts/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    
    <!-- Summernote and Plugins -->
    <script src="{{ asset('summernote/summernote-bs5.min.js') }}"></script>
    <script src="{{ asset('summernote/plugin/databasic/summernote-ext-databasic.js') }}"></script>
    <script src="{{ asset('summernote/plugin/hello/summernote-ext-hello.js') }}"></script>
    <script src="{{ asset('summernote/plugin/specialchars/summernote-ext-specialchars.js') }}"></script>

    </body>
</html>