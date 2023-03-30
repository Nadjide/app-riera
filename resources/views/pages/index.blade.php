@extends('layouts.app')
@section('content')

    <h1> Page d'accueil : </h1>

    <p> Vous trouverez ici une zone de recherche pour être informer en temps réel de la température et en fonction de celle-ci un conseil approprié !</p>

    <div style="display:flex; height:70vh; flex-direction:column; justify-content:space-between;">
    <div>

        <input id="querycitycountry" type="text">
        <button id="mybutton"> ❄ </button>
        <div id="weatherData"></div>
    </div>
    @vite('public/js/meteo.js')
    <div>
        <img class="image-bas-page" src = "https://www.campus-riera.com/img/BACHELOR.png" position= down; width="300" height="200">
        <img class="image-bas-page" src = "https://www.campus-riera.com/img/BTS.png" width="300" height="200">
        <img class="image-bas-page" src = "https://www.campus-riera.com/img/MASTERE.png" width="300" height="200">
        <img class="image-bas-page" src = "https://www.apprentissage-sud.fr/wp-content/uploads/2022/02/Locaux-Campus-Riera.jpg" width="300" height="200">
    </div>
    </div>
@endsection



