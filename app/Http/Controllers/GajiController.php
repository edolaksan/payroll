<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', date('Y-m')); // Mendapatkan bulan dari request, default ke bulan ini
        $gajis = Gaji::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$bulan])
            ->with('pegawai')
            ->get(); // Filter berdasarkan bulan dari `created_at`

        return view('gaji.index', compact('gajis'));
    }

    public function show($id)
    {
        $gaji = Gaji::findOrFail($id); // Mengambil data spesifik berdasarkan ID
        return view('gaji.show', compact('gaji'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        return view('gaji.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:master_pegawai,id',
            'gaji_pokok' => 'required|numeric',
            'denda_keterlambatan' => 'required|numeric',
            'bulan' => 'nullable|string', // Tambahkan validasi untuk bulan
        ]);

        // Tambahkan pengisian otomatis kolom 'bulan' jika tidak disediakan dalam request
        $bulan = $request->input('bulan', now()->format('Y-m'));

        Gaji::create([
            'pegawai_id' => $request->pegawai_id,
            'gaji_pokok' => $request->gaji_pokok,
            'denda_keterlambatan' => $request->denda_keterlambatan,
            'bulan' => $bulan, // Isi kolom 'bulan'
        ]);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil ditambahkan.');
    }

    public function edit(Gaji $gaji)
    {
        $pegawai = Pegawai::all();
        return view('gaji.edit', compact('gaji', 'pegawai'));
    }

    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:master_pegawai,id',
            'gaji_pokok' => 'required|numeric',
            'denda_keterlambatan' => 'required|numeric',
            'bulan' => 'nullable|string',
        ]);

        // Update data dengan kolom bulan
        $bulan = $request->input('bulan', $gaji->bulan);
        $gaji->update([
            'pegawai_id' => $request->pegawai_id,
            'gaji_pokok' => $request->gaji_pokok,
            'denda_keterlambatan' => $request->denda_keterlambatan,
            'bulan' => $bulan,
        ]);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil diperbarui.');
    }

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil dihapus.');
    }
}
