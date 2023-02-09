@extends('layouts.app')
@section('content')


    <h1 class="fw-bold text-center">Page d'arcticle</h1>
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
          <p class="col">${article.description}</p>
          <a class="col" href="${article.url}" target="_blank">Lire l'article complet</a>
        </div>
    </div>
      `;
    });

    newsContainer.innerHTML = newsHTML;
})
  .catch(error => console.error(error));
        </script>
@endsection()

