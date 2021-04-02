<head>
	<meta charset="utf-8" />
	<title>{{ $title }} | {{ $name }}</title>
	<meta name="description" content="Baza Wiedzy Open Life" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

	@yield('additional_css')

	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
</head>