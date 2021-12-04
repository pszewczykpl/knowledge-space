<head>
	<meta charset="utf-8" />
	<title>{{ $title }} | {{ $name }}</title>
	<meta name="description" content="Baza Wiedzy Open Life" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{ asset('css/app' . ($dark_mode ? '.dark' : '') . '.css?v=' . config('app.version')) }}" rel="stylesheet" type="text/css" />
	@stack('css')
	<style>
		.card-rounded {
			border-radius: {{ $rounded }}rem !important;
		}
		.card-shadow {
			box-shadow: @if($dark_mode) none @else 0 10px 35px 0 rgb(56 71 109 / 12%) @endif !important;
		}
	</style>
</head>