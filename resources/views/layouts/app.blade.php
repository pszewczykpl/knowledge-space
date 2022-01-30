{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

{{--        <!-- Styles -->--}}
{{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

{{--        <!-- Scripts -->--}}
{{--        <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    </head>--}}
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-layout.head :title="$title" />

<body
        id="kt_body"
        		data-kt-aside-minimize="on"
        class="
			@if($dark_mode) dark-mode @endif
                header-fixed header-tablet-and-mobile-fixed aside-enabled
                aside-fixed
{{--			page-loading-enabled page-loading--}}
                ">

{{--<div class="page-loader">--}}
{{--			<span class="spinner-border text-primary" role="status">--}}
{{--				<span class="visually-hidden">Ładowanie...</span>--}}
{{--			</span>--}}
{{--</div>--}}

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">

        <x-layout.aside />

        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

            <x-layout.topbar :title="$title" />

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('content')
            </div>

            <x-layout.footer />

            <a data-bs-toggle="modal" data-bs-target="#policy_calculator_modal" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0 card-rounded">
                <span>Kalkulator miesięcy</span>
            </a>

        </div>
    </div>
</div>

<x-layout.modals />

@isset($datatables)
    <x-layout.scripts :datatables="true" /> @else <x-layout.scripts />
@endisset

@stack('scripts')

</body>
</html>