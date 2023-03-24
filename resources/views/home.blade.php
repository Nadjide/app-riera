@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary mb-3">Créer un Post</a>
                    <h3> Vos articles de blog </h3>
                    @if(count($posts) > 0)
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-secondary"> Modifier</a></td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="mt-2"> Vous n'avez aucun posts. </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
