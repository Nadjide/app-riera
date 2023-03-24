@php
   use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/posts" class="btn btn-secondary mb-3">Aller en arrière</a>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    @if(Storage::disk('public')->exists('images/' . $post->image))
    <img class="img-fluid mb-3" style="max-width: 50%;" src="/storage/images/{{$post->image}}">
    @endif
    <small class="text-muted">Ecrit par {{$post->user->name}} le {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}
        @endif
    @endif

    {{-- Display comments --}}
    <h3 class="mt-4">Commentaires</h3>
    @if(count($post->comments) > 0)
        <ul class="list-group">
            @foreach($post->comments as $comment)
            <li class="list-group-item">
                <strong>{{$comment->user->name}}:</strong> {{$comment->body}} <small class="text-muted ">{{$comment->created_at}}</small>
            </li>
            @endforeach
        </ul>
    @else
        <p>Aucun commentaire pour ce post.</p>
    @endif

    @if(!Auth::guest())
        <hr>
        <h4>Ajouter un commentaire</h4>
        {!! Form::open(['action' => 'App\Http\Controllers\CommentsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::textarea('body', '', ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Votre commentaire...']) }}
            </div>
            {{ Form::hidden('post_id', $post->id) }}
            {{ Form::submit('Envoyer', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    @endif
</div>
@endsection()
