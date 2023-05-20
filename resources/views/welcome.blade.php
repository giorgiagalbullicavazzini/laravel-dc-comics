<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        {{-- Include Assets --}}
        @vite('resources/js/app.js');
    </head>

    <body>
        <div class="container">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">Lista fumetti</a>
        </div>
    </body>
</html>
