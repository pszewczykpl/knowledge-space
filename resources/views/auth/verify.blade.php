{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('verification.resend') }}" class="form w-100">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">{{ __('Verify Your Email Address') }}</h1>
            <div class="text-gray-400 fw-bold fs-4 pt-4">
                @if (session('message'))
                    <div class="notice d-flex bg-light-primary card-rounded border-primary border border-dashed p-6 mb-8" role="alert">
                        Link weryfikacyjny został wysłany.
                    </div>
                @endif
                Aby kontynuować, musimy zweryfikować Twój adres e-mail. Kliknij poniższy przycisk, a następnie sprawdź swoją skrzynkę e-mail!
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary card-rounded w-100 mb-5">Wyślij link weryfikacyjny</button>
            <div class="text-center text-muted text-uppercase fw-bolder mb-5">lub</div>
            @if (session('message'))
                <a href="{{ route('home.index') }}" class="btn btn-flex flex-center btn-light btn-lg card-rounded w-100 mb-5">Wróć na stronę główną</a>
            @else
                <a href="{{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg card-rounded w-100 mb-5">Wróć na poprzednią stronę</a>
            @endif
        </div>
    </form>
@stop