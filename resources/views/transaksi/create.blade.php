@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Transaksi</h1>
    <form method="POST" action="{{ route('transaksi.store') }}" class="shadow p-4 rounded bg-light">
        @csrf
        <div class="mb-4">
            <label for="kasir_id" class="form-label fw-bold">Pilih Kasir:</label>
            <select name="kasir_id" id="kasir_id" class="form-select" required>
                <option value="" selected disabled>-- Pilih Kasir --</option>
                @foreach ($kasirs as $kasir)
                    <option value="{{ $kasir->id }}">{{ $kasir->nama }}</option>
                @endforeach
            </select>
        </div>

        <div id="produk-container">
            <div class="produk-item mb-4 border rounded p-3 position-relative">
                <label for="produk_id" class="form-label fw-bold">Produk:</label>
                <select name="produk_id[]" class="form-select mb-2" required>
                    <option value="" selected disabled>-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>

                <label for="jumlah" class="form-label fw-bold">Jumlah:</label>
                <input type="number" name="jumlah[]" min="1" class="form-control mb-2" placeholder="Masukkan jumlah" required>

                <button type="button" class="btn btn-danger btn-sm remove-produk position-absolute top-0 end-0 m-2 d-none">Hapus</button>
            </div>
        </div>

        <button type="button" id="add-produk" class="btn btn-primary mb-4">Tambah Produk</button>
        <button type="submit" class="btn btn-success w-100">Simpan Transaksi</button>
    </form>
</div>

<script>
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

        newItem.querySelector('.remove-produk').addEventListener('click', function () {
            container.removeChild(newItem);
        });
    });
</script>
@endsection
