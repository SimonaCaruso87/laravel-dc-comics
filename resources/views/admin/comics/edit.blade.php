@extends('layouts.main')

@section('page-title', 'Modifica' .$comic->title)

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Modifica {{ $comic->title }}
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col bg-warning py-4">
            <form action="{{ route('comics.update' , ['comic' =>$comic->id ]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="thumb" class="form-label">Thumb</label>
                    <input type="text" maxlength="1024" class="form-control" id="thumb" name="thumb" placeholder="Enter value..."
                    value="{{ $comic->thumb }}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" maxlength="128" class="form-control" id="title" name="title" placeholder="Enter value..." required
                    value="{{ $comic->title }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" maxlength="16" class="form-control" id="type" name="type" placeholder="Enter value..." required
                    value="{{ $comic->type }}">
                </div>

                <div class="mb-3">
                    <label for="artists" class="form-label">Artisti</label>
                    <input type="text" class="form-control" id="artists" name="artists" placeholder="Enter value..."
                    value="{{ $comic->artists }}">
                </div>

                <div class="mb-3">
                    <label for="writers" class="form-label">Scrittori</label>
                    <input type="text" class="form-control" id="writers" name="writers" placeholder="Enter value..." required
                    value="{{ $comic->writers }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-success w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection