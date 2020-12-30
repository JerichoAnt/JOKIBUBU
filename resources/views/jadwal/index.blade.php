@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Jadwal</h3>
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
        <a href="{{route('jadwals.create')}}">+ Tambah Jadwal Baru</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Peminjam</th>
                      <th>NRP</th>
                      <th>No Telepon</th>
                      <th>Ormawa</th>
                      <th>Nama Kegiatan</th>
                      <th>Fasilitas</th>
                      <th>Durasi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_jadwal as $d)
                    <tr>
                        <td>
                            {{$d->id}}
                        </td>
                        <td>
                            {{$d->nama_peminjam}}
                        </td>
                        <td>
                            {{$d->nrp}}
                        </td>
                        <td>
                            {{$d->no_telp}}
                        </td>
                        <td>
                            {{$d->ormawa->nama_ormawa}}
                        </td>
                        <td>
                            {{$d->nama_kegiatan}}
                        </td>
                        <td>
                            {{$d->fasilitas->nama_fasilitas}}
                        </td>
                        <td>
                            {{$d->durasi}}
                        </td>
                        <td>
                        <a class="btn btn-warning" href="{{ route('jadwals.edit', $d->id) }}">
                            Update 
                        </a>
                    </td>
                    <td class="actions" data-th="">
                      <form method='POST' action="{{ route('jadwals.destroy', $d->id) }}" >
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