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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Bootstrap 5 JavaScript Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" type="application/javascript"></script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav">

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
                        <div class="ml-auto d-flex">
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
                            <li class="nav-item">
                                <a class="nav-link" href="/home">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <button id="logout-btn" class="btn btn-link nav-link">{{ __('Logout') }}</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <script>
                                document.getElementById('logout-btn').addEventListener('click', function() {
                                    document.getElementById('logout-form').submit();
                                });
                            </script>
                            @endguest

                        </div>
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
                <li class="nav-item"><a href="/posts" class="nav-link px-2 text-muted">Blog</a></li>
                <li class="nav-item"><a href="/contactForm" class="nav-link px-2 text-muted">Contact</a></li>
                <li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">A Propos</a></li>
            </ul>
        <p class="text-center text-muted">© 2023 AppRiera, Inc</p>
    </footer>
</section>

</body>
</html>
