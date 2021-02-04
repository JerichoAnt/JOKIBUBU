<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Ormawa;
use App\Fasilitas;
use App\Barang;
use Illuminate\Http\Request;
use DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_jadwal = Jadwal::all();
        return view('jadwal.index', compact('data_jadwal'));
    }

    public function jadwal()
    {
        $data_jadwal_fasilitas = DB::select(DB::raw("(SELECT j.* FROM jadwals j WHERE j.jumlah is null)"));
        $data_jadwal_barang = DB::select(DB::raw("(SELECT j.* FROM jadwals j WHERE j.jumlah is not null)"));
        // dd($data_jadwal_barang);
        return view('welcome', compact('data_jadwal_fasilitas', 'data_jadwal_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ormawa = Ormawa::all();
        $fasilitas = Fasilitas::all();
        return view('jadwal.create',compact('ormawa', 'fasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mulai = $request->get('durasiMulai');
        $mulai1 = substr($mulai,0,10)." ".substr($mulai,11,16);
        // dd($mulai1);

        $mulai2 = strtotime($mulai1);
        
        

        $selesai = $request->get('durasiSelesai');
        $selesai1 = substr($selesai,0,10)." ".substr($selesai,11,16);
        $selesai2 = strtotime($selesai1);
        
        $nama = $request->get('fasilitas');

        $totalData = DB::select(DB::raw("SELECT count(*) FROM jadwals WHERE id_fasilitas = ".$nama));

        for($a = 0; $a < $totalData; $a++)
        {
            $sub1 = DB::select(DB::raw("SELECT durasiMulai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1"));
            dd($sub1["durasiMulai"]);
            $sub2 = DB::select(DB::raw("SELECT durasiMulai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1"));
            $totalSub = substr($sub1[0][0],0,10)." ".substr($sub2[0][0],11,16);
            dd($totalSub);
            $strto = strtotime($totalSub);

            

            $cekAwal[$a] = strtotime(substr(DB::select(DB::raw("SELECT durasiMulai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1")),0,10)." ". 
            substr(DB::select(DB::raw("SELECT durasiMulai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1")),11,16));
            
            $cekAkhir[$a] = strtotime(DB::select(DB::raw("SELECT durasiSelesai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1")).substr(0,10) + " " +
            DB::select(DB::raw("SELECT durasiSelesai FROM jadwals WHERE id_fasilitas = ".$nama." LIMIT ".$a.",1")).substr(11,16));
        }
        

        //foreach array
        $lolos = "Sukses";
        for($i = 0; $i<count($cekAwal); $i++)
        {
            if($mulai >= $cekAwal[i] && $selesai <= $cekAkhir[i])
            {
                $lolos = "Gagal";
            }
            break;
        }


        if($lolos == "Sukses")
        {
            $data = new Jadwal;
            $data->nama_peminjam = $request->get('namaPeminjam');
            $data->nrp = $request->get('nrp');
            $data->no_telp = $request->get('nomorTelp');
            $data->id_ormawa = $request->get('ormawa');
            $data->nama_kegiatan = $request->get('namaKegiatan');
            $data->id_fasilitas = $request->get('fasilitas');
            $data->durasiMulai = $request->get('durasiMulai');
            $data->durasiSelesai = $request->get('durasiSelesai');
    
            $data->save();
            return redirect('jadwals')->with('status','Data Jadwal berhasil ditambah!!');
        }
        else
        {
            return redirect('jadwals')->with('error','Data Jadwal tidak berhasil ditambah!!');
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $data = $jadwal;
        $ormawa = Ormawa::all();
        $fasilitas = Fasilitas::all();
        $barang = Barang::all();

        return view('jadwal.edit',compact('data', 'ormawa', 'fasilitas', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->nama_peminjam = $request->get('namaPeminjam');
        $jadwal->nrp = $request->get('nrp');
        $jadwal->no_telp = $request->get('nomorTelp');
        $jadwal->id_ormawa = $request->get('ormawa');
        $jadwal->nama_kegiatan = $request->get('namaKegiatan');

        $cek_fasilitas = $request->get('fasilitas');
        $cek_barang = $request->get('barang');
        $cek_jumlah = $request->get('jumlah');

        if($cek_fasilitas != "null")
        {
            $jadwal->id_fasilitas = $request->get('fasilitas');
        }
        if($cek_barang != "null")
        {
            $jadwal->id_barang = $request->get('barang');
        }
        if($cek_jumlah != "null")
        {
            $jadwal->jumlah = $request->get('jumlah');
        }


        $jadwal->durasiMulai = $request->get('durasiMulai');
        $jadwal->durasiSelesai = $request->get('durasiSelesai');

        $jadwal->save();
        return redirect()->route('jadwals.index')->with('status','Data Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        try
        {
            $jadwal->delete();

            return redirect('/jadwals')-> with('status','Data jadwal Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data jadwal...' ;
            return redirect('/jadwals')->with('error',$msg);
        }
    }

    public function deleteAll(Request $request)
    {
        
        try
        {
            $ids = $request->get('ids');
            $dbs = DB::delete('delete from jadwals where id in ('.implode(",", $ids).')');
            return redirect('/jadwals')-> with('status','Data jadwal Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data jadwal...' ;
            return redirect('/jadwals')->with('error',$msg);
        }
    }

    public function tambahBarang()
    {
        $ormawa = Ormawa::all();
        $barang = Barang::all();
        return view('jadwal.tambahBarang',compact('ormawa', 'barang'));
    }

    // public function anjingBarang()
    // {
    //     $ormawa = Ormawa::all();
    //     $barang = Barang::all();
    //     return view('jadwal.anjing',compact('ormawa', 'barang'));
    // }
    public function storeBarang(Request $request)
    {
        $data = new Jadwal;
        $data->nama_peminjam = $request->get('namaPeminjam');
        $data->nrp = $request->get('nrp');
        $data->no_telp = $request->get('nomorTelp');
        $data->id_ormawa = $request->get('ormawa');
        $data->nama_kegiatan = $request->get('namaKegiatan');
        $data->id_barang = $request->get('barang');
        $data->jumlah = $request->get('jumlah');
        $data->durasiMulai = $request->get('durasiMulai');
        $data->durasiSelesai = $request->get('durasiSelesai');

        $data->save();

        return redirect('jadwals')->with('status','Data Jadwal berhasil ditambah!!');
    }

    public function updateBarang(Request $request, Jadwal $jadwal)
    {
        $jadwal->nama_peminjam = $request->get('namaPeminjam');
        $jadwal->nrp = $request->get('nrp');
        $jadwal->no_telp = $request->get('nomorTelp');
        $jadwal->id_ormawa = $request->get('ormawa');
        $jadwal->nama_kegiatan = $request->get('namaKegiatan');
        $jadwal->id_barang = $request->get('barang');
        $jadwal->jumlah = $request->get('jumlah');
        $jadwal->durasiMulai = $request->get('durasiMulai');
        $jadwal->durasiSelesai = $request->get('durasiSelesai');

        $jadwal->save();
        return redirect()->route('jadwals.index')->with('status','Data Jadwal berhasil diubah');
    }

    public function editBarang(Jadwal $jadwal)
    {
        $data = $jadwal;
        $ormawa = Ormawa::all();
        $barang = Barang::all();

        return view('jadwal.editBarang',compact('data', 'ormawa', 'barang'));
    }
}
