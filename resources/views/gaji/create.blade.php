@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h2 class="text-center mb-4">Tambah Gaji Karyawan</h2>
            <form action="{{ route('gaji.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pegawai_id" class="form-label">Pilih Pegawai:</label>
                    <select name="pegawai_id" id="pegawai_id" class="form-select" required>
                        @foreach ($pegawai as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="denda_keterlambatan" class="form-label">Denda Keterlambatan:</label>
                    <input type="number" name="denda_keterlambatan" id="denda_keterlambatan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan:</label>
                    <input type="text" name="bulan" id="bulan" class="form-control" value="{{ old('bulan', now()->format('Y-m')) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
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
    </style>
@endsection
