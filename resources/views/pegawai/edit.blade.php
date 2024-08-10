@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h2 class="text-center mb-4">Edit Pegawai</h2>
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        value="{{ old('nama', $pegawai->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control"
                        value="{{ old('jabatan', $pegawai->jabatan) }}" required>
                </div>
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control"
                        value="{{ old('gaji_pokok', $pegawai->gaji_pokok) }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
        }

        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }

        .table {
            font-size: 16px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .thead-dark th {
            background-color: #343a40;
            color: #ffffff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
@endsection
