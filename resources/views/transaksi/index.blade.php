@extends('layouts.app')

@section('title', '')

@section('content')
<a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Transaksi
</a>

<div class="table-responsive">
    <table class="table table-hover align-middle table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Kasir</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
            <tr>
                <td class="text-center">{{ $transaksi->id }}</td>
                <td>{{ $transaksi->kasir->nama }}</td>
                <td>
                    <ul class="list-unstyled mb-0">
                        @foreach ($transaksi->details as $detail)
                            <li><i class="fas fa-coffee"></i> {{ $detail->produk->nama_produk }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-unstyled mb-0 text-center">
                        @foreach ($transaksi->details as $detail)
                            <li><i class="fas fa-box"></i> {{ $detail->jumlah }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-unstyled mb-0 text-end">
                        @foreach ($transaksi->details as $detail)
                            <li><i class="fas fa-money-bill"></i> Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">
                    <!-- Tombol Lihat -->
                    <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <!-- Tombol Edit -->
                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
