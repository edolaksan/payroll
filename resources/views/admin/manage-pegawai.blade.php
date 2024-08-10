@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-semibold mb-4">Manage Pegawai</h2>

    <a href="{{ route('pegawai.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">Tambah Pegawai</a>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Gaji</th>
                <th class="py-2 px-4 border-b">Tanggal Masuk</th>
                <th class="py-2 px-4 border-b">Jam Masuk</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $p)
            <tr>
                <td class="py-2 px-4 border-b">{{ $p->id }}</td>
                <td class="py-2 px-4 border-b">{{ $p->nama }}</td>
                <td class="py-2 px-4 border-b">{{ $p->email }}</td>
                <td class="py-2 px-4 border-b">{{ $p->gaji }}</td>
                <td class="py-2 px-4 border-b">{{ $p->tanggal_masuk }}</td>
                <td class="py-2 px-4 border-b">{{ $p->jam_masuk }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('pegawai.edit', $p->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
