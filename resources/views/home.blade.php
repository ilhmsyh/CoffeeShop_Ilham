@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Kartu Dashboard -->
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white text-center rounded-top">
                    <h3><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</h3>
                </div>

                <div class="card-body bg-light">
                    <!-- Teks menyambut pengguna -->
                    <div class="text-center mb-4">
                        <h4 class="text-success"><i class="fas fa-check-circle"></i> {{ __('Welcome Back!') }}</h4>
                        <p class="text-muted">Anda berhasil login ke sistem. Pilih menu di bawah ini untuk melanjutkan.</p>
                    </div>

                    <!-- Tombol Aksi Menu -->
                    <div class="row text-center">
                        <!-- Tombol Kasir -->
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('kasir.index') }}" class="btn btn-primary btn-lg w-100 shadow-sm">
                                <i class="fas fa-cash-register mb-2"></i>
                                <br>Kasir
                            </a>
                        </div>
                        <!-- Tombol Produk -->
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('produk.index') }}" class="btn btn-secondary btn-lg w-100 shadow-sm">
                                <i class="fas fa-box mb-2"></i>
                                <br>Produk
                            </a>
                        </div>
                        <!-- Tombol Transaksi -->
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-success btn-lg w-100 shadow-sm">
                                <i class="fas fa-exchange-alt mb-2"></i>
                                <br>Transaksi
                            </a>
                        </div>
                    </div>

                    <!-- Tampilkan Produk -->
                    <div class="mt-5">
                        <h4 class="text-center mb-4">Produk Populer</h4>
                        <div class="row">
                            @forelse($produk as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm border-0 rounded-lg">
                                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/300' }}" 
                                             class="card-img-top rounded-top" 
                                             alt="{{ $item->nama_produk }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-truncate">{{ $item->nama_produk }}</h5>
                                            <p class="text-muted mb-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p class="text-muted">Tidak ada produk yang tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
@section('scripts')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection

@push('styles')
    <style>
        /* Warna gradasi untuk header */
        .bg-gradient-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
        }

        /* Gaya teks header */
        .card-header h3 {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* Gaya tombol menu */
        .btn {
            border-radius: 15px;
            font-weight: bold;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Ikon pada tombol */
        .btn i {
            font-size: 1.5rem;
        }

        /* Gaya untuk daftar produk */
        .card {
            overflow: hidden;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body h5 {
            font-size: 1rem;
            font-weight: bold;
        }

        .card-body p {
            font-size: 0.9rem;
        }

        /* Background untuk body kartu */
        .card-body {
            background-color: #f9f9f9;
        }

        /* Responsif daftar produk */
        @media (max-width: 576px) {
            .btn {
                font-size: 0.9rem;
            }
            .btn i {
                font-size: 1.2rem;
            }
        }
    </style>
@endpush
@endsection