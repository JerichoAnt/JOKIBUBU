<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Ormawa;
use App\Fasilitas;
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
        $data_jadwal = Jadwal::all();
        return view('welcome', compact('data_jadwal'));
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
        return view('jadwal.edit',compact('data', 'ormawa', 'fasilitas'));
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
        $jadwal->id_fasilitas = $request->get('fasilitas');
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
}
