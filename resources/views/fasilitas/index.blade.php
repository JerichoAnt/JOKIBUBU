@extends('layout.adminlte')

@section('tempat_konten')
<br>
  <section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Fasilitas</h3>
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
                <a href="{{route('fasilitas.create')}}">+ Tambah Fasilitas Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form method="post">
                @csrf
                @method('DELETE')
                <button formaction="/deleteallFasilitas" type="submit" class="btn btn-danger" onclick="if(!confirm('Apakah Anda yakin?' )) return false;">Delete All Selected</button>
                <table id="tabelFasilitas" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px"><input type="checkbox" class="selectall"></th>
                        <th>Nama Fasilitas</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($data_fasilitas as $d)
                <tr>
                    <td>
                    <input type="checkbox" name="ids[]" class="selectbox" value="{{$d->id}}">

                    </td>
                    <td>
                        {{$d->nama_fasilitas}}
                    </td>
                    <td>
                      <a class="btn btn-warning" href="{{ route('fasilitas.edit', $d->id) }}">
                          Update 
                      </a>
                          <button formaction="{{ route('fasilitas.destroy', $d->id) }}" type='submit' value='Delete' class='btn btn-danger' 
                          onclick="if(!confirm('Apakah Anda yakin?' )) return false;"
                          >Delete</button>
                  </td>    
                </tr>
                @endforeach
              </tbody>
                </table>
                </form>
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

<script type="text/javascript">
    $('.selectall').click(function(){
        $('.selectbox').prop('checked', $(this).prop('checked'));
    })
    $('.selectbox').change(function(){
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if(total == number)
        {
            $('.selectall').prop('checked', true);
        }
        else
        {
            $('.selectall').prop('checked', false);
        }
    })
</script>
@endsection


<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"defer></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"defer></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"defer></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"defer></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#tabelFasilitas").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabelFasilitas_wrapper .col-md-6:eq(0)');
  });
</script>