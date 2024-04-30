@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan</h1>
</div>
<div class="col-lg-8" >
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Postingan</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul" required autofocus value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <div class="input-group">
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" disabled readonly required value="{{ old('slug', $post->slug) }}">
                <span class="input-group-text d-block"><i class="bi bi-pencil"></i></span>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if(old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Edit foto</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-6 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-6">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="image" class="form-label">Silahkan masukkan foto</label>
            <input class="form-control" type="file" id="image" name="image">
        </div> --}}
        
        <div class="mb-3">
            <label for="body" class="form-label">Isi Postingan Anda</label>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary mb-4">Perbarui Postingan</button>
    </form>
</div>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>

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

        function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
        }};

    </script>
    
@endsection