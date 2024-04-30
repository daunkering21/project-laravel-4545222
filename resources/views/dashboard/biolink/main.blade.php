@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="ulululu">
            <div class="row text-center">
                <div class="py-4" style="font-size:40px">
                    <strong>Selamat datang {{ $crot2->name }}</st   rong>
                </div><hr>
                <div class="py-4">
                    <img class="rounded-circle" style="width:260px"src="/img/{{ $crot2->name }}.jpg" alt="gambar">
                </div>
                <div>
                    <button onclick="window.location.href = '/dashboard'" type="button" class="haluhalu">Kembali ke Dashboard</button>
                </div>
                <div>
                    <button onclick="window.location.href = 'https://www.youtube.com/'" type="button" class="haluhalu">Youtube WPU</button>
                </div>
                <div>
                    <button onclick="window.location.href = '/'" type="button" class="haluhalu mb-5">Halaman Blog</button>
                </div>
            </div>
        </div>
    </div>
@endsection