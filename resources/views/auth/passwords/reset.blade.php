@extends('layouts.auth')

@section('desc')
<p class="mb-10 text-muted font-weight-bold">Jeśli chcesz zalogować sie w serwisie Baza Wiedzy - <a href="{{ route('login') }}">Zaloguj się</a>. Możesz również <a href="{{ route('home.index') }}">Wejść jako użytkownik niezalogowany</a>.</p>
<a href="{{ route('login') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold mr-3">Zaloguj się</a>
<a href="{{ route('home.index') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Wejdź bez logowania</a>
@stop

@section('content')
<div class="text-center mb-10">
    <h2 class="font-weight-bold">Ustaw nowe hasło!</h2>
    <p class="text-muted font-weight-bold">Podaj e-mail i wpisz nowe hasło do logowania</p>
</div>
<form method="POST" action="{{ route('password.update') }}" class="form text-left">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group py-2 m-0 border-bottom">
        <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <div class="fv-plugins-message-container">
            <div class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <div class="form-group py-2 m-0 border-bottom">
        <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password') is-invalid @enderror" placeholder="Nowe hasło" id="password" type="password" name="password" required autocomplete="new-password">
        @error('email')
        <div class="fv-plugins-message-container">
            <div class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <div class="form-group py-2 m-0 border-bottom">
        <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password_confirmation') is-invalid @enderror" placeholder="Powtórz hasło" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="text-center mt-15">
        <button type="submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Zapisz hasło</button>
    </div>
</form>
@stop