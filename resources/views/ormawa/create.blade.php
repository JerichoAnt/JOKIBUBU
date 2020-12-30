@extends('layout.adminlte')

@section('tempat_konten')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Ormawa Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('ormawas.store')  }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Ormawa</label>
            <input type="text" class="form-control" name="namaOrmawa" placeholder="Nama Ormawa" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection