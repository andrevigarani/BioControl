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
    <div id="app">
        <nav class="position-fixed col-md-2 d-none d-md-block bg-dark sidebar navbar-light shadow-sm overflow-y-auto" style="height: 100vh;">
            <div class="sidebar-sticky container">

                <ul class="nav flex-column pt-3">
                    <li class="nav-item invert-nav-item">
                        <a class="nav-link text-light" href="{{ url('/') }}">
                            {{ config('app.name', 'BioControl') }}
                        </a>
                    </li>
                </ul>

                <hr class="border-white">

                <ul class="nav flex-column">
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.animais')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.animais.index') }}">
                            Animais
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.vacinas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.vacinas.index') }}">
                            Vacinas
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.doencas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.doencas.index') }}">
                            Doenças
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.especies')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.especies.index') }}">
                            Espécies
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.racas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.racas.index') }}">
                            Raças
                        </a>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'pessoa_juridicas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.pessoa_juridicas.index') }}">
                            Pessoa Jurídica
                        </a>
                    </li>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'abrigos')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.abrigos.index') }}">
                            Abrigos
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'clinicaveterinas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.clinicasVeterinarias.index') }}">
                            Clínica Veterinária
                        </a>
                    </li>

                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.pessoa_juridicas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.pessoa_juridicas.index') }}">
                            Pessoa Jurídica
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.abrigos')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.abrigos.index') }}">
                            Abrigos
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.clinicaveterinas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.clinicasVeterinarias.index') }}">
                            Clínica Veterinária
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.contatos')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.contatos.index') }}">
                            Contatos
                        </a>
                    </li>
                    <li class="nav-item invert-nav-item @if(str_contains(Route::currentRouteName(),'user.dicas')) bg-secondary @endif">
                        <a class="nav-link text-light" href="{{ route('user.dicas.index') }}">
                            Dicas
                        </a>
                    </li>
                </ul>

                <hr class="border-white">

                <ul class="nav flex-column position-absolute bottom-0 mb-4">
                    <li class="nav-item invert-nav-item">
                        <a class="nav-link text-light" href="{{ route('logout') }}"
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

        <main class="col-md-10 p-3 offset-2">
            @yield('content')
        </main>
    </div>
</body>
</html>
