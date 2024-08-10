@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card p-5 shadow-sm rounded-4">
            <h3 class="text-start text-dark mb-4 font-weight-bold">Daftar Pegawai</h3>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('pegawai.create') }}" class="btn btn-success shadow-sm">Tambah Pegawai</a>
                <input type="text" id="search" placeholder="Cari pegawai..." class="form-control w-50 shadow-sm">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm text-center">
                    <thead class="thead-dark">
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pegawai-table">
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>Rp {{ number_format($p->gaji_pokok, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#pegawai-table tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const name = cells[0].textContent.toLowerCase();
                const jabatan = cells[1].textContent.toLowerCase();

                if (name.includes(searchTerm) || jabatan.includes(searchTerm)) {
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
        .btn {
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .table {
            font-size: 16px;
            color: #333;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .card {
            border: 1px solid #e0e0e0;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
