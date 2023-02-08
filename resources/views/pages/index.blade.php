@extends('layouts.app')
@section('content')
    <h1>Page d'arcticle</h1>
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
      newsHTML += `
        <div class="news-article">
          <h2>${article.title}</h2>
          <p>${article.description}</p>
          <a href="${article.url}" target="_blank">Lire l'article complet</a>
        </div>
      `;
    });

    newsContainer.innerHTML = newsHTML;
})
  .catch(error => console.error(error));
        </script>
@endsection()

