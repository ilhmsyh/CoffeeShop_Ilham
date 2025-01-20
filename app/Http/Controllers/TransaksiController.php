<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi dengan kasir dan detail produk terkait
        $transaksis = Transaksi::with(['kasir', 'details.produk'])->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        // Ambil semua kasir dan produk
        $kasirs = Kasir::all();
        $produks = Produk::all();
        return view('transaksi.create', compact('kasirs', 'produks'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kasir_id' => 'required|exists:kasirs,id', // Kasir harus ada
            'produk_id' => 'required|array', // Produk harus berupa array
            'produk_id.*' => 'exists:produks,id', // Setiap produk harus ada di tabel produk
            'jumlah' => 'required|array', // Jumlah juga harus berupa array
            'jumlah.*' => 'integer|min:1', // Setiap jumlah harus berupa angka dan minimal 1
        ]);

        // Mulai transaksi utama
        $transaksi = Transaksi::create([
            'kasir_id' => $request->kasir_id,
        ]);

        // Loop untuk menyimpan detail transaksi
        foreach ($request->produk_id as $index => $produk_id) {
            $produk = Produk::findOrFail($produk_id); // Cari produk berdasarkan ID
            $jumlah = $request->jumlah[$index]; // Ambil jumlah yang sesuai dengan produk

            // Buat detail transaksi untuk setiap produk yang dipilih
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id, // Mengaitkan detail dengan transaksi
                'produk_id' => $produk_id, // ID produk
                'jumlah' => $jumlah, // Jumlah produk
                'total_harga' => $produk->harga * $jumlah, // Hitung total harga
            ]);
        }

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['kasir', 'details.produk'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Menambahkan metode edit
    public function edit($id)
    {
        // Ambil data transaksi yang akan diedit
        $transaksi = Transaksi::with('details')->findOrFail($id);
        $kasirs = Kasir::all(); // Daftar kasir
        $produks = Produk::all(); // Daftar produk
        return view('transaksi.edit', compact('transaksi', 'kasirs', 'produks'));
    }

    // Menambahkan metode update
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kasir_id' => 'required|exists:kasirs,id', // Kasir harus ada
            'produk_id' => 'required|array', // Produk harus berupa array
            'produk_id.*' => 'exists:produks,id', // Setiap produk harus ada di tabel produk
            'jumlah' => 'required|array', // Jumlah juga harus berupa array
            'jumlah.*' => 'integer|min:1', // Setiap jumlah harus berupa angka dan minimal 1
        ]);

        // Cari transaksi yang akan diupdate
        $transaksi = Transaksi::findOrFail($id);

        // Update data transaksi
        $transaksi->update([
            'kasir_id' => $request->kasir_id,
        ]);

        // Hapus detail transaksi lama
        $transaksi->details()->delete();

        // Simpan detail transaksi yang baru
        foreach ($request->produk_id as $index => $produk_id) {
            $produk = Produk::findOrFail($produk_id);
            $jumlah = $request->jumlah[$index];

            // Buat detail transaksi untuk setiap produk yang dipilih
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk_id,
                'jumlah' => $jumlah,
                'total_harga' => $produk->harga * $jumlah,
            ]);
        }

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Hapus detail transaksi terkait terlebih dahulu
        $transaksi->details()->delete();

        // Hapus transaksi utama
        $transaksi->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
