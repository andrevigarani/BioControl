<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BioControl') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/private.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app" style="display: flex; flex-wrap: wrap">
        <nav class="position-fixed col-md-2 d-none d-md-block bg-dark sidebar navbar-light shadow-sm" style="height: 100vh; overflow-y: auto">
            <div class="sidebar-sticky container">

                <ul class="nav flex-column pt-3">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/') }}">
                            {{ config('app.name', 'BioControl') }}
                        </a>
                    </li>
                </ul>

                <hr class="border-white">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            ANIMAIS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.vacinas.index') }}">
                            VACINAS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            DOENÇAS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.especies.index') }}">
                            ESPÉCIES
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.racas.index') }}">
                            RAÇAS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.contatos.index') }}">
                            CONTATOS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            USUÁRIOS
                        </a>
                    </li>
                </ul>

                <hr class="border-white">

                <ul class="nav flex-column mt-auto position-absolute bottom-0 mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-md-2"></div>
        <main class="col-md-10 p-3">
            @yield('content')
        </main>
    </div>
</body>
</html>
