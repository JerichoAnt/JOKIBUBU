@extends('layout.adminlte')

@section('tempat_konten')
<br>
            <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jadwal</h3>
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
                    <a href="{{route('jadwals.create')}}"  class="btn btn-info">+ Tambah Jadwal Baru untuk Fasilitas</a>
                    <br>
                    <br>
                    <a href="{{route('barang.tambahBarang')}}" class="btn btn-info">+ Tambah Jadwal Baru untuk Barang</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow:auto;">
                <form method="post">
                @csrf
                @method('DELETE')
                <button formaction="/deleteallJadwal" type="submit" class="btn btn-danger" onclick="if(!confirm('Apakah Anda yakin?' )) return false;">Delete All Selected</button>
                    <table id="tabelJadwal" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 10px"><input type="checkbox" class="selectall"></th>
                      <th>Nama Peminjam</th>
                      <th>NRP</th>
                      <th>No Telepon</th>
                      <th>Ormawa</th>
                      <th>Nama Kegiatan</th>
                      <th>Fasilitas</th>
                      <th>Barang</th>
                      <th>Jumlah</th>
                      <th>Durasi Mulai</th>
                      <th>Durasi Selesai</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                        <tbody>
                    @foreach($data_jadwal as $d)
                    <tr>
                        <td>
                        <input type="checkbox" name="ids[]" class="selectbox" value="{{$d->id}}">

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
                            {{$d->fasilitas['nama_fasilitas']}}
                        </td>
                        <td>
                            {{$d->barang['nama_barang']}}
                        </td>
                        <td>
                            {{$d->jumlah}}
                        </td>
                        <td>
                            {{$d->durasiMulai}}
                        </td>
                        <td>
                            {{$d->durasiSelesai}}
                        </td>
                        <td>
                @if($d->id_fasilitas == null)
                    <!-- <a class="btn btn-warning" href="{{ route('barang.editBarang') }}">
                        Update Barang
                    </a> -->
                    <a class="btn btn-warning" href="{{ route('jadwals.edit', $d->id) }}">
                            Update 
                        </a>
                @elseif ($d->id_barang == null)
                        <a class="btn btn-warning" href="{{ route('jadwals.edit', $d->id) }}">
                            Update 
                        </a>
                    @endif
                        
                          <button formaction="{{ route('jadwals.destroy', $d->id) }}" type='submit' value='Delete' class='btn btn-danger' 
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
    $("#tabelJadwal").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "scrollX": true, "scroller":true,"scrollCollapse":true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabelJadwal_wrapper .col-md-6:eq(0)');
  });
</script>