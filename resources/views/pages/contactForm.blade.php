@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-center mb-4">Contactez-nous</h1>
    <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="name" class="form-label">Nom :</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email" class="form-label">Email :</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="phone" class="form-label">Téléphone :</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Téléphone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="subject" class="form-label">Sujet :</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Sujet" value="{{ old('subject') }}">
                    @if ($errors->has('subject'))
                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="message" class="form-label">Message :</label>
                    <textarea name="message" id="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-submit">Envoyer</button>
        </div>
    </form>
</div>
@endsection()
