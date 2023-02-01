@extends('backend.master')

@section('content')
<div class="card card-body">
  <form action="" method="post">

    <h1 align="center" >Detail Data Siswa</h1>

<div class="form-group">
<label >NAMA : </label>
<label >{{ $student->nama }}</label>
</div>

<div class="form-group">
    <label >JURUSAN : </label>
    <label >{{ $student->major->major }}</label>
    </div>

    <div class="form-group">
        <label >ALAMAT : </label>
        <label >{{ $student->adress }}</label>
        </div>


</form>
</div>
    
@endsection