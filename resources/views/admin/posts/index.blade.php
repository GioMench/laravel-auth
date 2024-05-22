@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-light">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Posts</h1>

            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}"> New Post</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h3 class="text-muted">All posts</h3>
            <div class="table-responsive">
                <!--succes-alert-edit/create-->
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('message') }}
                    </div>
                @endif

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
                                <td><a class="btn btn-dark text-uppercase" href="{{ route('admin.posts.show', $post) }}"
                                        style="font-size: 10px">show</a>
                                    <a class="btn btn-dark text-uppercase" style="font-size: 10px"
                                        href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger text-uppercase" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{$post->id}}" style="font-size: 10px">
                                        delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{$post->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Delete post
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">Destroy {{$post->title}}?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger"
                                                        >
                                                            Confirm
                                                        </button>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

                                </td>


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
