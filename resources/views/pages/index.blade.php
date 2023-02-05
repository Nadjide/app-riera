@extends('layouts.app')

@section('content')
    <h1>Page d'accueil</h1>
       <script>
        const API_KEY = 'bfbc1feae891427e9afc9f8bc24769ff';
        const API_URL = 'https://newsapi.org/v2';

        fetch(`${API_URL}/top-headlines?country=fr&apiKey=${API_KEY}`)
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log(error));

        fetch(`${API_URL}/everything?q=bitcoin&apiKey=${API_KEY}`)
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log(error));

        </script>
@endsection()

