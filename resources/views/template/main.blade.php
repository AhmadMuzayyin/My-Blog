<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Sweet Alert & Toastr -->
    <link rel="stylesheet" href="{{ url('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/toastr/toastr.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}"> --}}

    <title>{{ $title }}!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger text-white">
        <div class="container">
            <a class="navbar-brand" href="#">MY BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  {{ $active === 'home' ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'about' ? 'active' : '' }}"
                            href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'blog' ? 'active' : '' }}"
                            href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}"
                            href="{{ url('/categories') }}">Categories</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-sm-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/dashboard') }}">My Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'login' ? 'active' : '' }}"
                                href="{{ url('/login') }}">Login</a>
                        </li>
                    @endauth
                </ul>


            </div>
        </div>
    </nav>


    @yield('content')

    {{-- <footer class="footer mt-auto py-3 bg-info">
        <div class="container">
            <span class="text-light">Place sticky footer content here.</span>
        </div>
    </footer> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="{{ url('/assets/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ url('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="{{ url('/assets/js/sweetalert.min.js') }}"></script> --}}
    <!-- jQuery -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ url('/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ url('/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    {{-- <script src="{{ url('/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ url('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ url('/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('/dist/js/adminlte.min.js') }}"></script> --}}

    @stack('JS')
</body>

</html>
