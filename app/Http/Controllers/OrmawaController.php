<?php

namespace App\Http\Controllers;

use App\Ormawa;
use Illuminate\Http\Request;
use DB;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_ormawa = Ormawa::all();
        return view('ormawa.index', compact('data_ormawa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ormawa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Ormawa;
        $data->nama_ormawa = $request->get('namaOrmawa');

        $data->save();

        return redirect('ormawas')->with('status','Jenis Ormawa Baru berhasil ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function show(Ormawa $ormawa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function edit(Ormawa $ormawa)
    {
        $data = $ormawa;
        return view('ormawa.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ormawa $ormawa)
    {
        $ormawa->nama_ormawa = $request->get('namaOrmawa');

        $ormawa->save();
        return redirect()->route('ormawas.index')->with('status','Data Ormawa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ormawa $ormawa)
    {
        try
        {
            $ormawa->delete();

            return redirect('/ormawas')-> with('status','Data Ormawa Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data ormawa...' ;
            return redirect('/ormawas')->with('error',$msg);
        }
    }

    public function deleteAll(Request $request)
    {
        try
        {
            $ids = $request->get('ids');
            $dbs = DB::delete('delete from ormawas where id in ('.implode(",", $ids).')');
            return redirect('/ormawas')-> with('status','Data Ormawa Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data ormawa...' ;
            return redirect('/ormawas')->with('error',$msg);
        }
        
    }
}
