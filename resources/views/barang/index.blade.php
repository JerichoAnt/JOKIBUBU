@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang</h3>
        <br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
          <div class="alert alert-danger" role="alert">
              {{ session('error') }}
          </div>
        @endif
        <br>
        <a href="{{route('barangs.create')}}">+ Tambah Barang Baru</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Barang</th>
                    <th></th>
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
                    <td>
                        <a class="btn btn-warning" href="{{ route('barangs.edit', $d->id) }}">
                            Update 
                        </a>
                    </td>
                    <td class="actions" data-th="">
                        <form method='POST' action="{{ route('barangs.destroy', $d->id) }}" >
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='Delete' class='btn btn-danger' 
                            onclick="if(!confirm('Apakah Anda yakin?' )) return false;"
                            />
                        </form>
                    </td>    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection