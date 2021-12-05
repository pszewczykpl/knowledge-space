<head>
	<meta charset="utf-8" />
	<title>{{ $title }} | {{ $name }}</title>
	<meta name="description" content="Baza Wiedzy Open Life" />
	<meta name="keywords" content="Baza wiedzy, dokumenty produktowe, produkty inwestycyjne" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app' . ($dark_mode ? '.dark' : '') . '.css?v=' . config('app.version')) }}" />
	@stack('css')
</head>