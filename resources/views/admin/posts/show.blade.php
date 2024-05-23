@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container">
            <h1>{{ $post->title }}</h1>
        </div>


    </header>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if (Str::startsWith($post->cover_image, 'https://'))
                        <img width="400px" src=" {{ $post->cover_image }}" alt="{{ $post->title }}">
                    @else
                        <img width="400px" src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}">
                    @endif
                </div>
                <div class="col">
                    <h4 class="text-muted">description</h4>
                
                    <p>{{ $post->content }}</p>
                </div>
            </div>



            

        </div>
    </section>
@endsection
