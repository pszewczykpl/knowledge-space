{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <!-- Name -->--}}
{{--            <div>--}}
{{--                <x-label for="name" :value="__('Name')" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Zarejestruj się</h1>
            <div class="text-gray-400 fw-bold fs-4">Stwórz własne konto w serwisie Baza Wiedzy!</div>
        </div>
        <div class="row fv-row mb-5">
            <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid card-rounded @error('first_name') is-invalid @enderror" placeholder="Imię" id="first_name" type="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
                @error('first_name')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid card-rounded @error('last_name') is-invalid @enderror" placeholder="Nazwisko" id="last_name" type="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                @error('last_name')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
        </div>
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid card-rounded @error('email') is-invalid @enderror" placeholder="E-mail" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <div class="fv-row mb-5">
            <select class="form-control form-control-lg form-control-solid card-rounded select2-single @error('department_id') is-invalid @enderror" name="department_id" id="department_id" value="{{ old('department_id') }}">
                @foreach(App\Models\Department::all() as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="fv-row mb-5" data-kt-password-meter="true">
            <div class="mb-1">
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid card-rounded @error('password') is-invalid @enderror" type="password" placeholder="Hasło" id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
            </div>
            <div class="text-muted"><b>Siła hasła</b> (Aby Twoje hasło było silne, powinno mieć min. 8 znaków i składać się z liter, liczb i znaków specjalnych).</div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary card-rounded w-100 mb-5">Zarejestruj się</button>
            {{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div> --}}
            {{-- <a href="{{ route('login') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5 card-rounded">Powrót</a> --}}
        </div>
    </form>
@stop