@extends('layouts.app')

@section('content')
       <h1>Create post</h1>

{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{Form::text('title', '', ['class' => 'form-control','placeholder'=>'Title'])}}
</div>

<div class="form-group">
    {{ Form::label('body', 'body') }}
    {{Form::text('body', '', ['class' => 'form-control','placeholder'=>'Body'])}}
</div>

<div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{Form::file('image', ['class' => 'form-control','placeholder'=>'Title'])}}
</div>

{{Form::submit('Submit',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection()
