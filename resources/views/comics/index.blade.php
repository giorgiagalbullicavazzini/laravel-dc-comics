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
            <a href="{{ route('comics.create') }}" class="btn btn-primary mb-3">Create a new comic</a>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($comics as $comic)
                <div class="col">
                    <div class="card h-100 mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $comic->type }} || {{ $comic->series }}</h6>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($comic->description, 70, $end = '...')}}</p>
                                <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Details</a>
                                <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modify</a>
                                <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer text-body-secondary mt-auto">
                            ${{ $comic->price }} || <strong>Release Date:</strong> {{ $comic->sale_date }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{--
            $table->string('artists')->nullable();
            $table->string('writers')->nullable(); --}}
    </body>
</html>