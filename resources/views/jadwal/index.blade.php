@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Jadwal</h3>
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
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection