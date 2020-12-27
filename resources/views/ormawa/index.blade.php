@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Ormawa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Ormawa</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_ormawa as $d)
                    <tr>
                        <td>
                            {{$d->id}}
                        </td>
                        <td>
                            {{$d->nama_ormawa}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection