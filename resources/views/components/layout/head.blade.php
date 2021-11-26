<head>
	<meta charset="utf-8" />
	<title>{{ $title }} | {{ $name }}</title>
	<meta name="description" content="Baza Wiedzy Open Life" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="_token" content="{{ csrf_token() }}">
	{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
	@stack('css')
	<link href="{{ asset('css_' . str_replace('.', '_', config('app.version')) . '/app' . ($dark_mode ? '.dark' : '') . '.css') }}" rel="stylesheet" type="text/css" />
	<style>
		.card-rounded {
			border-radius: {{ $rounded }}rem !important;
		}
		.card-shadow {
			box-shadow: @if($dark_mode) none @else 0 10px 35px 0 rgb(56 71 109 / 12%) @endif !important;
		}
	</style>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

	
</head>