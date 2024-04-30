@extends('layouts.main')
@section('container')
<h1 class="mb-4 text-center">{{ $title }}</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value{{ request('category') }}>
            @endif
            <div class="input-group mb-5">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}" autofocus>
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if($posts->count())
    <div class="card mb-3">
        @if($posts[0]->image)
            <div class="d-flex justify-content-center align-items-middle" style="max-height: 400px;overflow:hidden;max-width:1200px;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
            @else
            <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif  
        <div class="card-body text-center">
            <h3 class="card-title">
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
            </h3>
                <p>
                    <small>
                    By. <a href="/blog?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
        </div>
    </div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.4)"><a href="/blog?category={{ $post->category->slug }}" class="text-white">{{ $post->category->name }}</a></div>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                        @else
                            <img src="https://source.unsplash.com/user/erondu/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif  
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                            <p>
                                <small>
                                By. <a href="/blog?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }} </a>{{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@else
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="/img/No-Post-Found.png" alt="">
            </div>
        </div>
    </div> --}}
    <p class="text-center fs-4">No post found.</p>
@endif
{{ $posts->links() }}
@endsection