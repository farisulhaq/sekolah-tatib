<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kasus;
use App\Models\Siswa;
use App\Models\TrxKasus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PelanggaranRequest;

class PelanggaranController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role->role->name == 'admin') {
            return view('pages.pelanggaran.indexPelanggaran', [
                'trxkasus' => TrxKasus::with('siswa', 'guru', 'kasus')->latest('tanggal_pelanggaran')->simplePaginate(4)
            ]);
        } else if (auth()->user()->user_role->role->name == 'guru') {
            return view('pages.pelanggaran.indexPelanggaran', [
                'trxkasus' => TrxKasus::whereGuruId(auth()->user()->guru->id)->with('siswa', 'guru', 'kasus')->latest('tanggal_pelanggaran')->simplePaginate(4)
            ]);
        }
    }

    public function create()
    {
        return view('pages.pelanggaran.createPelanggaran', [
            'siswas' => Siswa::all(),
            'gurus' => Guru::all(),
            'kasuses' => Kasus::all()
        ]);
    }

    public function store(PelanggaranRequest $request)
    {
        $kasus = $request->all();
        if ($request->hasFile('gambar')) {
            $kasus['gambar'] = $fileName = time() . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('public/kasus', $fileName);
        } else {
            $kasus['gambar'] = 'default.png';
        }

        TrxKasus::create($kasus);

        return redirect()->route('pelanggaran.index')->with('success', 'Kasus berhasil ditambahkan');
    }

    public function edit(TrxKasus $pelanggaran)
    {
        return view('pages.pelanggaran.editPelanggaran', [
            'siswas' => Siswa::all(),
            'gurus' => Guru::all(),
            'kasuses' => Kasus::all(),
            'kasuss' => $pelanggaran
        ]);
    }

    public function update(PelanggaranRequest $request, TrxKasus $pelanggaran)
    {
        // dd(storage_path('app/public/kasus/' . $pelanggaran->gambar));
        $kasus = $request->all();
        if ($request->File('gambar')) {
            $kasus['gambar'] = $fileName = time() . $request->gambar->getClientOriginalName();
            $request->gambar->storeAs('public/kasus', $fileName);
        } else {
            $kasus['gambar'] = $pelanggaran->gambar;
        }
        if (!($pelanggaran->gambar == 'default.png')) {
            Storage::delete('public/kasus/' . $pelanggaran->gambar);
            // File::delete(storage_path('app/public/kasus/' . $pelanggaran->gambar));
        }
        $pelanggaran->update($kasus);

        return redirect()->route('pelanggaran.index')->with('success', 'Kasus berhasil diedit');;
    }

    public function destroy(TrxKasus $pelanggaran)
    {
        $oldGambar = $pelanggaran->gambar;
        $pelanggaran->delete();

        if (!($oldGambar == 'default.png')) {
            Storage::delete('public/kasus/' . $oldGambar);
        }
        return redirect()->route('pelanggaran.index')->with('success', 'Kasus berhasil diedit');;
    }
}