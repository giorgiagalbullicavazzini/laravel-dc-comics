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
        <div class="container py-5">
            <div class="buttons text-center">
                <a href="{{ route('comics.index') }}" class="btn btn-primary mb-3">Return to index</a>
            </div>
            <div class="card mb-3 m-auto">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">{{ $comic->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $comic->type }} || {{ $comic->series }}</h6>
                        <p class="card-text">{{ $comic->description }}</p>
                        <p class="card-text"><strong>Artists:</strong> {{ preg_replace('/[\\\"\\[\\]]/', '', $comic->artists) }}</p>
                        <p class="card-text"><strong>Writers:</strong> {{ preg_replace('/[\\\"\\[\\]]/', '', $comic->writers) }}</p>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-body-secondary mt-auto">
                    ${{ $comic->price }} || <strong>Release Date:</strong> {{ $comic->sale_date }}
                </div>
            </div>
        </div>
    </body>
</html>

<style lang="scss" scoped>
    .card {
        width: 60%;
    }
</style>