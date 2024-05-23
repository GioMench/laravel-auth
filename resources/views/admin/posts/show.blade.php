@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container">
            <h1>{{ $post->title }}</h1>
        </div>


    </header>
    <section class="py-5">
        <div class="container">

            @if (Str::startsWith($post->cover_image, 'https://'))
                <img width="400px" src=" {{ $post->cover_image }}" alt="{{ $post->title }}">
            @else
                <img width="400px" src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}">
            @endif

            <p>{{ $post->content }}</p>

        </div>
    </section>
@endsection
