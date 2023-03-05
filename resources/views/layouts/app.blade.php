<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="data:image/png;base64,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">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-inverse shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">Page d'accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/posts/create">Ajout post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contactForm">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">Blog</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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
        <div class="container">
            @include('inc.messages')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <section>
        <footer class="py-3 my-4">
 <ul class="nav justify-content-center border-bottom pb-3 mb-3">
     <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
     <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
     <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
     <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
     <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
   </ul>
   <p class="text-center text-muted">© 2023 AppRiera, Inc</p>
 </footer>
     </section>
</body>
</html>
