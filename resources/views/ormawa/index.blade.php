@extends('layout.adminlte')

@section('tempat_konten')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Ormawa</h3>
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
        <a href="{{route('ormawas.create')}}">+ Tambah Ormawa Baru</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Ormawa</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_ormawa as $d)
                    <tr>
                        <td>
                        <input type="checkbox">

                        </td>
                        <td>
                            {{$d->nama_ormawa}}
                        </td>
                        <td>
                        <a class="btn btn-warning" href="{{ route('ormawas.edit', $d->id) }}">
                            Update 
                        </a>
                    </td>
                    <td class="actions" data-th="">
                      <form method='POST' action="{{ route('ormawas.destroy', $d->id) }}" >
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


            <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Ormawa</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($data_ormawa as $d)
                    <tr>
                        <td>
                        <input type="checkbox">

                        </td>
                        <td>
                            {{$d->nama_ormawa}}
                        </td>
                        <td>
                        <a class="btn btn-warning" href="{{ route('ormawas.edit', $d->id) }}">
                            Update 
                        </a>
                    </td>
                    <td class="actions" data-th="">
                      <form method='POST' action="{{ route('ormawas.destroy', $d->id) }}" >
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
      <!-- /.container-fluid -->
    </section>
@endsection


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>