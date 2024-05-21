@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container">
            <h1>Posts</h1>
        </div>


    </header>
    <section class="py-5">
        <div class="container">
            <h3 class="text-muted">All posts</h3>
            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cover image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions</th>


                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($posts as $post)
                            <tr class="">
                                <td scope="row">{{ $post->id }}</td>
                                <td>
                                    <img width="200px" src=" {{ $post->cover_image }}" alt="">

                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>show\edit\delete</td>


                            </tr>
                        @empty

                            <td scope="row" colspan="5">No posts yet!</td>

                            </tr>
                        @endforelse



                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
