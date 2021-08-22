@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="form w-100">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Ustaw nowe hasło!</h1>
            <div class="text-gray-400 fw-bold fs-4">Podaj e-mail i wpisz nowe hasło do logowania</div>
        </div>
{{--        @if(count($errors) > 0)--}}
{{--            <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6 mb-10" role="alert">--}}
{{--                <div class="d-flex flex-column pe-0 pe-sm-10">--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        {{ $error }} <br>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="fv-row mb-5">
            <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
            <input class="form-control form-control-lg form-control-solid card-rounded @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
            @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <label class="form-label fs-6 fw-bolder text-dark">Hasło</label>
            <input class="form-control form-control-lg form-control-solid card-rounded @error('password') is-invalid @enderror" placeholder="Nowe hasło" id="password" type="password" name="password" required autocomplete="new-password" autofocus>
            @error('password')
            <div class="fv-plugins-message-container invalid-feedback">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Powtórz hasło</label>
            <input class="form-control form-control-lg form-control-solid card-rounded @error('password_confirmation') is-invalid @enderror" placeholder="Powtórz hasło" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
            <div class="fv-plugins-message-container invalid-feedback">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary card-rounded w-100 mb-5">Zapisz hasło</button>
            {{--            <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div>--}}
            {{--            <a href="{{ route('login') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">Przejdź do logowania</a>--}}
        </div>
    </form>
@stop