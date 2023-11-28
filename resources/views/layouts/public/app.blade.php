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

    <link rel="stylesheet" href="{{ asset('css/public.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'BioControl') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(!str_contains(Route::currentRouteName(),'login') && !str_contains(Route::currentRouteName(),'register'))

            <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100 h-100 text-center invert-nav-item @if(str_contains(Route::currentRouteName(),'dados')) bg-success @endif">
                                <a class="nav-link text-light" href="{{ route('dados.index') }}">
                                    DADOS
                                </a>
                            </li>
                            <li class="nav-item w-100 h-100 text-center invert-nav-item @if(str_contains(Route::currentRouteName(),'adocoes')) bg-success @endif">
                                <a class="nav-link text-light" href="{{ route('adocoes.index') }}">
                                    ADOÇÃO SOLIDÁRIA
                                </a>
                            </li>
                            <li class="nav-item w-100 h-100 text-center invert-nav-item @if(str_contains(Route::currentRouteName(),'logisticaReversa')) bg-success @endif">
                                <a class="nav-link text-light" href="{{ route('logisticaReversa.index') }}">
                                    LOGÍSTICA REVERSA
                                </a>
                            </li>
                            <li class="nav-item w-100 h-100 text-center invert-nav-item @if(str_contains(Route::currentRouteName(),'contatos')) bg-success @endif">
                                <a class="nav-link text-light" href="{{ route('contatos.index') }}">
                                    CONTATOS
                                </a>
                            </li>
                            <li class="nav-item w-100 h-100 text-center invert-nav-item @if(str_contains(Route::currentRouteName(),'ocorrencias')) bg-success @endif">
                                <a class="nav-link text-light" href="{{ route('ocorrencias.index') }}">
                                    OCORRÊNCIAS
                                </a>
                            </li>
                            <li class="nav-item w-100 h-100 text-center invert-nav-item">
                                <a class="nav-link text-light" href="{{ route('user.home') }}">
                                    ÁREA LOGADA
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
