@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Aller en arrière</a>
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
<small>Ecrit par {{$post->user->name}} le {{$post->created_at}}</small>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endif
@endif

<div class="comments">
    <h3>Commentaires :</h3>
    @foreach($post->comments as $comment)
        <div class="comment">
            <p>{{$comment->body}}</p>
            <small>Par {{$comment->user->name}} le {{$comment->created_at}}</small>
        </div>
    @endforeach
</div>

@if(Auth::check())
    <div class="add-comment">
        <h3>Ajouter un commentaire</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\CommentsController@store', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Votre commentaire']) }}
        </div>
        {{ Form::hidden('post_id', $post->id) }} <!-- Champ post_id avec la valeur du post actuel -->
        {{ Form::submit('Envoyer', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    </div>
@else
    <p>Veuillez vous connecter pour ajouter un commentaire.</p>
@endif
@endsection
