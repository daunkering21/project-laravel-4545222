@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row mt-2 mb-5">
        <div class="col-lg-8">
            <h1 class="mb-2">{{ $post->title }}</h1>
                <a href="/dashboard/posts" class="btn btn-success mb-2"><i class="bi bi-arrow-bar-left"></i> Kembali ke postingan</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-2"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                      @csrf
                    <button title="Delete" class=" d-inline btn btn-danger mb-2" onclick="return confirm('Yakin ingin hapus postingan ini?')"><i class="bi bi-trash3"></i> Hapus Postingan</button>
                </form>

            @if($post->image)
            <div style="max-width: 1200px;overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            </div>
            @else
            <img src="https://source.unsplash.com/user/erondu/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            @endif   
            <article class="my-3 fs-5">
                {!! $post->body  !!} 
            </article>
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