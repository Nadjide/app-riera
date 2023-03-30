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
@endsection()
