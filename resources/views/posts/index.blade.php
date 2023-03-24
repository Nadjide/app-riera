@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Posts</h1>
    @if (count($posts) >= 1)
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 my-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small class="text-muted">Ecrit par {{$post->user->name}} le {{$post->created_at}}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info">
        <p>Aucun post trouvé.</p>
    </div>
    @endif
</div>
@endsection
