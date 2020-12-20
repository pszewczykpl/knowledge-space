<head>
	<meta charset="utf-8" />
	<title>{{ $title }} | {{ $name }}</title>
	<meta name="description" content="Baza Wiedzy Open Life" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/themes/layout/aside/light.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
</head>
<style>
.aside-fixed.aside-minimize-hover .aside {
	width: 285px !important;
}
</style>