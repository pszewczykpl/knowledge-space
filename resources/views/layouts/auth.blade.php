{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

{{--    <head>--}}
{{--        <meta charset="utf-8" />--}}
{{--        <title>Logowanie | Baza Wiedzy</title>--}}
{{--        <meta name="description" content="Baza Wiedzy Open Life" />--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />--}}
{{--        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />--}}

{{--        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />--}}

{{--        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />--}}
{{--    </head>--}}

{{--	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">--}}

{{--    <div class="d-flex flex-column flex-root">--}}
{{--        <div class="login login-6 login-signin-on login-signin-on d-flex flex-row-fluid">--}}
{{--            <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center" style="background-image: url({{ asset('/media/bg/bg-3.jpg') }});">--}}
{{--                <div class="d-flex w-100 flex-center p-15">--}}
{{--                    <div class="login-wrapper">--}}

{{--                        <div class="text-dark-75">--}}
{{--                            <img src="{{ asset('/media/logos/logo-main.png') }}" class="max-h-75px">--}}
{{--                            <h3 class="mb-10 mt-10 font-weight-bold">Witaj w Bazie Wiedzy!</h3>--}}

{{--                            @yield('desc')--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="login-divider">--}}
{{--                    <div></div>--}}
{{--                </div>--}}
{{--                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">--}}
{{--                    <div class="login-wrapper">--}}
{{--                        <div class="login-signin">--}}


{{--                            @yield('content')--}}


{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--		--}}
{{--        <script>var HOST_URL = @php echo '"' . url('/') . '"'; @endphp; </script>--}}
{{--        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>--}}
{{--		--}}
{{--        <script src="{{ asset('js/pages/auth/login.js') }}"></script>--}}

{{--	</body>--}}
{{--</html>--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-layout.head title="Logowanie" />

    <body id="kt_body" class="bg-body">
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <a href="{{ route('login') }}" class="mb-12">
                        <img alt="Logo" src="{{ asset('/media/logos/logo-main.png') }}" class="h-55px" />
                    </a>
                    <div class="w-lg-500px bg-body card-rounded card-shadow p-10 p-lg-15 mx-auto">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>


    <x-layout.scripts />

    @stack('scripts')

    </body>
</html>