<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

 
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #96A78D;">
            <div class="container">
                <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
                    Citas Médicas Rurales
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Izquierda -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if(auth()->user()->rol === 'paciente')
                                <li><a class="nav-link text-white" href="{{ route('paciente.inicio') }}">Mis citas</a></li>
                                <li><a class="nav-link text-white" href="#">Buscar médicos</a></li>
                            @elseif(auth()->user()->rol === 'medico')
                                <li><a class="nav-link text-white" href="{{ route('medico.inicio') }}">Agenda de hoy</a></li>
                            @elseif(auth()->user()->rol === 'centro')
                                <li><a class="nav-link text-white" href="{{ route('centro.inicio') }}">Panel del centro</a></li>
                            @elseif(auth()->user()->rol === 'admin')
                                <li><a class="nav-link text-white" href="{{ route('admin.inicio') }}">Panel admin</a></li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Derecha -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li><a class="nav-link text-white" href="{{ route('login') }}"></a></li>
                            <li><a class="nav-link text-white" href="{{ route('register') }}"></a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white fw-bold" href="#" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }} ({{ Auth::user()->rol }})
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
