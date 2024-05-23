@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container ">
            <h1>Create post</h1>
        </div>
    </header>

    <div class="container py-5">

        @include('partials.validation-message')
        
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" id="title" aria-describedby="titleHelper"
                    placeholder=".." value="{{old('title')}}"/>
                <small id="titleHelper" class="form-text text-muted">type a title for thi post</small>
                @error('title')
                    <div class="text-danger py-2"> {{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">cover_image</label>
                <input type="file" class="form-control  @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" aria-describedby="cover_imageHelper"
                    placeholder=".." value="{{old('cover_image')}}"/>
                <small id="cover_imageHelper" class="form-text text-muted">type a title for thi post</small>
                @error('cover_image')
                <div class="text-danger py-2"> {{$message}}</div>
            @enderror
            </div>

             <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content"rows="5" class="form-control  @error('content') is-invalid @enderror">{{old('content')}}</textarea>
                @error('content')
                <div class="text-danger py-2"> {{$message}}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Create

            </button>


        </form>
    </div>
@endsection
