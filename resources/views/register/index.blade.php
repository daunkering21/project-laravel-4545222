@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <main class="form-registration w-100 m-auto">
                <form action="/register" method="post">
                    @csrf
                    <img class="mb-4 d-flex m-auto mb-4" src="img/lovidea.png" alt="" width="200" height="200" >
                     <h1 class="h3 mb-3 fw-normal d-block text-center mt-3">Form Pendaftaran</h1>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control d-block text-center rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Nama" autofocus required value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                Silahkan isi nama yang valid.
                            </div>
                            @enderror
                            {{-- <label for="name" class="mt-2 d-block text-center">Nama</label> --}}
                        </div>
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control d-block text-center @error('username')is-invalid @enderror" id="username"  placeholder="username" required value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                Silahkan gunakan username lain 'minimal 4 karakter'.
                            </div>
                            @enderror
                            {{-- <label for="username" class="mt-2 d-block text-center">Username</label> --}}
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control d-block text-center @error('email')is-invalid @enderror" id="email"  placeholder="lovidea@gmail.com" required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                Silahkan berikan email yang valid.
                            </div>
                            @enderror
                            {{-- <label for="email" class="mt-2 d-block text-center">Email mu</label> --}}
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="d-block text-center form-control rounded-bottom @error('password')is-invalid @enderror"  id="password" placeholder="Kata Sandi" required>
                            @error('password')
                            <div class="invalid-feedback">
                                Gunakan kata sandi minimal 5 karakter dan berisi karakter special.
                            </div>
                            @enderror
                            {{-- <label for="password" class="d-block text-center">Kata Sandi</label> --}}
                        </div>
                        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Daftar</button>
                </form>
                <small class="d-block text-center mt-2">Sudah daftar? <a href="/login">Silahkan Login</a></small>
                <p class="mt-5 mb-5 text-body-secondary d-block text-center">&copy; 2023–2024</p>
            </main>
        </div>
    </div>
@endsection