@extends('layouts.main')

@section('page-title', 'FumettoLAND')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                FumettOLAND
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('comics.create') }}" class="btn btn-success w-100">
                + Aggiungi il tuo fumetto e vinci un viaggio firmato Boolean
            </a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Data Di Uscita</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->price }}</td>
                            <td>{{ $comic->series }}</td>
                            <td>
                                <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                                    Vedi
                                </a>
                                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
                                    Modifica
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection