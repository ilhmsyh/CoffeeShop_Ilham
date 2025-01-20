@extends('layouts.app')

@section('title', '')

@section('content')
<div class="container my-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-4 text-primary fw-bold">Tambah Kasir</h1>

    <!-- Form Tambah Kasir -->
    <form method="POST" action="{{ route('kasir.store') }}" class="p-4 rounded shadow-sm bg-light">
        @csrf
        <!-- Input Nama -->
        <div class="mb-4">
            <label for="nama" class="form-label fw-bold">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control shadow-sm" placeholder="Masukkan nama kasir" required>
        </div>

        <!-- Input Email -->
        <div class="mb-4">
            <label for="email" class="form-label fw-bold">Email:</label>
            <input type="email" name="email" id="email" class="form-control shadow-sm" placeholder="Masukkan email kasir" required>
        </div>

        <!-- Input Password -->
        <div class="mb-4">
            <label for="password" class="form-label fw-bold">Password:</label>
            <input type="password" name="password" id="password" class="form-control shadow-sm" placeholder="Masukkan password" required>
        </div>

        <!-- Tombol Simpan -->
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg shadow">
                <i class="bi bi-check-circle"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
    <style>
        /* Judul Halaman */
        h1 {
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Form */
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Label */
        .form-label {
            font-size: 1rem;
            color: #495057;
        }

        /* Input Field */
        .form-control {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
        }

        /* Tombol */
        .btn {
            border-radius: 50px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background: linear-gradient(90deg, #28a745, #218838);
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #218838, #1e7e34);
        }
    </style>
@endpush
