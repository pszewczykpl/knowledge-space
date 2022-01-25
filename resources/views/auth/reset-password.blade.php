{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <!-- Password Reset Token -->--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="form w-100">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
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
            <input class="form-control form-control-lg form-control-solid card-rounded @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email">
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