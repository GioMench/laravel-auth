@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container ">
            <h1>Add New Project</h1>
        </div>
    </header>

    <div class="container py-5">

        @include('partials.validation-message')
        
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('project_name') is-invalid @enderror"  name="project_name" id="project_name" aria-describedby="project_nameHelper"
                    placeholder=".." value="{{old('project_name')}}"/>
                <small id="project_nameHelper" class="form-text text-muted">type a project_name for thi post</small>
                @error('project_name')
                    <div class="text-danger py-2"> {{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="preview_image" class="form-label">preview_image</label>
                <input type="file" class="form-control  @error('preview_image') is-invalid @enderror" name="preview_image" id="preview_image" aria-describedby="preview_imageHelper"
                    placeholder=".." value="{{old('preview_image')}}"/>
                <small id="preview_imageHelper" class="form-text text-muted">type a title for thi project</small>
                @error('preview_image')
                <div class="text-danger py-2"> {{$message}}</div>
            @enderror
            </div>

             <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea name="description" id="description"rows="5" class="form-control  @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                @error('description')
                <div class="text-danger py-2"> {{$message}}</div>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Create

            </button>


        </form>
    </div>
@endsection
