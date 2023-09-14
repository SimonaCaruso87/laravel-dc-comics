@extends('layouts.main')

@section('page-title', $comic->title)

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                {{ $comic->title }}
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <img src="{{ $comic->thumb }}" class="card-img-top" style="max-height: 100px;" alt="{{ $comic->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <p class="card-text">
                        <div>
                            {{ $comic->price }} €
                        </div>
                        <div>
                            {{ $comic->artists }}
                        </div>
                        <div>
                            {{ $comic->description }}
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection