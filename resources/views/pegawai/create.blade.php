@extends('layouts.app')

@section('content')
    <h1>Tambah Pegawai</h1>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <table class="form-table">
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan:</label></td>
                <td><input type="text" name="jabatan" id="jabatan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td><input type="number" name="gaji_pokok" id="gaji_pokok" required></td>
            </tr>
            <tr>
                <td colspan="2" class="submit-row">
                    <button type="submit" class="btn-submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection

@section('styles')
    <style>
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }

        .form-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .form-table label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-table input[type="text"],
        .form-table input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-table .submit-row {
            text-align: right;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
