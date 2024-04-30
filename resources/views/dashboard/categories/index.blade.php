@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Postingan</h1>
    </div>
    @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive col-lg-8">
      <a href="/dashboard/categories/create"class="btn btn-primary mb-3">Buat kategori baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a title="View" class="badge bg-info" href="/dashboard/categories/{{ $category->slug }}"><i class="bi bi-view-stacked"></i></a>
                <a title="Edit" class="badge bg-warning" href="/dashboard/categories/{{ $category->slug }}/edit"><i class="bi bi-pencil-square"></i></a>
                  <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                    @method('delete')
                      @csrf
                    <button title="Delete" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin hapus postingan ini?')"><i class="bi bi-trash3"></i></button>
                  </form>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection