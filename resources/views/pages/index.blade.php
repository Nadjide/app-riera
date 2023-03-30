@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-center">Page d'accueil</h1>
    <hr>
    <section>
        <div>
            @auth
            <h2 class="text-center">Bonjour {{ Auth::user()->name }} bienvenue sur le site {{config('app.name', 'Laravel') }}</h2>
            @endauth
        </div>
        <div class="d-flex justify-content-center my-4">
            <div class="btn-group">
                @guest
                <a href="/login" class="btn btn-dark" role="button" aria-disabled="true">SE CONNECTER</a>
                <a href="/register" class="btn btn-dark" role="button" aria-disabled="true">S'INSCRIRE</a>
                @else
                <a href="/home" class="btn btn-dark" role="button" aria-disabled="true">TABLEAU DE BORD</a>
                <a href="/posts/create" class="btn btn-dark" role="button" aria-disabled="true">CREER UN POST</a>
                <a href="/posts" class="btn btn-dark" role="button" aria-disabled="true">BLOG</a>
                @endguest
            </div>
        </div>
    </section>

    <div id="news-container"></div>
    <script>
        const API_KEY = 'bfbc1feae891427e9afc9f8bc24769ff';
        const API_URL = 'https://newsapi.org/v2';

        fetch(`${API_URL}/top-headlines?country=fr&category=technology&apiKey=${API_KEY}`)
            .then(response => response.json())
            .then(data => {
                const newsContainer = document.getElementById("news-container");
                let newsHTML = "";

                data.articles.forEach(article => {
                    newsHTML += `
                    <hr>
                    <div class="container text-center">
                        <div class="row align-items-start">
                            <div class="col text-uppercase">${article.title}</div>
                            <a class="col-auto btn btn-sm btn-dark ms-auto" href="${article.url}" target="_blank">Lire l'article complet</a>
                        </div>
                    </div>
                    `;
                });

                newsContainer.innerHTML = newsHTML;
            })
            .catch(error => console.error(error));
    </script>
</div>
@endsection()
