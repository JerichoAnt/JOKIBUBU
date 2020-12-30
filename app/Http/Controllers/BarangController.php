<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barang = Barang::all();
        return view('barang.index', compact('data_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Barang;
        $data->nama_barang = $request->get('namaBarang');

        $data->save();

        return redirect('barangs')->with('status','Jenis Barang Baru berhasil ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $data = $barang;
        return view('barang.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->nama_barang = $request->get('namaBarang');

        $barang->save();
        return redirect()->route('barangs.index')->with('status','Data Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        try
        {
            $barang->delete();
            return redirect('/barangs')-> with('status','Data barang Berhasil Dihapus');
        }
        catch(\PDOException $e)
        {
            $msg='Gagal hapus data barang...' ;
            return redirect('/barangs')->with('error',$msg);
        }
    }
}
