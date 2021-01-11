<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Http\Request;
use DB;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_fasilitas = Fasilitas::all();
        return view('fasilitas.index', compact('data_fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Fasilitas;
        $data->nama_fasilitas = $request->get('namaFasilitas');

        $data->save();

        return redirect('fasilitas')->with('status','Jenis Fasilitas Baru berhasil ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        $data = $fasilitas;
        return view('fasilitas.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $fasilitas->nama_fasilitas = $request->get('namaFasilitas');

        $fasilitas->save();
        return redirect()->route('fasilitas.index')->with('status','Data Fasilitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        try
        {
            $fasilitas->delete();

            return redirect('/fasilitas')-> with('status','Data fasilitas Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data fasilitas...' ;
            return redirect('/fasilitas')->with('error',$msg);
        }
    }

    public function deleteAll(Request $request)
    {
        
        try
        {
            $ids = $request->get('ids');
            $dbs = DB::delete('delete from fasilitas where id in ('.implode(",", $ids).')');
            return redirect('/fasilitas')-> with('status','Data fasilitas Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data fasilitas...' ;
            return redirect('/fasilitas')->with('error',$msg);
        }
    }
}
