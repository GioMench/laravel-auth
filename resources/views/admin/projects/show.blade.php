@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container">
            <h1>{{ $project->project_name }}</h1>
        </div>


    </header>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if (Str::startsWith($project->project_image, 'https://'))
                        <img width="400px" src=" {{ $project->project_image }}" alt="{{ $project->project_name }}">
                    @else
                        <img width="400px" src="{{ asset('storage/' . $project->project_image) }}" alt="{{ $project->project_name }}">
                    @endif
                </div>
                <div class="col">
                    <h4 class="text-muted">description</h4>
                
                    <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
