<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="app-navbar">
            <div class="navbar-container">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="navbar-brand" style="display:flex; align-items:center; gap:10px;">
                    <img src="{{ asset('images/pikachu.png') }}" alt="Pikachu" style="height:40px;">
                    <span>Pokémons</span>
                </a>

                {{-- Bouton mobile --}}
                <button class="navbar-toggle" type="button" onclick="document.getElementById('navMenu').classList.toggle('active')">
                    ☰
                </button>

                {{-- Menu --}}
                <div class="navbar-menu" id="navMenu">

                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-button">Register</a>
                        @endif
                        @else

                            @auth
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    Administration
                                </a>
                            @endauth

                            <div class="nav-user">
                                {{ Auth::user()->name }}
                            </div>

                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-button-danger">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                            </form>

                    @endguest

                </div>

            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
