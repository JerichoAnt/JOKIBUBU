@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_barang as $d)
                <tr>
                    <td>
                        {{$d->id}}
                    </td>
                    <td>
                        {{$d->nama_barang}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection