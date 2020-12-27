<?php

namespace App\Http\Controllers;

use App\Ormawa;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ormawa  $ormawa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ormawa $ormawa)
    {
        //
    }
}
