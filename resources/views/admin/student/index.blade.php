{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <a href="{{ route("student-create") }}"><button class="btn btn-primary mb-4">Tambah Data</button></a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $item)
                <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->adress }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route("student-edit", $item->id) }}" >Edit</a>
                    <form action="{{ route("student-delete", $item->id) }}" method="post" style="display: inline" class="form-check-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> --}}

@extends('backend.master')

@section('content')
<div class="card card-body">

  <div class="form-group row mb-1 mt-3">

@if (Auth::user()->role == "admin")
<div class="col-sm-6 mb-3 mb-sm-0">
  <a href="{{ route("student-create") }}"><button class="btn btn-primary mb-4">Tambah Data</button></a>
</div>
@endif

<div class="ml-auto mr-5">
  <form class="d-none d-sm-inline-block form-inline navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search"  value="{{ Request::get('nama') }}" name="nama">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
    </form>
</div>



</div>


  <table class="table table-striped mt-1">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">JURUSAN</th>
      <th scope="col">ALAMAT</th>
      @if (Auth::user()->role == "admin")
      <th scope="col">AKSI</th>
      @endif
    </tr>
  </thead>
  <tbody>
      @foreach ($students as $key => $item)
      <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->major->major }}</td>
      <td>{{ $item->adress }}</td>
      @if (Auth::user()->role == "admin")
      <td>
          <a class="btn btn-primary" href="{{ route("student-edit", $item->id) }}" >Edit</a>
          <form action="{{ route("student-delete", $item->id) }}" method="post" style="display: inline" class="form-check-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Hapus</button>
          </form>
          <form action="{{ route("student-show", $item->id) }}" method="get" style="display: inline" class="form-check-inline">
            @csrf
            <button class="btn btn-success" type="submit">Detail</button>
        </form>
      </td>
      @endif
      </tr>
    @endforeach
  </tbody>
</table>
</div>

{{-- tag menambahkan pagination --}}
<div class="mt-2 float-right">
  {{ $students->links() }}
</div>

{{-- untuk alert keterangan --}}

@if (session('status'))
<script>
  Swal.fire({
    icon : 'success',
    title : 'Sukses!',
    text : "{{ session('status') }}",
  });
</script>
@endif
@endsection