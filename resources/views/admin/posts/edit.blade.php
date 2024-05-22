@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container ">
            <h1>Editing post: {{ $post->title }}</h1>
        </div>
    </header>

    <div class="container py-5">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <ul></ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" aria-describedby="titleHelper" placeholder=".."
                    value="{{ old('title', $post->title) }}" />
                <small id="titleHelper" class="form-text text-muted">type a title for this post</small>
                @error('title')
                    <div class="text-danger py-2"> {{ $message }}</div>
                @enderror
            </div>



            <div class="d-flex gap-2 mb-3">
                <img width="300px" src="{{ $post->cover_image }}" alt="image description for {{ $post->title }}">
                <div>
                    <label for="cover_image" class="form-label">cover_image</label>
                    <input type="text" class="form-control  @error('cover_image') is-invalid @enderror"
                        name="cover_image" id="cover_image" aria-describedby="cover_imageHelper" placeholder=".."
                        value="{{ old('cover_image', $post->cover_image) }}" />
                    <small id="cover_imageHelper" class="form-text text-muted">type name of cover_image for this post</small>
                    @error('cover_image')
                        <div class="text-danger py-2"> {{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content"rows="5" class="form-control  @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="text-danger py-2"> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Create

            </button>


        </form>
    </div>
@endsection
