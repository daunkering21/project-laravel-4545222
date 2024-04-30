@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-theme="dark">
                    <button type="button" class="btn-close" aria-label="Close">{{ session('success') }}</button>
                </div>    
            @endif 
            @if(session()->has('loginError'))
                <div class="alert alert-success alert-dismissible" role="alert" data-bs-theme="dark">
                    <button type="button" class="btn-close" aria-label="Close">{{ session('loginError') }}</button>
                </div>    
            @endif 
            
            <main class="form-signin w-100 m-auto">
                <form action="/login" method="post">
                    @csrf
                <img class="mb-4 d-flex m-auto mb-4" src="img/lovidea.png" alt="" width="200" height="200" >
                <h1 class="h3 mb-3 fw-normal d-block text-center mt-3">Silahkan Login</h1>
            
                <div class="form-floating">
                    <input type="email" class="form-control d-block text-center @error('email')is-invalid @enderror" name="email" id="email" placeholder="lovidea@gmail.com" autofocus required value="{{ old('email') }}">
                    <label for="email" class="mt-2 d-block text-center">Email mu</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="d-block text-center form-control" name="password" id="password" placeholder="Kata Sandi" required>
                    <label for="password" class="d-block text-center">Kata Sandi</label>
                </div>
            
                <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-2">Belum menjadi bagian kami? <a href="/register">Daftar sekarang</a></small>
                <p class="mt-5 mb-5 text-body-secondary d-block text-center">&copy; 2023–2024</p>
            </main>
        </div>
    </div>
@endsection