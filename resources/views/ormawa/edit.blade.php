@extends('layout.adminlte')

@section('tempat_konten')
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Ubah Ormawa</h3>
        <br>
        <a href="{{route('fasilitas.index')}}"><< Kembali</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('ormawas.update', $data->id)  }}">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Ormawa</label>
            <input type="text" value="{{$data->nama_ormawa}}" class="form-control" name="namaOrmawa" placeholder="Nama Ormawa" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection