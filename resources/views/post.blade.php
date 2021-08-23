{{-- @dd($posts) --}}
@extends('template.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p>By. <a href="{{ url('/blog') . '?author=' . $post->author->username }}">{{ $post->author->name }}</a>
                    in
                    <a
                        href="{{ url('/blog') . '?category=' . $post->category->slug }}">{{ $post->category->name }}</a><small
                        class="text-muted"> {{ $post->created_at->diffForHumans() }}</small>
                </p>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid"
                    alt="{{ $post->category->name }}">
                <article class="my-3" style="font-size: 20px">{!! $post->body !!}</article>
                <a href="{{ url('/blog') }}" class="text-decoration-none my-3">Back to menu!</a>
            </div>
        </div>
    </div>
@endsection
