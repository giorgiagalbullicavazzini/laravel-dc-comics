<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        {{-- Include Assets --}}
        @vite('resources/js/app.js')
    </head>

    <body>
        <div class="container">
            <a href="{{ route('comics.create') }}" class="btn btn-primary mt-5">Create a new comic</a>
            @foreach ($comics as $comic)
            <div class="card mt-3">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $comic->type }} || {{ $comic->series }}</h6>
                    <p class="card-text">{{ $comic->description }}</p>
                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Details</a>
                </div>
                <div class="card-footer text-body-secondary">
                    {{ $comic->price }} || {{ $comic->sale_date }}
                </div>
            </div>
            @endforeach
        </div>
        {{--
            $table->string('artists')->nullable();
            $table->string('writers')->nullable(); --}}
    </body>
</html>

<style lang="scss" scoped>
    .card {
        width: 40%;
    }
</style>