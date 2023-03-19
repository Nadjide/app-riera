@extends('layouts.app')
@section('content')


    <h1 class="fw-bold text-center">Page d'accueil</h1>
    <hr>
    <section>
        <div>
            @auth
            <h2 class="text-center fw-bold">Bonjour {{ Auth::user()->name }} bienvenue sur le site {{config('app.name', 'Laravel') }}</h2>
            @endauth
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            @guest
            <a href="/login" class="btn btn-dark btn-sm ms-auto" role="button" aria-disabled="true">LOGIN</a>
            <a href="/register" class="btn btn-dark btn-sm ms-auto" role="button" aria-disabled="true">REGISTER</a>
            @else
            <a href="/home" class="btn btn-dark btn-sm ms-auto" role="button" aria-disabled="true">DASHBOARD</a>
            <a href="/posts/create" class="btn btn-dark btn-sm ms-auto" role="button" aria-disabled="true">CREATE POST</a>
            <a href="/posts" class="btn btn-dark btn-sm ms-auto" role="button" aria-disabled="true">BLOG</a>
            @endguest
          </div>
    </section>

    <hr>
    <div id="news-container"></div>
       <script>
        const API_KEY = 'bfbc1feae891427e9afc9f8bc24769ff';
        const API_URL = 'https://newsapi.org/v2';

        fetch(`${API_URL}/top-headlines?country=fr&category=technology&apiKey=${API_KEY}`)
            .then(response => response.json())
            .then(data =>{const newsContainer = document.getElementById("news-container");
            let newsHTML = "";

    data.articles.forEach(article => {
      newsHTML +=`
    <hr>
        <div class="container text-center">
        <div class="row align-items-start">
          <div class="col text-uppercase fw-bold">${article.title}</div>
          <a class="col-auto btn btn-sm btn-dark ms-auto" href="${article.url}" target="_blank">Lire l'article complet</a>
        </div>
    </div>
      `;
    });

    newsContainer.innerHTML = newsHTML;
})
  .catch(error => console.error(error));
        </script>
@endsection()

