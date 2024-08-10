@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-semibold mb-6">Laporan Gaji Karyawan</h1>

        <form action="{{ route('laporan.gaji') }}" method="GET" class="mb-8 flex items-center space-x-4">
            @csrf
            <div class="flex-1">
                <label for="bulan" class="block text-gray-700 font-medium mb-2">Pilih Bulan:</label>
                <input type="month" name="bulan" id="bulan" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <br>
            <button type="submit"
                class="bg-blue-500 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Tampilkan</button>
        </form>
        <br>    
        @if (isset($laporanGaji))
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700 border">Pegawai</th>
                            <th class="px-4 py-2 text-left text-gray-700 border">Gaji Pokok</th>
                            <th class="px-4 py-2 text-left text-gray-700 border">Denda Keterlambatan</th>
                            <th class="px-4 py-2 text-left text-gray-700 border">Total Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanGaji as $lg)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $lg->pegawai->nama }}</td>
                                <td class="px-4 py-2 text-right border">{{ number_format($lg->gaji_pokok, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 text-right border">
                                    {{ number_format($lg->denda_keterlambatan, 2, ',', '.') }}</td>
                                <td class="px-4 py-2 text-right border">{{ number_format($lg->total_gaji, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
