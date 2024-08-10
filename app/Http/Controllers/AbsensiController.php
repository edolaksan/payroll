<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('pegawai')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('absensi.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:master_pegawai,id',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'nullable|date_format:H:i',
        ]);

        Absensi::create($request->all());
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('absensi.edit', compact('absensi', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:master_pegawai,id',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'nullable|date_format:H:i',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
