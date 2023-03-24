@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Créer un post</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body', 'rows' => 4]) }}
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Image') }}
        {{ Form::file('image', ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Poster', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
</div>
@endsection()
