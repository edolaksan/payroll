@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6">Slip Gaji - {{ $slipGaji->pegawai->nama }}</h1>

        <div class="bg-white border border-gray-300 rounded-md shadow-md p-6">
            <p class="text-lg font-medium mb-4">Bulan: {{ date('F Y', strtotime($slipGaji->bulan)) }}</p>

            <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
                <tbody>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 border">Gaji Pokok:</th>
                        <td class="px-4 py-2 text-right border">{{ number_format($slipGaji->gaji_pokok, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 border">Denda Keterlambatan:</th>
                        <td class="px-4 py-2 text-right border">{{ number_format($slipGaji->denda_keterlambatan, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 border">Total Gaji:</th>
                        <td class="px-4 py-2 text-right border">{{ number_format($slipGaji->total_gaji, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('laporan.gaji') }}" class="text-blue-500 hover:underline">Kembali ke Laporan Gaji</a>
        </div>
    </div>
@endsection
