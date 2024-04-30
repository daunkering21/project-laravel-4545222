@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-2">{{ $post->title }}</h1>
                <p>By. <a href="/blog?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                @if($post->image)
                <div style="overflow:hidden;max-width:1200px;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif  
                        {!! $post->body  !!} 
                    </article>
                <a href="/blog" class="d-block mt-2">Back to posts</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('img');
            images.forEach(function(img) {
                var src = img.getAttribute('src');
                if (src.startsWith('../')) {
                    img.setAttribute('src', src.replace('..', ''));
                }
            });
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var linkElements = document.querySelectorAll('link[rel="icon"]');
            linkElements.forEach(function(link) {
                var href = link.getAttribute('href');
                if (href.includes('../')) {
                    // Ubah nilai atribut href
                    link.setAttribute('href', href.replace('../', '/'));
                }
            });
        });
    </script>
    
@endsection