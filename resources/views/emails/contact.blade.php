@extends('layouts.app')
@section('content')

<h2>Hey, It's me {{ $data->name }}</h2>
<br>
<strong>User details: </strong><br>

<strong>Name: </strong>{{ $data->name }} <br>

<strong>Email: </strong>{{ $data->email }} <br>

<strong>Phone: </strong>{{ $data->phone }} <br>

<strong>Subject: </strong>{{ $data->subject }} <br>

<strong>Message: </strong>{{ $data->user_query }} <br><br>
Thank you

@endsection
