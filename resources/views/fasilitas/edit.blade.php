@extends('layout.adminlte')

@section('tempat_konten')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Ubah Fasilitas</h3>
        <br>
        <a href="{{route('fasilitas.index')}}"><< Kembali</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ url('fasilitas/$data->id')  }}">
        <!-- <form method="POST" action="{{ route('fasilitas.update',$data->id)  }}"> -->
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Fasilitas</label>
            <input type="text" value="{{$data->nama_fasilitas}}" class="form-control" name="namaFasilitas" placeholder="Nama Fasilitas" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection