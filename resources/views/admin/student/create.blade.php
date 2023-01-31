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
    <form action="{{route('student-school-store')}}" method="post">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">NAMA</label>
    <input name="nama" class="form-control" placeholder="Masukan Nama">
    @error('nama')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ALAMAT</label>
    <input name="adress" class="form-control" placeholder="Masukan Alamat">
    @error('adress')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

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
  <form action="{{route('student-school-store')}}" method="post">
  @csrf
<div class="form-group">
<label for="exampleInputEmail1">NAMA</label>
<input name="nama" class="form-control" placeholder="Masukan Nama">
@error('nama')
<span class="text-danger">
  <strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group">
  <select class="form-control" name="major_id" id="">
    <option label="Pilih Jurusan"></option>
    @foreach ($major as $item)
    <option value="{{ $item->id }}">{{ $item->major }}</option>
    @endforeach
  </select>
  @error('major_id')
  <span class="text-danger">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>

<div class="form-group">
<label for="exampleInputPassword1">ALAMAT</label>
<input name="adress" class="form-control" placeholder="Masukan Alamat">
@error('adress')
<span class="text-danger">
  <strong>{{ $message }}</strong>
</span>
@enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection