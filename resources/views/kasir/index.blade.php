@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="container my-5">
        <!-- Judul Halaman -->
        <h1 class="text-center mb-5 text-primary fw-bold">Daftar Kasir</h1>

        <!-- Tombol Tambah Kasir -->
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('kasir.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-person-plus"></i> Tambah Kasir
            </a>
        </div>

        <!-- Tabel Daftar Kasir -->
        <div class="table-responsive shadow-sm">
            <table class="table table-hover table-striped align-middle border">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th> <!-- Kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kasirs as $kasir)
                        <tr class="text-center">
                            <td>{{ $kasir->id }}</td>
                            <td>{{ $kasir->nama }}</td>
                            <td>{{ $kasir->email }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('kasir.edit', $kasir->id) }}" class="btn btn-warning btn-sm text-white shadow-sm me-2">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('kasir.destroy', $kasir->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kasir ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Judul Halaman */
        h1 {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Tabel */
        table {
            border-radius: 10px;
        }

        /* Header Tabel */
        thead {
            background: linear-gradient(90deg, #007bff, #0056b3);
        }

        thead th {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Baris tabel */
        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Tombol */
        .btn {
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-lg {
            font-size: 1.2rem;
        }

        .btn-sm {
            font-size: 0.875rem;
        }

        .btn-success {
            background: linear-gradient(90deg, #28a745, #218838);
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #218838, #1e7e34);
        }

        .btn-warning {
            background: linear-gradient(90deg, #ffc107, #e0a800);
        }

        .btn-warning:hover {
            background: linear-gradient(90deg, #e0a800, #c69500);
        }

        .btn-danger {
            background: linear-gradient(90deg, #dc3545, #c82333);
        }

        .btn-danger:hover {
            background: linear-gradient(90deg, #c82333, #b21f2d);
        }

        /* Efek hover tombol */
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
