<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        Pegawai::create([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'gaji_pokok' => $request->input('gaji_pokok'),
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }


    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'gaji_pokok' => $request->input('gaji_pokok'),
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
