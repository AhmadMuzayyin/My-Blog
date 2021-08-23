@extends('template.main')

@section('content')
    <div class="container">
        <h1 class="text-center my-3">{{ $title }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ url('/blog') }}">

                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
            </div>

            </form>
        </div>

        @if ($posts->count())
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card my-3 text-center">
                        <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ url('/post') . '/' . $posts[0]->slug }}" class="text-decoration-none text-dark">
                                <h5 class="card-title">{{ $posts[0]->title }}</h5>
                            </a>
                            <p>By. <a href="{{ url('/blog') . '?author=' . $posts[0]->author->username }}"
                                    class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                                    href="{{ url('/blog') . '?category=' . $posts[0]->category->slug }}"
                                    class="text-decoration-none">{{ $posts[0]->category->name }}</a><small
                                    class="text-muted">
                                    {{ $posts[0]->created_at->diffForHumans() }}</small>
                            </p>
                            <p class="card-text">{{ $posts[0]->excerpt }}</p>
                            <a href="{{ url('/post') . '/' . $posts[0]->slug }}"
                                class="text-decoration-none btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Post --}}
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-3" style="background-color: rgba(0, 0, 0, 0.7)">
                                <a href="{{ url('/blog') . '?category=' . $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ url('/post') . '/' . $post->slug }}"
                                        class="text-decoration-none">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">By: <a
                                        href="{{ url('/blog') . '?author=' . $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    <small class="text-muted"> {{ $posts[0]->created_at->diffForHumans() }}</small>
                                </p>
                                <p>{{ $post->excerpt }}</p>
                                <a href="{{ url('/post') . '/' . $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <p class="text-center fs-4">No post found.</p>
        @endif

        <div class="row d-flex justify-content-end">
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
