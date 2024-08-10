<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\HariKerja;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Method untuk menampilkan form laporan gaji
    public function index(Request $request)
    {
        $laporanGaji = null;

        if ($request->has('bulan')) {
            $bulan = $request->input('bulan');
            $laporanGaji = Gaji::with('pegawai')
                ->where('bulan', $bulan)
                ->get();
        }

        return view('laporan.gaji', compact('laporanGaji'));
    }

    // Method untuk menampilkan slip gaji individu
    public function showSlipGaji(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'bulan' => 'required|date_format:Y-m',
        ]);

        $pegawai = Pegawai::find($request->pegawai_id);
        $gaji = Gaji::where('pegawai_id', $pegawai->id)
            ->where('bulan', $request->bulan)
            ->firstOrFail();

        $absensi = $pegawai->absensi()
            ->whereBetween('tanggal', [$request->bulan . '-01', $request->bulan . '-31'])
            ->get();

        $totalDenda = 0;
        foreach ($absensi as $absen) {
            $hariKerja = $this->getHariKerja($absen->tanggal);
            $jamMasuk = strtotime($hariKerja->jam_masuk);
            $jamMasukAbsen = strtotime($absen->jam_masuk);
            $terlambat = max(0, ($jamMasukAbsen - $jamMasuk) / 60);

            if ($terlambat > 15) {
                $totalDenda += $terlambat * ($gaji->denda_keterlambatan / 60);
            }

            if (!$absen->jam_pulang) {
                $totalDenda += ($gaji->gaji_pokok / 30) / 2;
            }
        }

        $totalGaji = $gaji->gaji_pokok - $totalDenda;

        $slipGaji = (object) [
            'pegawai' => $pegawai,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gaji->gaji_pokok,
            'denda_keterlambatan' => $totalDenda,
            'total_gaji' => $totalGaji,
        ];

        return view('laporan.slip_gaji', compact('slipGaji'));
    }

    // Method untuk mendapatkan data hari kerja
    private function getHariKerja($tanggal)
    {
        return HariKerja::where('hari_kerja', date('l', strtotime($tanggal)))->first();
    }
}
