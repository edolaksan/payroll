@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h2 class="text-center mb-4">Daftar Gaji Karyawan</h2>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('gaji.create') }}" class="btn btn-primary">Tambah Data</a>
                <input type="text" id="search" placeholder="Cari gaji..." class="form-control w-50">
            </div>

            @if ($gajis->isEmpty())
                <p class="text-center">Tidak ada data gaji yang tersedia untuk bulan ini.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="gaji-table">
                        <thead class="thead-dark">
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th  class="text-center">Nama Pegawai</th>
                                <th  class="text-center">Gaji Pokok</th>
                                <th  class="text-center">Denda Keterlambatan</th>
                                <th  class="text-center">Bulan</th>
                                <th  class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gajis as $gaji)
                                <tr>
                                    {{-- <td>{{ $gaji->id }}</td> --}}
                                    <td class="text-center">{{ $gaji->pegawai->nama }}</td>
                                    <td  class="text-center">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                                    <td  class="text-center">Rp {{ number_format($gaji->denda_keterlambatan, 0, ',', '.') }}</td>
                                    <td  class="text-center">{{ $gaji->bulan }}</td>
                                    <td  class="text-center">
                                        <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-warning btn-sm me-2">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#gaji-table tbody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const id = cells[0].textContent.toLowerCase();
                const name = cells[1].textContent.toLowerCase();
                const salary = cells[2].textContent.toLowerCase();
                const penalty = cells[3].textContent.toLowerCase();
                const month = cells[4].textContent.toLowerCase();

                if (id.includes(searchTerm) || name.includes(searchTerm) || salary.includes(searchTerm) ||
                    penalty.includes(searchTerm) || month.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
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

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
@endsection
