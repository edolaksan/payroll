@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h1 class="text-center mb-4">Daftar Absensi</h1>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
                <input type="text" id="search" placeholder="Cari absensi..." class="form-control w-50">
            </div>

            @if ($absensi->isEmpty())
                <p class="text-center">Tidak ada data absensi yang tersedia.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="absensi-table">
                        <thead class="thead-dark">
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th class="text-center">Pegawai</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Jam Masuk</th>
                                <th class="text-center">Jam Pulang</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $a)
                                <tr>
                                    {{-- <td>{{ $a->id }}</td> --}}
                                    <td class="text-center">{{ $a->pegawai->nama }}</td>
                                    <td class="text-center">{{ $a->tanggal }}</td>
                                    <td class="text-center">{{ $a->jam_masuk }}</td>
                                    <td class="text-center">{{ $a->jam_pulang }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('absensi.edit', $a->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('absensi.destroy', $a->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
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
            const rows = document.querySelectorAll('#absensi-table tbody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const id = cells[0].textContent.toLowerCase();
                const pegawai = cells[1].textContent.toLowerCase();
                const tanggal = cells[2].textContent.toLowerCase();
                const jamMasuk = cells[3].textContent.toLowerCase();
                const jamPulang = cells[4].textContent.toLowerCase();

                if (id.includes(searchTerm) || pegawai.includes(searchTerm) || tanggal.includes(
                        searchTerm) ||
                    jamMasuk.includes(searchTerm) || jamPulang.includes(searchTerm)) {
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
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
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
            text-align: center;
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

        .form-control {
            width: 100%;
        }
    </style>
@endsection
