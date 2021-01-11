@extends('layout.adminlte')

@section('tempat_konten')
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Ubah Barang</h3>
        <br>
        <a href="{{route('barangs.index')}}"><< Kembali</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('barangs.update', $data->id)  }}">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" value="{{$data->nama_barang}}" class="form-control" name="namaBarang" placeholder="Nama Barang" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection