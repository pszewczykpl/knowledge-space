<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
    <link rel="stylesheet" href="{{ asset('/splash-screen.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <title>Baza Wiedzy</title>
    <script type="module" src="{{ asset('/assets/index.f718b679.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/assets/index.735c10f3.css') }}">
</head>
<body class="page-loading">
<noscript>
    <strong>We're sorry but Baza Wiedzy doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="app"></div>
<div id="splash-screen" class="splash-screen">
    <span>Ładowanie...</span>
</div>

</body>
</html>
