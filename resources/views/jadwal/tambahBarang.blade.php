@extends('layout.adminlte')

@section('tempat_konten')
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Tambah Jadwal Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('barang.storeBarang')  }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Peminjam</label>
            <input type="text" class="form-control" name="namaPeminjam" placeholder="Nama Peminjam" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">NRP</label>
            <input type="text" class="form-control" name="nrp" placeholder="NRP" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nomor Telepon</label>
            <input type="text" class="form-control" name="nomorTelp" placeholder="Nomor Telepon" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Ormawa</label>
                <select name="ormawa" class="form-control select2" style="width: 100%;" required>
                <option value="" disabled selected>Pilih Ormawa</option>
                @foreach($ormawa as $s)
                <option value="{{ $s->id }}"> <?php echo $s->nama_ormawa ?> </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Kegiatan</label>
            <input type="text" class="form-control" name="namaKegiatan" placeholder="Nama Kegiatan" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Barang</label>
                <select name="barang" class="form-control select2" style="width: 100%;" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach($barang as $s)
                <option value="{{ $s->id }}"> <?php echo $s->nama_barang ?> </option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Jumlah</label>
            <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Durasi:</label><br>
            <label>Mulai</label>
            <input type="datetime-local" class="form-control" name="durasiMulai" placeholder="Durasi" required><br>
            <label>Selesai</label>
            <input type="datetime-local" class="form-control" name="durasiSelesai" placeholder="Durasi" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection