<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quick Quiz</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('public/asset/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/asset/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
 
</head>

<body>
    <div id="app">

        @guest

            @if (Route::has('login'))
                @if (url()->current() !== url('/login') && url()->current() !== url('/register'))
                    <script>
                        window.location.href = "{{ url('/login') }}";
                    </script>
                @endif

                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @endif
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif

            @if (Route::has('register'))
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest




                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-4">
                    @yield('content')
                </main>
            @endif
        @else
            @if (Route::has('login'))
            @endif
            <div class="wrapper">

                <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
                    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                        width="60" style="display: none;">
                </div>

                @include('layouts.admin.header')
                @include('layouts.admin.sidebar')

                @yield('content')

                <div id="sidebar-overlay"></div>
            </div>



            <!-- <li class="nav-item dropdown"> -->
            <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> -->
            <!-- {{ Auth::user()->name }} -->
            <!-- </a> -->

            <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> -->
            <!-- <a class="dropdown-item" href="{{ route('logout') }}" -->
            <!-- onclick="event.preventDefault(); -->
                                                     <!-- document.getElementById('logout-form').submit();"> -->
            <!-- {{ __('Logout') }} -->
            <!-- </a> -->

            <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> -->
            <!-- @csrf -->
            <!-- </form> -->
            <!-- </div> -->
            <!-- </li> -->
        @endguest

    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="{{ asset('//cdn.datatables.net/2.1.4/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/sparkline.js') }}"></script>
    <script src="{{ asset('public/asset/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('public/asset/js/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/moment.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/asset/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('public/asset/js/adminlte.js?v=3.2.0') }}"></script>
    <script src="{{ asset('public/asset/js/pages/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
