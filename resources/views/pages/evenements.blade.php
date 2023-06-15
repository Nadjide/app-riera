@extends('layouts.app')

@section('content')
    <h1>Événements</h1>

    @if ($evenements->count() > 0)
        @foreach ($evenements as $evenement)
            <h2>{{ $evenement->titre }}</h2>
            <p>Date : {{ $evenement->date }}</p>
            <p>Description : {{ $evenement->description }}</p>
            <hr>
        @endforeach
    @else
        <p>Aucun événement trouvé dans la base de données.</p>
    @endif
@endsection
