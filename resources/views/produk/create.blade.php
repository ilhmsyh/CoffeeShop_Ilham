@extends('layouts.app')

@section('title', '')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Tambah Produk</h1>

    <!-- Form untuk menambah produk -->
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="shadow-lg p-4 rounded-3 bg-white">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
            <label for="nama_produk">Nama Produk</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
            <label for="harga">Harga</label>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary px-4">Simpan Produk</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary px-4">Kembali</a>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .container {
        max-width: 800px;
    }

    h1 {
        font-size: 2rem;
        color: #343a40;
    }

    .form-floating .form-control {
        border-radius: 10px;
        border: 1px solid #ced4da;
        box-shadow: none;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-floating .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .form-floating label {
        color: #6c757d;
        font-size: 1rem;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .form-floating .form-control:focus + label {
        color: #007bff;
    }

    .btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .shadow-lg {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush
