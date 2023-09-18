@extends('layouts.main')

@section('page-title', 'Crea nuovo Film')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Crea nuovo Film
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col bg-primary py-4">

            {{-- validazione lato front-end --}}
            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif       

            <form action="{{ route('comics.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="thumb" class="form-label">Thumb</label>
                    <input type="text" maxlength="1024" class="form-control" id="thumb" name="thumb" placeholder="Enter value...">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" maxlength="128" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Write here..." required
                    value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror    
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" maxlength="16" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Write here..." required
                    value="{{ old('type') }}">
                    @error('type')
                        <div class="alert aler-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Write here..." required
                    value="{{ old('price') }}">
                    @error('price')
                        <div class="alert aler-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Series</label>
                    <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Write here..." required
                    value="{{ old('series') }}">
                    @error('series')
                        <div class="alert aler-danger my-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="artists" class="form-label">Artisti</label>
                    <input type="text" class="form-control" id="artists" name="artists" placeholder="Enter value...">
                </div>

                <div class="mb-3">
                    <label for="writers" class="form-label">Scrittori</label>
                    <input type="text" class="form-control" id="writers" name="writers" placeholder="Enter value..." required>
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