@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="form w-100">
        @csrf
        <input type="checkbox" name="remember" id="remember" style="display: none;" checked>
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Zaloguj się do Bazy Wiedzy!</h1>
            <div class="text-gray-400 fw-bold fs-4">Nowy tutaj?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">Stwórz konto</a></div>
        </div>
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
            <input class="form-control form-control-lg form-control-solid card-rounded @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Hasło</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Zapomniałeś hasła?</a>
                @endif
            </div>
            <input class="form-control form-control-lg form-control-solid card-rounded @error('password') is-invalid @enderror" type="Password" placeholder="Hasło" id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary card-rounded w-100 mb-5">Kontynuuj</button>
            {{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div> --}}
            {{-- <a href="{{ route('home.index') }}" class="btn btn-flex flex-center btn-light btn-lg card-rounded w-100 mb-5">Kontynuuj bez logowania</a> --}}
        </div>
    </form>
@stop