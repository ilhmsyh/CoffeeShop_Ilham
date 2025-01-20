@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3>Edit Transaksi</h3>
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="kasir_id" class="form-label fw-bold">Pilih Kasir:</label>
                    <select name="kasir_id" id="kasir_id" class="form-select" required>
                        @foreach ($kasirs as $kasir)
                            <option value="{{ $kasir->id }}" {{ $kasir->id == $transaksi->kasir_id ? 'selected' : '' }}>
                                {{ $kasir->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="produk-container">
                    @foreach ($transaksi->details as $detail)
                        <div class="produk-item mb-4 border rounded p-3 position-relative">
                            <label for="produk_id" class="form-label fw-bold">Produk:</label>
                            <select name="produk_id[]" class="form-select mb-2" required>
                                <option value="" selected disabled>-- Pilih Produk --</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ $produk->id == $detail->produk_id ? 'selected' : '' }}>
                                        {{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="jumlah" class="form-label fw-bold">Jumlah:</label>
                            <input type="number" name="jumlah[]" min="1" class="form-control mb-2" value="{{ $detail->jumlah }}" placeholder="Masukkan jumlah" required>

                            <button type="button" class="btn btn-danger btn-sm remove-produk position-absolute top-0 end-0 m-2">Hapus</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-produk" class="btn btn-primary mb-4">Tambah Produk</button>
                <button type="submit" class="btn btn-success w-100">Update Transaksi</button>
            </form>
        </div>
    </div>

    <script>
        // Menambah produk baru saat tombol "Tambah Produk" diklik
        document.getElementById('add-produk').addEventListener('click', function () {
            const container = document.getElementById('produk-container');
            const newItem = document.createElement('div');
            newItem.classList.add('produk-item', 'mb-4', 'border', 'rounded', 'p-3', 'position-relative');
            newItem.innerHTML = `
                <label for="produk_id" class="form-label fw-bold">Produk:</label>
                <select name="produk_id[]" class="form-select mb-2" required>
                    <option value="" selected disabled>-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>

                <label for="jumlah" class="form-label fw-bold">Jumlah:</label>
                <input type="number" name="jumlah[]" min="1" class="form-control mb-2" placeholder="Masukkan jumlah" required>

                <button type="button" class="btn btn-danger btn-sm remove-produk position-absolute top-0 end-0 m-2">Hapus</button>
            `;
            container.appendChild(newItem);
        });

        // Gunakan event delegation untuk menangani klik tombol hapus
        document.getElementById('produk-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-produk')) {
                e.target.closest('.produk-item').remove();
            }
        });
    </script>
@endsection
