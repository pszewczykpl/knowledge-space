<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-layout.head title="Logowanie" />

    <body id="kt_body" class="@if($dark_mode) dark-mode @else bg-body @endif">
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

    </body>
</html>