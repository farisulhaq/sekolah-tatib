<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Siswa;
use App\Models\UserRole;
use Illuminate\Support\Str;
use App\Imports\SiswaImport;
use App\Models\JenisKelamin;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\AdminSiswaRequest;

class AdminSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Siswa::all());
        return view('pages.admin.siswa.index', [
            'siswas' => UserRole::whereRoleId(3)->with('user.siswa')->simplePaginate(5),
        ]);
    }

    public function create()
    {
        return view('pages.admin.siswa.create', [
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function store(AdminSiswaRequest $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => trim($request->nis) . '@siswa.id',
            'password' => $request->nis,
        ]);

        $user->user_role()->create([
            'role_id' => 3,
        ]);

        $user->siswa()->create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Siswa $siswa)
    {
        return view('pages.admin.siswa.edit', [
            'siswa' => $siswa,
            'jenis_kelamin' => JenisKelamin::all(),
        ]);
    }

    public function update(AdminSiswaRequest $request, Siswa $siswa)
    {
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->user->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'fileExcel' => ['required', 'mimes:csv,xls,xlsx']
        ]);
        // import data
        Excel::import(new SiswaImport, $request->fileExcel);

        return redirect()->route('siswa.index')->with('success', 'Import Siswa Berhasil');
    }
}
