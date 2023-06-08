<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">

        <title>{{ config('app.name') }}</title>

        @vite('resources/ts/app.ts')
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
