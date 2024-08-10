@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h2 class="text-center mb-4">Edit Gaji Karyawan</h2>
            <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="pegawai_id" class="form-label">Pilih Pegawai:</label>
                    <select name="pegawai_id" id="pegawai_id" class="form-select" required>
                        @foreach($pegawai as $p)
                            <option value="{{ $p->id }}" {{ $p->id == $gaji->pegawai_id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ $gaji->gaji_pokok }}" required>
                </div>

                <div class="mb-3">
                    <label for="denda_keterlambatan" class="form-label">Denda Keterlambatan:</label>
                    <input type="number" name="denda_keterlambatan" id="denda_keterlambatan" class="form-control" value="{{ $gaji->denda_keterlambatan }}" required>
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

        .form-label {
            font-weight: 500;
        }

        .form-select,
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 0.2rem rgba(37, 117, 252, 0.25);
        }
    </style>
@endsection
