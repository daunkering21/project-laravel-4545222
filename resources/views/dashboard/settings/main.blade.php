@extends('dashboard.layouts.main')
@section('container')
<div class="container-fluid py-2">
    <div class="containter">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Pengaturan Akun</h1><hr class="my-3">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <h3>Nama Pengguna</h3>
            </div>
            <div class="col-1 text-end">
                <h3>:</h3>
            </div>
            <div class="col-7">
                <h3>{{ auth()->user()->name }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <h3>Username</h3>
            </div>
            <div class="col-1 text-end">
                <h3>:</h3>
            </div>
            <div class="col-7">
                <h3>{{ auth()->user()->username }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <h3>Email</h3>
            </div>
            <div class="col-1 text-end">
                <h3>:</h3>
            </div>
            <div class="col-7">
                <h3>{{ auth()->user()->email }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <h3>Jumlah Postingan</h3>
            </div>
            <div class="col-1 text-end">
                <h3>:</h3>
            </div>
            <div class="col-7">
                <h3>{{ $hitung }}</h3>
            </div>
        </div>
        <form action="/dashboard/settings" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Foto Komuk Teman Anda</label>
                <img class="img-preview img-fluid mb-3 col-sm-6">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            <button type="submit" class="btn btn-primary my-3">Upload</button>
        </form>
    </div>
</div>
<script>
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