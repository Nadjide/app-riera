@extends('layouts.app')

@section('content')
       <h1>Edit post</h1>

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method'=>'POST']) !!}

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{Form::text('title', $post->title, ['class' => 'form-control','placeholder'=>'Title'])}}
</div>

{{-- <div class="form-group">
    {{ Form::label('image', 'Image') }}
    {{Form::file('image', ['class' => 'form-control','placeholder'=>'Title'])}}
</div> --}}

<div class="form-group">
    {{ Form::label('body', 'body') }}
    {{Form::text('body', $post->body, ['class' => 'form-control','placeholder'=>'Body'])}}
</div>

{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection()
