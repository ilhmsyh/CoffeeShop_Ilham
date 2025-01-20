@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-4 text-dark">Daftar Produk</h1>  <!-- Pastikan judul terlihat dengan teks berwarna gelap -->
        
        <!-- Tombol Tambah Produk -->
        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-4">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>

        <!-- Daftar Produk dalam Grid -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($produks as $produk)
            <div class="col">
                <div class="card h-100 shadow-lg border-0 rounded-3 overflow-hidden bg-light">
                    <!-- Menampilkan Gambar Produk dengan efek hover -->
                    <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/400x250.png?text=No+Image' }}" class="card-img-top img-fluid" alt="Gambar Produk" style="object-fit: cover; height: 250px; transition: transform .3s ease;">
                    
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $produk->nama_produk }}</h5>
                        <p class="card-text text-muted" style="font-size: 1rem;">{{ $produk->kategori }}</p>

                        <h4 class="text-primary mb-3">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                        
                        <div class="d-flex justify-content-between">
                            <!-- Tombol Edit -->
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Efek hover pada gambar produk */
        .card-img-top:hover {
            transform: scale(1.05);
        }

        /* Menambahkan sedikit padding pada card-body */
        .card-body {
            padding: 20px;
            background-color: #f9f9f9; /* Warna latar belakang card yang lembut */
        }

        /* Memisahkan harga produk dengan font besar dan warna kontras */
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Background Latar Belakang Halaman */
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); /* Gradien biru ungu */
            background-attachment: fixed; /* Latar belakang tetap ketika scroll */
            color: white; /* Pastikan teks terlihat jelas pada latar belakang */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Memberikan lapisan transparan di atas background */
            border-radius: 8px;
            padding: 20px;
        }

        /* Judul halaman lebih mencolok */
        h1 {
            font-family: 'Arial', sans-serif;
            color: #343a40; /* Pastikan judul berwarna gelap agar kontras dengan background */
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Mengubah warna latar belakang halaman agar tidak putih polos */
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Mengubah tombol menjadi lebih modern */
        .btn {
            transition: transform 0.3s, box-shadow 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* Menambah transisi pada card hover */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Memperbaiki tombol dan ikon */
        .btn-sm i {
            margin-right: 5px;
        }
    </style>
@endpush
