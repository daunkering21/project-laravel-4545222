@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat postingan baru</h1>
</div>
<div class="col-lg-8" >
    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Postingan</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul" required autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <div class="input-group">
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" disabled readonly required value="{{ old('slug') }}">
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
                    @if(old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Silahkan masukkan foto (ukuran 1200x400)</label>
            <img class="img-preview img-fluid mb-3 col-sm-6">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Isi Postingan Anda</label>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary mb-3">Buat Postingan</button>
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

    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }};
    
    document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('img');
            images.forEach(function(img) {
                var src = img.getAttribute('src');
                if (src.startsWith('../')) {
                    img.setAttribute('src', src.replace('..', ''));
                }
            });
    });
    document.addEventListener("DOMContentLoaded", function() {
    var img = document.querySelector("link[rel='icon']"); // Mengganti images menjadi img
    if (img) { // Mengganti images menjadi img
        var src = img.getAttribute('href'); // Mengganti 'src' menjadi 'href'
        if (src.startsWith('../')) {
            img.setAttribute('href', src.replace('..', '')); // Mengganti 'src' menjadi 'href'
        }
    }
});

</script>
@endsection