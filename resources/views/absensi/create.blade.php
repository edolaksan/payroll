@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-semibold mb-4">Absensi Karyawan</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="pegawai_id" class="block text-gray-700 font-medium mb-1">Karyawan</label>
            <select name="pegawai_id" id="pegawai_id" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                @foreach ($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jam_masuk" class="block text-gray-700 font-medium mb-1">Jam Masuk</label>
            <input type="time" name="jam_masuk" id="jam_masuk" class="w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label for="jam_pulang" class="block text-gray-700 font-medium mb-1">Jam Pulang</label>
            <input type="time" name="jam_pulang" id="jam_pulang" class="w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection
