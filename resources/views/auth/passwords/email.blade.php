@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Zapomniałeś hasła?</h1>
            <div class="text-gray-400 fw-bold fs-4">Podaj e-mail i otrzymaj link do resetu hasła</div>
        </div>
        @if (session('status'))
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mb-10" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">Zresetuj hasło</button>
{{--            <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div>--}}
{{--            <a href="{{ route('login') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">Przejdź do logowania</a>--}}
        </div>
    </form>
@stop