@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Hari Kerja</h1>
        <form action="{{ route('hari_kerja.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="hari_kerja">Hari Kerja:</label>
                <input type="text" name="hari_kerja" id="hari_kerja" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jam_masuk">Jam Masuk:</label>
                <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jam_pulang">Jam Pulang:</label>
                <input type="time" name="jam_pulang" id="jam_pulang" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
