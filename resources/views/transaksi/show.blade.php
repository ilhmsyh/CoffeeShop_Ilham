@extends('layouts.app')

@section('title', '')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-dark">Ilhamkzz Coffee & Eatery</h1>
        <p class="text-muted">Nikmati kopi terbaik dan layanan hangat kami!</p>
    </div>

    <!-- Informasi Kasir -->
    <div class="card shadow-lg p-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-user"></i> <strong>Kasir:</strong> {{ $transaksi->kasir->nama }}</h5>
            </div>
            <div class="col-md-6 text-md-end">
                <p><i class="fas fa-calendar-alt"></i> <strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i:s') }}</p>
            </div>
        </div>
    </div>

    <!-- Detail Produk -->
    <div class="card shadow-lg p-4 mb-5">
        <h4 class="mb-3 text-primary"><i class="fas fa-cup-hot"></i> Detail Produk</h4>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead class="text-muted text-uppercase text-center">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th class="text-end">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->details as $detail)
                    <tr>
                        <td>{{ $detail->produk->nama_produk }}</td>
                        <td class="text-center">{{ $detail->jumlah }}</td>
                        <td class="text-end">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <strong>Total Transaksi:</strong>
            <strong class="text-success">Rp {{ number_format($transaksi->details->sum('total_harga'), 0, ',', '.') }}</strong>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="d-flex justify-content-between no-print">
        <button class="btn btn-success shadow-sm" onclick="window.print()">
            <i class="fas fa-print"></i> Cetak
        </button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Pesan di bawah struk -->
    <div class="mt-4 text-center">
        <p class="font-italic text-muted">Terima kasih telah berbelanja di Ilhamkzz Coffee & Eatery! <br> Kunjungi kami lagi untuk pengalaman terbaik lainnya.</p>
        <p class="font-weight-bold text-dark">"JL. BunutWetan, 661, Malang"</p>
    </div>
</div>

<style>
    /* Styling khusus untuk cetak */
    @media print {
        body {
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        .no-print {
            display: none;
        }
        .card {
            border: none;
            box-shadow: none;
        }
        table {
            width: 100%;
        }
        table th, table td {
            text-align: left;
            padding: 5px 0;
        }
        table thead {
            border-bottom: 2px dashed #000;
        }
        hr {
            border-top: 2px dashed #000;
        }
        .container {
            max-width: 480px;
            margin: 0 auto;
        }
        .text-center, .text-end {
            text-align: center !important;
        }
    }

    /* Styling tambahan untuk tampilan di layar */
    .card {
        border-radius: 10px;
        background: linear-gradient(to right, #f5f5f5, #ffffff);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn:hover {
        transition: background-color 0.3s ease;
    }
</style>
@endsection
