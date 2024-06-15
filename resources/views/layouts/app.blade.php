<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet">

    <style>
        table{
            border-collapse: collapse;
        }
        .form-control:focus{
            border-color: #777777;
            box-shadow: 0 0 0 0.2rem rgba(180, 180, 180, 0.25);
        }
        .pagination > li > a, 
        .pagination > li > span {
             color: #777777; 
        }

        .pagination > .active > a, 
        .pagination > .active > a:focus, 
        .pagination > .active > a:hover, 
        .pagination > .active > span, 
        .pagination > .active > span:focus, 
        .pagination > .active > span:hover { 
            background-color: #000; 
            border-color: #000; 
        }
    </style>
    @livewireStyles()
</head>
<body>

    <?php use Carbon\Carbon; ?>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container -fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    CISO Logbook
                </a>
                @guest
                    @if (Route::has('login'))
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-dark fw-bold rounded d-flex justify-content-center align-items-center">
                                <span class="bi bi-box-arrow-in-right d-flex justify-content-center align-content-center me-2"></span>
                                <span>Login</span>
                            </a>
                        </div>
                    @endif
                @else
                    <div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logs') }}">Logs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('password') }}">Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-decoration-none text-danger"  href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="py-4">
            <div class="row g-0">
                @yield('content')
            </div>
        </main>
    </div>
    @livewireScripts()
</body>
</html>
