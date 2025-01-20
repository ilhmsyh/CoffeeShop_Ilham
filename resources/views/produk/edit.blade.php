@extends('layouts.app')

@section('title', content: '')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Edit Produk</h1>

    <!-- Form untuk mengedit produk -->
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="shadow-lg p-4 rounded-3 bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="Makanan" {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ $produk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            @if($produk->gambar)
                <p>Gambar sebelumnya:</p>
                <img src="{{ asset('storage/' . $produk->gambar) }}" width="100" alt="Gambar Produk" class="img-fluid">
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success px-4">Update Produk</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary px-4">Kembali</a>
        </div>
    </form>
</div>

@endsection

@push('styles')
    <style>
        /* Mengatur margin dan padding untuk tampilan yang lebih modern */
        .container {
            max-width: 800px;
        }

        h1 {
            font-size: 2rem;
            color: #343a40;
        }

        .form-control, .form-select {
            border-radius: 10px;
            box-shadow: none;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
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

        .form-label {
            font-size: 1rem;
            font-weight: 600;
            color: #495057;
        }

        /* Mengatur tombol kembali agar terlihat jelas */
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        /* Membuat form lebih rapi */
        .form-control, .form-select {
            font-size: 1rem;
            padding: 10px;
        }

        /* Memastikan margin pada elemen form tidak terlalu rapat */
        .mb-3 {
            margin-bottom: 1.5rem;
        }

        /* Memperbaiki tampilan gambar */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush
