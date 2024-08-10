@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold mb-6">Edit Hari Kerja</h1>
    <form action="{{ route('hari_kerja.update', $hariKerja->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="hari_kerja" class="block text-sm font-medium text-gray-700">Hari Kerja:</label>
            <input type="text" name="hari_kerja" id="hari_kerja" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                   value="{{ old('hari_kerja', $hariKerja->hari_kerja) }}" required>
        </div>

        <div class="mb-4">
            <label for="jam_masuk" class="block text-sm font-medium text-gray-700">Jam Masuk:</label>
            <input type="time" name="jam_masuk" id="jam_masuk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                   value="{{ old('jam_masuk', $hariKerja->jam_masuk) }}" required>
        </div>

        <div class="mb-4">
            <label for="jam_pulang" class="block text-sm font-medium text-gray-700">Jam Pulang:</label>
            <input type="time" name="jam_pulang" id="jam_pulang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                   value="{{ old('jam_pulang', $hariKerja->jam_pulang) }}" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Simpan Perubahan</button>
    </form>
</div>
@endsection
