{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--        </div>--}}

{{--        @if (session('status') == 'verification-link-sent')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mt-4 flex items-center justify-between">--}}
{{--            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <x-button>--}}
{{--                        {{ __('Resend Verification Email') }}--}}
{{--                    </x-button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}

{{--                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">--}}
{{--                    {{ __('Log Out') }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('verification.send') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">{{ __('Verify Your Email Address') }}</h1>
            <div class="text-gray-400 fw-bold fs-4 pt-4">
                @if (session('status') == 'verification-link-sent')
                    <div class="notice d-flex bg-light-primary card-rounded border-primary border border-dashed p-6 mb-8" role="alert">
                        Link weryfikacyjny został wysłany.
                    </div>
                @endif
                Aby kontynuować, musimy zweryfikować Twój adres e-mail. Kliknij poniższy przycisk, a następnie sprawdź swoją skrzynkę e-mail!
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary card-rounded w-100 mb-5">Wyślij @if(session('status') == 'verification-link-sent') ponownie @else link weryfikacyjny @endif</button>
            <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div>
            @if (session('status') == 'verification-link-sent')
                <a href="{{ route('home.index') }}" class="btn btn-flex flex-center btn-light btn-lg card-rounded w-100 mb-5">Wróć na stronę główną</a>
            @else
                <a href="{{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg card-rounded w-100 mb-5">Wróć na poprzednią stronę</a>
            @endif
        </div>
    </form>
@stop