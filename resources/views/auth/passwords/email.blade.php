@extends('layouts.auth')

@section('desc')
<p class="mb-10 text-muted font-weight-bold">Jeśli już posiadasz konto w serwisie Baza Wiedzy - <a href="{{ route('login') }}">Zaloguj się</a>. Możesz również <a href="{{ route('home.index') }}">Wejść jako użytkownik niezalogowany</a>.</p>
<a href="{{ route('login') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold mr-3">Zaloguj się</a>
<a href="{{ route('home.index') }}" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Wejdź bez logowania</a>
@stop

@section('content')
<div class="text-center mb-10">
	<h2 class="font-weight-bold">Zapomniałeś hasła?</h2>
	<p class="text-muted font-weight-bold">Podaj e-mail i otrzymaj link do resetu hasła</p>
</div>
@if (session('status'))
    <div class="alert alert-success mb-10" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('password.email') }}" class="form text-left">
    @csrf
    <div class="form-group py-2 m-0 border-bottom">
		<input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <div class="fv-plugins-message-container">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
        @enderror
    </div>
	<div class="text-center mt-15">
		<button type="submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Zresetuj hasło</button>
	</div>
</form>
@stop