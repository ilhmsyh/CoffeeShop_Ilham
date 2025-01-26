@extends('layouts.app')

@section('title', 'Daftar Kasir')

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
            @if ($kasirs->isEmpty())
                <p class="text-center fs-5 text-muted">Belum ada data kasir yang tersedia.</p>
            @else
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
                                    <a href="{{ route('kasir.edit', $kasir->id) }}"
                                        class="btn btn-warning btn-sm text-white shadow-sm me-2">
                                        <i class="bi bi-pencil-square"></i> Ubah
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-id="{{ $kasir->id }}">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Modal Konfirmasi Penghapusan -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kasir ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Mengatur URL form penghapusan pada modal
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            deleteForm.action = `/kasir/${id}`;
        });
    </script>
@endpush

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

        thead th {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        /* Modal Header */
        .modal-header {
            border-bottom: 0;
        }

        .modal-footer {
            border-top: 0;
        }
    </style>
@endpush
