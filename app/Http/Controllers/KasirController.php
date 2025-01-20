<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::all();
        return view('kasir.index', compact('kasirs'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:kasirs',
            'password' => 'required|min:6',
        ]);

        Kasir::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('kasir.index');
    }

    // Menambahkan metode untuk menampilkan halaman edit
    public function edit($id)
    {
        // Ambil data kasir berdasarkan ID
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit', compact('kasir'));
    }

    // Menambahkan metode untuk memperbarui data kasir
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:kasirs,email,' . $id, // Pastikan email tetap unik kecuali untuk kasir yang sedang diubah
        ]);

        // Temukan kasir berdasarkan ID
        $kasir = Kasir::findOrFail($id);

        // Perbarui data kasir
        $kasir->update([
            'nama' => $request->nama,
            'email' => $request->email,
            // Jangan ubah password jika tidak ada perubahan
            // Anda bisa menambahkan logika jika ingin mengubah password
        ]);

        // Redirect ke halaman daftar kasir dengan pesan sukses
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil diperbarui!');
    }
}
