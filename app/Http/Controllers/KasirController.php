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

    public function edit($id)
    {
        $kasir = Kasir::findOrFail($id);
        return view('kasir.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:kasirs,email,' . $id,
        ]);

        $kasir = Kasir::findOrFail($id);
        $kasir->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil diperbarui!');
    }

    // Metode untuk menghapus data kasir
    public function destroy($id)
    {
        // Temukan kasir berdasarkan ID
        $kasir = Kasir::findOrFail($id);

        // Hapus kasir dari database
        $kasir->delete();

        // Redirect ke halaman daftar kasir dengan pesan sukses
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dihapus!');
    }
}
