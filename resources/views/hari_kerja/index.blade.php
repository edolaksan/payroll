@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-4 shadow-sm rounded-4">
            <h2 class="text-center mb-4">Daftar Hari Kerja</h2>

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('hari_kerja.create') }}" class="btn btn-primary">Tambah Hari Kerja</a>
                <input type="text" id="search" placeholder="Cari hari kerja..." class="form-control w-50">
            </div>

            @if ($hariKerja->isEmpty())
                <p class="text-center">Tidak ada data hari kerja yang tersedia.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="hari-kerja-table">
                        <thead class="thead-dark">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th  class="text-center">Hari Kerja</th>
                                <th  class="text-center">Jam Masuk</th>
                                <th  class="text-center">Jam Pulang</th>
                                <th  class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hariKerja as $hk)
                                <tr>
                                    {{-- <td class="text-center">{{ $hk->id }}</td> --}}
                                    <td class="text-center">{{ $hk->hari_kerja }}</td>
                                    <td class="text-center">{{ $hk->jam_masuk }}</td>
                                    <td class="text-center">{{ $hk->jam_pulang }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('hari_kerja.edit', $hk->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('hari_kerja.destroy', $hk->id) }}" method="POST" style="display:inline;">
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
            const rows = document.querySelectorAll('#hari-kerja-table tbody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const id = cells[0].textContent.toLowerCase();
                const day = cells[1].textContent.toLowerCase();
                const entry = cells[2].textContent.toLowerCase();
                const exit = cells[3].textContent.toLowerCase();

                if (id.includes(searchTerm) || day.includes(searchTerm) || entry.includes(searchTerm) || exit.includes(searchTerm)) {
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
            text-align: center; /* Center text horizontally */
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
