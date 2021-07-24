@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Zarejestruj się</h1>
            <div class="text-gray-400 fw-bold fs-4">Stwórz własne konto w serwisie Baza Wiedzy!</div>
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror" placeholder="Nazwa użytkownika" id="username" type="username" name="username" value="{{ old('username') }}" required autocomplete="username">
            @error('username')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror" placeholder="Imię" id="first_name" type="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
            @error('first_name')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror" placeholder="Nazwisko" id="last_name" type="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
            @error('last_name')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <select class="form-control form-control-lg form-control-solid @error('department_id') is-invalid @enderror" name="department_id" id="department_id" value="{{ old('department_id') }}">
                @foreach(App\Models\Department::all() as $department)
                <option value="{{ $department->id }}">{{ $department->code }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="E-mail (firmowy)" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="Hasło" id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
            @enderror
        </div>
        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Powtórz hasło" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">Zarejestruj się</button>
{{--            <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div>--}}
{{--            <a href="{{ route('login') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">Przejdź do logowania</a>--}}
        </div>
    </form>
@stop