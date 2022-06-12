<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Siswa;
use App\Models\TrxKasus;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pelanggaran.indexPelanggaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pelanggaran.createPelanggaran', [
            'siswas' => Siswa::all(),
            'kasuses' => Kasus::all()
        ]);
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
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrxKasus $pelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrxKasus  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrxKasus $pelanggaran)
    {
        //
    }
}
