<?php

namespace App\Http\Controllers;

use App\Models\HariKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HariKerjaController extends Controller
{
    public function index()
    {
        $hariKerja = HariKerja::all();
        return view('hari_kerja.index', compact('hariKerja'));
    }

    public function create()
    {
        return view('hari_kerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari_kerja' => 'required|string|max:255',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'required|date_format:H:i',
        ]);

        HariKerja::create($request->all());

        return redirect()->route('hari_kerja.index')->with('success', 'Hari Kerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hariKerja = HariKerja::findOrFail($id);

        session(['previous_url' => url()->previous()]);

        return view('hari_kerja.edit', compact('hariKerja'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Update method called');

        $request->validate([
            'hari_kerja' => 'required|string|max:255',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'required|date_format:H:i',
        ]);

        $hariKerja = HariKerja::findOrFail($id);
        Log::info('Hari Kerja found: ' . $hariKerja->id);

        // Menampilkan nilai yang akan diupdate
        Log::info('Updating with data: ', $request->all());

        $hariKerja->hari_kerja = $request->hari_kerja;
        $hariKerja->jam_masuk = $request->jam_masuk;
        $hariKerja->jam_pulang = $request->jam_pulang;

        $hariKerja->save();
        Log::info('Hari Kerja updated');

        return redirect(session('previous_url'))->with('success', 'Hari Kerja berhasil diperbarui.');
    }

    public function destroy(HariKerja $hariKerja)
    {
        $hariKerja->delete();
        return redirect()->route('hari_kerja.index')->with('success', 'Hari Kerja berhasil dihapus.');
    }
}
