<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk dari database
        $produks = Produk::all();
        return view('produk.index', compact('produks')); // Kirim data produk ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Data kategori yang bisa dipilih
        $kategori = ['Minuman', 'Makanan'];
        return view('produk.create', compact('kategori')); // Kirim data kategori ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            // Menyimpan gambar ke folder produk_images di storage
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        } else {
            $gambarPath = null; // Jika tidak ada gambar
        }

        // Simpan data produk ke dalam database
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'gambar' => $gambarPath, // Menyimpan path gambar
        ]);

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Data kategori yang bisa dipilih
        $kategori = ['Minuman', 'Makanan'];
        
        // Kirim data produk dan kategori ke view edit
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            // Menyimpan gambar ke folder produk_images di storage
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        } else {
            $gambarPath = $produk->gambar; // Jika tidak ada gambar, gunakan gambar lama
        }

        // Perbarui data produk di database
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'gambar' => $gambarPath, // Menyimpan path gambar
        ]);

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Hapus gambar produk dari storage jika ada
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus produk dari database
        $produk->delete();

        // Redirect ke halaman index produk dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
